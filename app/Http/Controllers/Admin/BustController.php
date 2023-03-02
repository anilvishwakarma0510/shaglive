<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\AdminModel;
use App\Models\BustModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class BustController extends Controller
{
    

    public function bust_list(REQUEST $request){
    	$data = BustModel::orderBy('id','desc')->get();
    	return view('admin.bust-list' , compact('data'));
    }

    public function add_bust(REQUEST $request){
    	$rules = [
           'title' => 'required' ,
        ];

    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$insert['title'] = $request->title;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$run = BustModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">bust has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);
    }	

    public function edit_bust(REQUEST $request){
    		$id = $request->id;
			$rules = [
			'title' => 'required',
			
		];

		$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
				$update['title'] = $request->title;
				
				$run = BustModel::where(['id'=>$id])->update($update);

				if($run){
					$json['status']=1;
					Session::flash('message', '<div class="alert alert-success mt-3">Bust has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('message', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    }

    public function delete_bust(REQUEST $request){
    	$id =$request->id;
    	$run = BustModel::where('id',$id)->delete();

    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">Bust has been deleted successfully.</div>');
    		return back()->with('message', '<div class="alert alert-success mt-3">Bust has been deleted successfully.</div>');

    	}else{
    		return back()->with('error', '<div class="alert alert-danger">Something went wrong</div>');
    	}
    }

}
