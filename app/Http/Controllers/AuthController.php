<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;
use App\Models\User as UserModel;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailTemplate;
use URL;
use Mail;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('user.login');
    }
    public function ResetPassword(Request $request)
    {

        if(session()->has('message') && session()->has('hide_form')){
            return view('user.reset-password', ['request' => $request, 'hide_form' => session()->get('hide_form')]);
        }

        $updatePassword = DB::table('password_reset_tokens')
                              ->where([
            'token' => $request->token
        ])->first();



        if (!$updatePassword) {
            $hide_form = true;
            session()->flash('message', '<div class="alert alert-danger">Link has been expired.</div>');
            return view('user.reset-password', ['request' => $request, 'hide_form' => $hide_form]);
        }
        return view('user.reset-password', ['request' => $request]);
    }
    public function UpdatePassword(Request $request)
    {
       

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
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
            return back()->withInput()->with('message', $message);
        } else {


        $updatePassword = DB::table('password_reset_tokens')
                              ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('message', '<div class="alert alert-danger">Invalid token!</div>');
        }


        $user = UserModel::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')
                              ->where(['email' => $request->email])->delete();


        //session()->flash('message', '<div class="alert alert-success">Your password has been changed!</div>');
        //return view('user.reset-password' ,['message'=> '<div class="alert alert-success">Your password has been changed!</div>','hide_form'=>true]);


        return back()->with(['message' => '<div class="alert alert-success">Your password has been changed!</div>', 'hide_form' => true]);
    }
    }
    public function SendResetPasswordLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users'
        ], [
            'email.exists' => 'This email is not register with us'
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

            $user = UserModel::where('email', $request->email)->first();

            $token = Str::random(64);

            DB::table('password_reset_tokens')
                              ->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);


            $verificationUrl = URL::to('/') . '/reset-password/' . $token;
            $data['email'] = $user->email;
            $data['subject'] = 'Forgot password';
            $data['data'] = '<p>Hello ' . $user->first_name . ', </p><p>We\'ve received a password reset request for your Shestel account (' . $user->email . ').</p>';
            $data['data'] .= '<p>If you initiated this request, please click the link below to reset your password.</p>';
            $data['data'] .= '<p><a href="' . $verificationUrl . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #902F7E; text-decoration: none;  text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #902f7e; display: inline-block;">Reset Password</a></p>';
            try {
                Mail::to($data['email'])->send(new EmailTemplate($data));
            } catch (\Exception $e) {
                // Get error here
                //dd($e->getMessage());
                //return $this->sendError('Something went wrong, try again later.', ['Something went wrong try again later.']);

                return response()->json([
                    'status' => 0,
                    'message' => 'Something went wrong, try again later.'
                ], 200);
            }

            return response()->json([
                'status' => 1,
                'message' => 'We have e-mailed your password reset link!'
            ], 200);
        }
    }
    public function forgotPassword()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('user.forgot-password');
    }
    public function loginSubmit(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $remember = $request->input('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/dashboard');
        }

        //Session::flash('message', '<div class="alert alert-danger">These credentials do not match our records.</div>'); 


        return redirect()->route('login')
            ->withInput($request->only('email', 'remember'))
            ->with(['message' => '<div class="alert alert-danger">These credentials do not match our records.</div>']);
    }
    public function becomeAModel()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        /*$verificationUrl = URL::to('/').'/verify/1/1';
        $EmailData['email'] = 'anil.webwiders@gmail.com';
        $EmailData['subject'] = 'Registration successful';
        $EmailData['data'] = '<p>Hello Anil, </p><p>Thank you for registering with us.</p><p>To verify your account click the below link. </p><p><a href="'.$verificationUrl.'">Verify Now</a></p><p>If the above link doesn\'t work. Copy and paste the below link to your browser.</p><p>'.$verificationUrl.'</p>';
    
        try{
            Mail::to($EmailData['email'])->send(new EmailTemplate($EmailData));
        } catch(\Exception $e){
            //echo 'Get error here';
        }*/
        $countries = CountryModel::orderBy('name', 'asc')->get();
        //$data = ContentDataModel::where('id',2)->first(['data']);


        return view('user.become-a-model', compact("countries"));
    }

    public function modelSignUpStep1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => [
                'required',
                'unique:users',
                function ($attribute, $value, $fail) {
                    if (!validateUsername($value)) {
                        $fail($attribute . ' is invalid or special characters not allowed except underscore(_).');
                    }
                },
            ],
            'phone' => 'required',
            'password' => "required|min:6",
            'confirm_password' => "required|min:6|required_with:password|same:password",
            'dob' => 'required',
            'country' => [
                'required',
                'exists:countries,id'
            ],
        ]);

        if ($validator->fails()) {
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
        }

        return response()->json([
            'status' => 1,
            'message' => 'Success'
        ], 200);
    }

    public function modelSignUpStep2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => [
                'required',
                'unique:users',
                function ($attribute, $value, $fail) {
                    if (!validateUsername($value)) {
                        $fail($attribute . ' is invalid or special characters not allowed except underscore(_).');
                    }
                },
            ],
            'phone' => 'required',
            'id_doc' => 'required',
            'address_doc' => 'required',
            'password' => "required|min:6",
            'confirm_password' => "required|min:6|required_with:password|same:password",
            'dob' => 'required',
            'country' => [
                'required',
                'exists:countries,id'
            ],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = '<ul class="alert alert-danger" style="padding:5px">';
            foreach ($errors as $error) {
                $message .= '<li>' . $error . '</li>';
            }
            $message .= '</ul>';
            return response()->json([
                'status' => 2,
                'message' => $message
            ], 200);
        }


        $validator = Validator::make($request->all(), [
            'user_id_doc' => [
                'required',
                'mimes:jpeg,png,bmp,pdf,jpg',
            ],
            'user_address_doc' => [
                'required',
                'mimes:jpeg,png,bmp,pdf,jpg',
            ],
        ]);

        if ($validator->fails()) {
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
        }


        $newUser = new UserModel;
        $newUser->first_name = $request->first_name;
        $newUser->last_name = $request->last_name;
        $newUser->username = strtolower($request->username);
        $newUser->phone = $request->phone;
        $newUser->email = strtolower($request->email);
        $newUser->dob = $request->dob;
        $newUser->user_type = 1;
        $newUser->password = Hash::make($request->password);
        $newUser->country = $request->country;
        $newUser->id_doc = $request->id_doc;
        $newUser->address_doc = $request->address_doc;

        //$newUser->user_id_doc = $request->file('user_id_doc')->store('uploads/user_docs');
        //$newUser->user_address_doc = $request->file('user_address_doc')->store('uploads/user_docs');

        $path = 'uploads/user_docs/';
        $fileName = time().'.'.$request->file('user_id_doc')->extension();
        $request->file('user_id_doc')->move(public_path($path),$fileName);
        $newUser->user_id_doc = $path.$fileName; 

        $fileName = time().'.'.$request->file('user_address_doc')->extension();
        $request->file('user_address_doc')->move(public_path($path),$fileName);
        $newUser->user_address_doc = $path.$fileName; 

        $newUser->remember_token = $token = md5(rand());

        $newUser->save();

        if ($newUser->id) {

            Auth::loginUsingId($newUser->id);


            $verificationUrl = URL::to('/') . '/verify/' . $newUser->id . '/' . $token;
            $EmailData['email'] = $newUser->email;
            $EmailData['subject'] = 'Registration successful';
            $EmailData['data'] = '<p>Hello ' . $newUser->first_name . ', </p><p>Thank you for registering with us.</p><p>To verify your account click the below link. </p><p><a href="' . $verificationUrl . '">Verify Now</a></p><p>If the above link doesn\'t work. Copy and paste the below link to your browser.</p><p>' . $verificationUrl . '</p>';

            try {
                Mail::to($EmailData['email'])->send(new EmailTemplate($EmailData));
            } catch (\Exception $e) {
                // Get error here
            }




            return response()->json([
                'status' => 1,
                'message' => '<div class="alert alert-success">Registration completed successfully, please verify your email.</div>'
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'message' => '<div class="alert alert-danger">Something went wrong, try again later.</div>'
            ], 200);
        }
    }

    public function verifyEmail($id = null, $token = null)
    {

        //$user = User::where('id',$id)->where('token',$token)->first();
        $user = UserModel::where('id', $id)->first();
        $message = '<h6 style="color:red">Verification link has been expired.</h6>';
        $status = 0;
        if (!blank($user)) {
            if ($user->email_verified_at && !empty($user->email_verified_at)) {
                $message = '<h6 style="color:green">Your email address already verified.</h6>';
                $status = 1;
            } else if ($token == $user->remember_token) {
                $user->remember_token = '';
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                $message = '<h6 style="color:green">Your email address has been verified successfully.</h6>';
                $status = 1;
            }
        }
        return view('user.verification-screen', compact('user', 'message', 'status'));
    }
}
