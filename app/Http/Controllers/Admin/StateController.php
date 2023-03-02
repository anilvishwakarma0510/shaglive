<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\AdminModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class StateController extends Controller
{
    
    public function state_list(REQUEST $request){
    	$data = StateModel::orderBy('id','desc')->get();
    	$country = CountryModel::get();
    	return view('admin.state-list', compact('data', 'country'));
    }

    public function add_state(REQUEST $request){
    	$rules = [
           'name' => 'required|unique:states,name' ,
        ];

    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$insert['name'] = $request->name;
        	$insert['country_id'] = $request->country;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$run = StateModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">State has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);

    }

    public function edit_state(REQUEST $request){
    		$id = $request->id;
			$rules = [
			'name' => 'required|unique:states,name,'.$request->id,
			
		];

		$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
				$update['name'] = $request->name;
				$update['country_id'] = $request->country;
				$update['updated_at'] = date('Y-m-d H:i:s');
				$run = StateModel::where(['id'=>$id])->update($update);

				if($run){
					$json['status']=1;
					Session::flash('message', '<div class="alert alert-success mt-3">State has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('message', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    }

    public function delete_state(REQUEST $request){

    		$id =$request->id;

    	$run= StateModel::where('id',$id)->delete();
    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">State has been deleted successfully<div>');
            return back()->with('message','<div class="alert alert-success mt-3">State has beed deleted successfully</div>');
    	}else{
    		return back()->with('error','Something went wrong');
    	}
    }

}
