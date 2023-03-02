<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailTemplate;
use URL;
use Mail;
use DB;
use Validator;
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
use App\Models\TagsModel;
use App\Models\VideoModel;
use App\Models\WorkingHourModel;

class UserController extends Controller
{
    
    public function pending_model(REQUEST $request){
    	$data = User::where('is_approved', '0')->get();
    	//dd($data);
    	return view('admin.pending-model-list', compact('data'));
    }

    public function accept_user_request(REQUEST $request){
    	$id = $request->id;

    	$update['is_approved'] = '1';
    	$run = User::where('id',$id)->update($update);
    	if($run){
    		$user_email = User::where('id',$id)->get()->first();
    		$data['email'] = $user_email ->email;
    		 $Url = URL::to('/') . '/';
            $data['subject'] = 'Request Accepted';
            $data['data'] = '<p>Congratulations  ' . $user_email->first_name ." ". $user_email->last_name. ', </p><p> Your account has been approved by our team now you can access your account.</p><p>'.$Url.'</p>';
           
            try {
                Mail::to($data['email'])->send(new EmailTemplate($data));
            } catch (\Exception $e) {
                // Get error here
                //dd($e->getMessage());
                //return $this->sendError('Something went wrong, try again later.', ['Something went wrong try again later.']);

            }
    		Session::flash('message' ,'<div class="alert alert-success mt-3">User request accepted.</div>');
    		return back()->with('message', '<div class="alert alert-success mt-3">User request accepted.</div>');
    	}else{
    		return back()->with('message', '<div class="alert alert-danger mt-3">Something went wrong.</div>');
    	}

    }

    public function add_reason(REQUEST $request){
    	$id = $request->user_id;
    		$rules = [
			'reason' => 'required',
			
		];
		
		$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
			$reason = $request->reason;
			$user_email = User::where('id',$id)->get()->first();
    		$data['email'] = $user_email ->email;
    		 $Url = URL::to('/') . '/';
            $data['subject'] = 'Request rejected';
            $data['data'] = '<p>Hello  ' . $user_email->first_name ." ". $user_email->last_name. ', </p><p> Your request has been rejected by our team now you can not access your account.</p>';
            $data['data'] .= '<p>Reject reason - '.$reason.'</p>';
            try {
                Mail::to($data['email'])->send(new EmailTemplate($data));
            } catch (\Exception $e) {
                // Get error here
                //dd($e->getMessage());
                //return $this->sendError('Something went wrong, try again later.', ['Something went wrong try again later.']);

            }	
				$run = User::where(['id'=>$id])->delete();

				if($run){
					$json['status']=1;
					Session::flash('message', '<div class="alert alert-success mt-3">Request has been rejected successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('message', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);
    }

    public function active_user_model(REQUEST $request){
    	$data = User::where('is_approved', '1')->get();
    	return view('admin.active-model-list' ,  compact('data'));
    }

    public function view_user_details(REQUEST $request){

        $id = $request->id;
        $country = $height = $weight = $hair_colour = $hair_colour = $eyes_color = $ethnicity = $public_hair = $state = $bust = $city = false;
        $user = User::where('id',$id)->get()->first();
        $video = VideoModel::where('user_id',$id)->orderBy('id','desc')->get();
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
       
        return view('admin.view-user-detail' ,compact( "user",
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
            "video",));

    }


    public function view_video_details(REQUEST $request){
        $id =$request->id;
        
    }

}
