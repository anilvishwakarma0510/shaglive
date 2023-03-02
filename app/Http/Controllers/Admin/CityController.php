<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EthinicityModel;
use Session;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
class CityController extends Controller
{
   
   public function city_list(REQUEST $request){
   		$data = CityModel::orderBy('id','desc')->get();
    	$country = CountryModel::get();
    	$state = StateModel::get();
   		return view('admin.city-list', compact('data', 'country', 'state'));

   }

   public function select_state(REQUEST $request){
   		$id = $request->id;
   		$model ="";
   		$state = StateModel::where('country_id',$id)->get();
   		if($state){
   			foreach ($state as $state_val) {
   				$model .= '<option value='.$state_val->id.'>'.$state_val->name.'</option>';
   			}
   			$output['status'] =1;
   			$output['data'] = $model;
   		}else{
   			$output['status'] =0;
   			$output['data'] = $model;
   		}
   		//print_r($state);

   		echo json_encode($output);
   		//return view('admin.city-list', compact('state'));

   }

   public function add_city(REQUEST $request){
   	$rules = [
           'name' => 'required|unique:cities,name' ,
           'state' => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$insert['name'] = $request->name;
        	$insert['country_id'] = $request->country;
        	$insert['state_id'] = $request->state;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$run = CityModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">City has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);
   }

   public function edit_city(REQUEST $request){
  	 	$id =$request->id;
   		$rules = [
           'name' => 'required|unique:cities,name,'.$request->id,
           'state' => 'required',

        ];

         $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{

        	$insert['name'] = $request->name;
        	$insert['country_id'] = $request->country;
        	$insert['state_id'] = $request->state;
        	$insert['updated_at'] = date('Y-m-d H:i:s');

        	$run = CityModel::where('id',$id)->update($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">City has been updated successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);
   }

   public function delete_city(REQUEST $request){

   		$id =$request->id;

    	$run= CityModel::where('id',$id)->delete();
    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">City has been deleted successfully<div>');
            return back()->with('message','<div class="alert alert-success mt-3">City has beed deleted successfully</div>');
    	}else{
    		return back()->with('error','Something went wrong');
    	}
   }

}
