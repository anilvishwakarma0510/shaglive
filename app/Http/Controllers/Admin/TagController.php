<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\EthinicityModel;
use App\Models\TagsModel;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
class TagController extends Controller
{
    

    public function tags_list(REQUEST $request){
    	$data = TagsModel::orderBy('id','desc')->get();
    	return view('admin.tags-list', compact('data'));
    }

    public function add_tags(Request $request){

    	//print_r($_REQUEST);

    	$rules = [
           'title' => 'required|unique:tags,title' ,
        ];

    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$insert['title'] = $request->title;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$run = TagsModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">Tags has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);

    }


    public function edit_tags(REQUEST $request){

		//print_r($_REQUEST);
    	$id = $request->id;
			$rules = [
			'title' => 'required|unique:tags,title,'.$request->id,
			
		];

		$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
				$update['title'] = $request->title;
				
				$run = TagsModel::where(['id'=>$id])->update($update);

				if($run){
					$json['status']=1;
					Session::flash('message', '<div class="alert alert-success mt-3">Tags has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('message', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    } 


     public function delete_tags(REQUEST $request){

    	$id =$request->id;

    	$run= TagsModel::where('id',$id)->delete();
    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">Tags has been deleted successfully<div>');
            return back()->with('message','<div class="alert alert-success mt-3">Tags has beed deleted successfully</div>');
    	}else{
    		return back()->with('error','Something went wrong');
    	}
    }


}
