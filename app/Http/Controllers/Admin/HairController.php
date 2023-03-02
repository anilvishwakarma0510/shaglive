<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HairModel;
use App\Models\PublicHairModel;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
class HairController extends Controller
{
    //

    public function hair_list(REQUEST $request){

    	$data = HairModel::orderBy('id','desc')->get();
    	return view('admin.hair_list', compact('data'));

    }

     public function add_hair_list(Request $request){

    	//print_r($_REQUEST);

    	$rules = [
           'title' => 'required|unique:hairs,title' ,
        ];

    	 $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
        	$insert['title'] = $request->title;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$run = HairModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">Hairs title has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);

    }


    public function edit_hair_list(REQUEST $request){

		//print_r($_REQUEST);
    	$id = $request->id;
			$rules = [
			'title' => 'required|unique:hairs,title,'.$request->id,
			
		];

		$validator = Validator::make($request->all(),$rules);
			
			if($validator->fails()) {
				$json['validation'] = $validator->errors();
				$json['status'] = 0;
			} else {
				$update['title'] = $request->title;
				
				$run = HairModel::where(['id'=>$id])->update($update);

				if($run){
					$json['status']=1;
					Session::flash('message', '<div class="alert alert-success mt-3">Hairs title has been updated successfully</div>'); 
				}else{
					$json['status']=0;
					Session::flash('error', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
				}
			}
			echo json_encode($json);

    } 

     public function delete_hair_list(REQUEST $request){

    	$id =$request->id;

    	$run= HairModel::where('id',$id)->delete();
    	if($run){
    		Session::flash('message', '<div class="alert alert-success mt-3">Hair title has been deleted successfully</div>');
            return back()->with('message','<div class="alert alert-success mt-3">Hair title has beed deleted successfully</div>');
    	}else{
    		return back()->with('error','Something went wrong');
    	}
    }

    public function public_hair_list(REQUEST $request){
        $data = PublicHairModel::orderBy('id','desc')->get();
        return view('admin.public_hair-list', compact('data'));
    }

    public function add_public_hair(REQUEST $request){

        $rules = [
           'title' => 'required|unique:public_hair,title' ,
        ];

         $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{
            $insert['title'] = $request->title;
            $insert['created_at'] = date('Y-m-d H:i:s');
            $run = PublicHairModel::insert($insert);
            if($run){
                $json['status'] = 1;
                 Session::flash('message', '<div class="alert alert-success mt-3">Public hairs title has been added successfully</div>');
            
            }else{
                $json['status'] = 0;
                Session::flash('error', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
            }
        }

        echo json_encode($json);
    }

    public function delete_public_hair(REQUEST $request){
            $id =$request->id;
            $run= PublicHairModel::where('id',$id)->delete();
        if($run){
            Session::flash('message', '<div class="alert alert-success mt-3">Hair title has been deleted successfully</div>');
            return back()->with('message','<div class="alert alert-success mt-3">Hair title has beed deleted successfully</div>');
        }else{
            return back()->with('error','Something went wrong');
        }    
    }

    public function edit_public_hair(REQUEST $request){
         $id =$request->id;

         $rules = [
            'title' => 'required|unique:public_hair,title,'.$request->id,
            
        ];

        $validator = Validator::make($request->all(),$rules);
            
            if($validator->fails()) {
                $json['validation'] = $validator->errors();
                $json['status'] = 0;
            } else {
                $update['title'] = $request->title;
                
                $run = PublicHairModel::where(['id'=>$id])->update($update);

                if($run){
                    $json['status']=1;
                    Session::flash('message', '<div class="alert alert-success mt-3">Public hairs title has been updated successfully</div>'); 
                }else{
                    $json['status']=0;
                    Session::flash('error', "<div class='alert alert-danger mt-3'>Something went wrong.</div>");
                }
            }
            echo json_encode($json);
    }

}
