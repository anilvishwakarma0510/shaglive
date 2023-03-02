<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EthinicityModel;
use Session;
use App\Models\AdminModel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class EthinicityController extends Controller
{
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
        		 Session::flash('message', '<div class="alert alert-success mt-3">Ethinicity has been added successfully</div>');
            
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
					Session::flash('message', '<div class="alert alert-success mt-3">Ethinicity has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('message', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    } 

    public function delete_ethinicity(REQUEST $request){

    	$id =$request->id;

    	$run= EthinicityModel::where('id',$id)->delete();
    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">Ethinicity has been deleted successfully<div>');
            return back()->with('message','<div class="alert alert-success mt-3">Ethinicity has beed deleted successfully</div>');
    	}else{
    		return back()->with('error','Something went wrong');
    	}
    }

}
