<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\HeightModel;
use App\Models\WeightModel;
use App\Models\HairModel;
use App\Models\EyesModel;
use App\Models\EthinicityModel;
use App\Models\PublicHairModel;
use App\Models\BustModel;
use App\Mail\EmailTemplate;
use App\Models\TagsModel;
use App\Models\WorkingHourModel;
use Illuminate\Support\Facades\Auth;
use URL;
use Mail;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard(){
        //Auth::logout();
        $user = auth()->user();

        $country = $height = $weight = $hair_colour = $hair_colour = $eyes_color = $ethnicity = $public_hair = $state = $bust = $city = false;
        if ($user->country) {
            $country = CountryModel::where('id', $user->country)->first(['name']);
        }

        if ($user->state) {
            $state = StateModel::where('id', $user->state)->first(['name']);
        }

        if ($user->city) {
            $city = CityModel::where('id', $user->city)->first(['name']);
        }

        if ($user->height) {
            $height = HeightModel::where('id', $user->height)->first(['in_inch','in_cm']);
        }

        if ($user->weight) {
            $weight = WeightModel::where('id', $user->weight)->first(['in_ibs','in_kg']);
        }

        if ($user->hair_colour) {
            $hair_colour = HairModel::where('id', $user->hair_colour)->first(['title']);
        }

        if ($user->eyes_color) {
            $eyes_color = EyesModel::where('id', $user->eyes_color)->first(['title']);
        }
        
        if ($user->ethnicity) {
            $ethnicity = EthinicityModel::where('id', $user->ethnicity)->first(['title']);
        }

        if ($user->ethnicity) {
            $public_hair = PublicHairModel::where('id', $user->public_hair)->first(['title']);
        }

        if ($user->bust) {
            $bust = BustModel::where('id', $user->bust)->first(['title']);
        }
        $tags = [];
        if ($user->tags) {
            $user_tag = explode(',',$user->tags);
            $tags = TagsModel::whereIn('id', $user_tag)->get(['title']);
        }

        $days = [];

        for($i=0; $i<=6; $i++){
            $check = WorkingHourModel::where('user_id',$user->id)->where('week_day',$i)->first(['open_time','close_time','id']);

            $days[$i]['weekNo']=$i;
            $days[$i]['status']=($check) ? true : false;
            $days[$i]['open_time']=($check) ? $check->open_time : '';
            $days[$i]['close_time']=($check) ? $check->close_time : '';
            $days[$i]['weekName'] = date('l', strtotime("Sunday +{$i} days"));
        }


        


        return view('user.dashboard',compact(
            "user",
            "country",
            "state",
            "city",
            "height",
            "weight",
            "hair_colour",
            "eyes_color",
            "ethnicity",
            "public_hair",
            "bust",
            "tags",
            "days",
        ));
    }

    public function setWorkingHours(){
        //Auth::logout();
        $user = auth()->user();

        $days = [];

        for($i=0; $i<=6; $i++){
            $check = WorkingHourModel::where('user_id',$user->id)->where('week_day',$i)->first(['open_time','close_time','id']);

            $days[$i]['weekNo']=$i;
            $days[$i]['id']=($check) ? $check->id : '';
            $days[$i]['open_time']=($check) ? $check->open_time : '';
            $days[$i]['close_time']=($check) ? $check->close_time : '';
            $days[$i]['weekName'] = date('l', strtotime("Sunday +{$i} days"));
        }


        //dd($days);


        return view('user.set-working-hour',compact(
            "days",
        ));
    }
    public function profile()
    {
        $countries = CountryModel::orderBy('name', 'asc')->get();
        $heights = HeightModel::orderBy('in_cm', 'asc')->get();
        $weights = WeightModel::orderBy('in_kg', 'asc')->get();
        $hair_colours = HairModel::orderBy('title', 'asc')->get();
        $eyes_colors = EyesModel::orderBy('title', 'asc')->get();
        $ethnicitys = EthinicityModel::orderBy('title', 'asc')->get();
        $public_hairs = PublicHairModel::orderBy('title', 'asc')->get();
        $tags = TagsModel::orderBy('title', 'asc')->get();

        $states = [];
        if (auth()->user()->country) {
            $states = StateModel::where('country_id', auth()->user()->country)->orderBy('name', 'asc')->get();
        }

        $cities = [];
        if (auth()->user()->state) {
            $cities = CityModel::where('state_id', auth()->user()->state)->orderBy('name', 'asc')->get();
        }


        $busts = BustModel::orderBy('title', 'asc')->get();
        return view('user.edit-profile', compact("countries", "heights", "weights", "hair_colours", "eyes_colors", "ethnicitys", "public_hairs", "busts", "cities", "states","tags"));
    }
    public function getStateByCountryID(Request $request)
    {
        $data = StateModel::where('country_id', $request->country_id)->orderBy('name', 'asc')->get();
        return response()->json([
            'status' => 1,
            'data' => $data
        ], 200);
    }
    public function getCityByStateID(Request $request)
    {
        $data = CityModel::where('state_id', $request->state_id)->orderBy('name', 'asc')->get();
        return response()->json([
            'status' => 1,
            'data' => $data
        ], 200);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function changePassword()
    {
        //Auth::logout();
        return view('user.change-password');
    }



    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->fails()) {
            //return $this->sendError('Validation Error.', $validator->errors()->all());

            $errors = $validator->errors()->all();
            $message = '<ul class="alert alert-danger" style="padding:5px">';
            foreach ($errors as $error) {
                $message .= '<li>' . $error . '</li>';
            }
            $message .= '</ul>';
            return response()->json([
                'status' => 0,
                'message' => $message
            ], 200);
        } else {

            $input = $request->all();

            $user = auth()->user();

            if (!Hash::check($input['old_password'], $user->password)) {
                return response()->json([
                    'status' => 0,
                    'message' => '<div class="alert alert-danger">Old password not matched.</div>'
                ], 200);
            }

            $password = Hash::make($input['password']);
            $user = UserModel::where('id', $user->id)->update(['password' => $password]);

            return response()->json([
                'status' => 1,
                'message' => 'Password has been updated successfully'
            ], 200);
        }
    }
    public function updateProfile(Request $request)
    {
        //echo '<pre>'; print_r($request->all()); die();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'country' => 'required',
            //'state' => 'required',
            //'city' => 'required',
            'zip' => 'required',
            'dob' => 'required',
            'sexual_preference' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'hair_colour' => 'required',
            'eyes_color' => 'required',
            'ethnicity' => 'required',
            'public_hair' => 'required',
            'bust' => 'required',
            'about_me' => 'required',
            'profile_image' => [
                'mimes:jpeg,png,bmp,pdf,jpg',
                'max:2000'
            ],
        ]);

        if ($validator->fails()) {
            //return $this->sendError('Validation Error.', $validator->errors()->all());

            $errors = $validator->errors()->all();
            $message = '<ul class="alert alert-danger" style="padding:5px">';
            foreach ($errors as $error) {
                $message .= '<li>' . $error . '</li>';
            }
            $message .= '</ul>';
            return response()->json([
                'status' => 0,
                'message' => $message
            ], 200);
        } else {

            $input = $request->all();

            $user = UserModel::where('id', auth()->user()->id)->first();

            if($request->tags && !empty($request->tags)){
                $user->tags = implode(',',$request->tags);
            }

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->zip = $request->zip;
            $user->dob = $request->dob;
            $user->sexual_preference = $request->sexual_preference;
            $user->height = $request->height;
            $user->weight = $request->weight;
            $user->hair_colour = $request->hair_colour;
            $user->eyes_color = $request->eyes_color;
            $user->ethnicity = $request->ethnicity;
            $user->public_hair = $request->public_hair;
            $user->bust = $request->bust;
            $user->about_me = $request->about_me;

            if ($request->file('profile_image')) {
                $fileName = time() . '.' . $request->file('profile_image')->extension();
                $path = 'uploads/user_profile/';
                $uploadedFile = $request->file('profile_image')->move(public_path($path), $fileName);
                $user->profile_image = $path . $fileName;
            }

            $user->save();

            return response()->json([
                'status' => 1,
                'message' => 'Profile has been updated successfully'
            ], 200);
        }
    }
    public function updateWorkingHours(Request $request)
    {
       
            $user_id = auth()->user()->id;

            for($i=0; $i<=6; $i++){
                $check = WorkingHourModel::where('user_id',$user_id)->where('week_day',$i)->first();

                if($check){
                    
                    if($request->open_time[$i] || $request->close_time[$i]){
                        $check->open_time = $request->open_time[$i];
                        $check->close_time = $request->close_time[$i];
                        $check->save();
                    } else {
                        $check->delete();
                    }
                } else {
                    if($request->open_time[$i] || $request->close_time[$i]){
                        $insert = new WorkingHourModel;
                        $insert->user_id = $user_id;
                        $insert->open_time = $request->open_time[$i];
                        $insert->close_time = $request->close_time[$i];
                        $insert->week_day = $i;
                        $insert->save();
                    }
                }
                
            }

            

            return response()->json([
                'status' => 1,
                'message' => 'Timing has been updated successfully'
            ], 200);
    
    }

    public function emailPending()
    {
        // echo auth()->user()->id; die();
        if (auth()->user()->email_verified_at) {
            return redirect('/profile');
        }
        return view('user.email-verification');
    }
    public function verificationPending()
    {
        // echo auth()->user()->id; die();
        if (auth()->user()->user_type == 1 && auth()->user()->is_approved) {
            return redirect('/profile');
        }
        return view('user.pending-verification');
    }

    public function resendEmailVerificationList()
    {
        // echo auth()->user()->id; die();
        if (auth()->user()->email_verified_at) {
            return response()->json([
                'status' => 0,
                'message' => 'Something went wrong'
            ], 200);
        }

        $user = UserModel::where('id', auth()->user()->id)->first();

        if ($user->remember_token && !empty($user->remember_token)) {
            $token = $user->remember_token;
        } else {
            $token = md5(rand());
        }

        $verificationUrl = URL::to('/') . '/verify/' . $user->id . '/' . $token;
        $EmailData['email'] = $user->email;
        $EmailData['subject'] = 'Registration successful';
        $EmailData['data'] = '<p>Hello ' . $user->first_name . ', </p><p>Thank you for registering with us.</p><p>To verify your account click the below link. </p><p><a href="' . $verificationUrl . '">Verify Now</a></p><p>If the above link doesn\'t work. Copy and paste the below link to your browser.</p><p>' . $verificationUrl . '</p>';

        Mail::to($EmailData['email'])->send(new EmailTemplate($EmailData));

        return response()->json([
            'status' => 1,
            'message' => 'Sent'
        ], 200);
    }
}
