<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\EthinicityModel;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class SettingController extends Controller
{
    //

    public function Edit_profile() {
        return view('admin.edit-profile');
    }

    public function update_profile(REQUEST $request){

			$rules = [
			'first_name' => 'required|min:3',
			'last_name' => 'required|min:3',
			'email' => 'required|unique:admin,email,'.$request->id,
			
		];
			$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
				$update['first_name'] = $request->first_name;
				$update['last_name'] = $request->last_name;
 				$update['email']=$request->email;
				
				$run = AdminModel::where(['id'=>Auth::guard('admin')->user()->id])->update($update);

				if($run){
					$json['status']=1;
					Session::flash('message', '<div>Profile has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    }

    public function change_password(REQUEST $request){

    	return view('admin.change-password');

    }

   public function update_password(Request $request)
    {
        $rules = [
            'old_pass'=>'required|min:6',
            'new_pass'=>'required|min:6',
            'cnew_pass' => 'required|min:6|required_with:new_pass|same:new_pass',
        ];
    
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 00;
        } else {
            if(Hash::check($request->old_pass, Auth::guard('admin')->user()->password)){
               // $run = AdminModel::where(['id'=>Auth::guard('admin')->user()->id])->update(['password'=>Hash::make($request->new_pass)]);

            	$update = AdminModel::where(['id'=>Auth::guard('admin')->user()->id])->first();
            	$update->password=Hash::make($request->new_pass);
            	$update->save();
                
                $json['status']=1;
                   Session::flash('message', '<div>Password has been updated successfully<div>'); 
            }else{
                $json['status']=0000;
                $json['message'] = "<div class='alert alert-danger'>Your old password doesn't match!!...</div>";
            }
        }
        echo json_encode($json);
    }

/*
    public function ethinicity_list(Request $request){
    	$data = EthinicityModel::orderBy('id','desc')->get();
    	return view('admin.ethinicity_list' , compact('data'));
    }

    public function add_ethinicity(Request $request){

    	//print_r($_REQUEST);

    	$rules = [
           'title' => 'required|unique:ethinicity,title' ,
        ];

    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$insert['title'] = $request->title;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$run = EthinicityModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div>Ethinicity has been added successfully<div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);

    }

    public function edit_ethinicity(REQUEST $request){

		//print_r($_REQUEST);
    	$id = $request->id;
			$rules = [
			'title' => 'required|unique:ethinicity,title,'.$request->id,
			
		];

		$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
				$update['title'] = $request->title;
				
				$run = EthinicityModel::where(['id'=>$id])->update($update);

				if($run){
					$json['status']=1;
					Session::flash('message', '<div>Ethinicity has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    } */

}
