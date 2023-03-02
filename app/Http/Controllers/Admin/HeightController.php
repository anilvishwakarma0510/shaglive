<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\AdminModel;
use App\Models\HeightModel;
use App\Models\WeightModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class HeightController extends Controller
{
    

    public function height_list(REQUEST $request){
    	$data = HeightModel::orderBy('id','desc')->get();
    	return view('admin.height-list', compact('data'));
    }

    public function add_height(Request $request){

    	//print_r($_REQUEST);

    	$rules = [
           'in_cm' => 'required' ,
        ];

    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$insert['in_cm'] = $request->in_cm;
        	 $inches =  $request->in_cm/2.54;
        	 $feet = floor(($inches/12));
    		$measurement = $feet."' ".($inches%12).'"';
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$insert['in_inch'] = $measurement;

        	$run = HeightModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">Height has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);

    }

    
    public function edit_height(REQUEST $request){

		//print_r($_REQUEST);
    	$id = $request->id;
			$rules = [
			'in_cm' => 'required',
			
		];

		$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
				$update['in_cm'] = $request->in_cm;

				$inches =  $request->in_cm/2.54;
	        	$feet = floor(($inches/12));
	    		$measurement = $feet."' ".($inches%12).'"';
	        	$update['updated_at'] = date('Y-m-d H:i:s');
	        	$update['in_inch']  = $measurement;

				$run = HeightModel::where(['id'=>$id])->update($update);

				if($run){
					$json['status']=1;
					Session::flash('message', '<div class="alert alert-success mt-3">Heigth has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('message', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    } 

     public function delete_height(REQUEST $request){

    	$id =$request->id;

    	$run= HeightModel::where('id',$id)->delete();
    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">Heigth has been deleted successfully<div>');
            return back()->with('message','<div class="alert alert-success mt-3">Height has beed deleted successfully</div>');
    	}else{
    		return back()->with('error','Something went wrong');
    	}
    }

    public function weight_list(REQUEST $request){
    	$data = WeightModel::orderBy('id','desc')->get();
    	return view('admin.weight-list', compact('data'));
    }


    public function add_weight(Request $request){

    	//print_r($_REQUEST);

    	$rules = [
           'in_kg' => 'required' ,
        ];

    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$a = $request->in_kg*2.20462 ;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$insert['in_kg'] = $request->in_kg;
        	$insert['in_ibs'] =round($a) ;
        	$run = WeightModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">Weight has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);

    }


    public function edit_weight(Request $request){

    	//print_r($_REQUEST);

    	$rules = [
           'in_kg' => 'required' ,
        ];
        $id = $request->id;
    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$a = $request->in_kg*2.20462 ;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$insert['in_kg'] = $request->in_kg;
        	$insert['in_ibs'] = round($a) ;
        	$run = WeightModel::where('id',$id)->update($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">Weight has been update successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);

    }

    public function delete_weight(REQUEST $request){

    	$id =$request->id;

    	$run= WeightModel::where('id',$id)->delete();
    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">Weight has been deleted successfully<div>');
            return back()->with('message','<div class="alert alert-success mt-3">Weight has beed deleted successfully</div>');
    	}else{
    		return back()->with('error','Something went wrong');
    	}
    }


}
