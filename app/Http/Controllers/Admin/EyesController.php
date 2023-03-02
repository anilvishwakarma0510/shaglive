<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\EyesModel;
use Validator;
use Session;
class EyesController extends Controller
{
    //

    public function eyes_list(REQUEST $request){

    	$data = EyesModel::orderBy('id','desc')->get();
    	return view('admin.eyes-list', compact('data'));
    }


    public function add_eyes(Request $request){

    	//print_r($_REQUEST);

    	$rules = [
           'title' => 'required|unique:eyes,title' ,
        ];

    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$insert['title'] = $request->title;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$run = EyesModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">Eyes has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);

    }



    public function edit_eyes(REQUEST $request){

		//print_r($_REQUEST);
    	$id = $request->id;
			$rules = [
			'title' => 'required|unique:eyes,title,'.$request->id,
			
		];

		$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
				$update['title'] = $request->title;
				
				$run = EyesModel::where(['id'=>$id])->update($update);

				if($run){
					$json['status']=1;
					Session::flash('message', '<div class="alert alert-success mt-3">Eyes has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    } 
    public function delete_eyes(REQUEST $request){

    	$id =$request->id;

    	$run= EyesModel::where('id',$id)->delete();
    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">Eyes has been deleted successfully</div>');
            return back()->with('message','<div class="alert alert-success mt-3">Eyes has beed deleted successfully</div>');
    	}else{
    		return back()->with('error','Something went wrong');
    	}
    }

}
