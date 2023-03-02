<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\AdminModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category_list(REQUEST $request){

    	$data = CategoryModel::orderBy('id','desc')->get();
    	return view('admin.category-list', compact('data'));

    }

    public function add_category(REQUEST $request){

    	//print_r($_REQUEST);

    	$rules = [
           'name' => 'required' ,
           'heading' =>'required',
           'description' =>'required',
           'footer_description' => 'required',
        ];

         $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{

			$slug = Str::slug($request->name);
			$originalSlug = $slug;
			$i = 1;
			while (CategoryModel::where('slug', $slug)->exists()) {
				$slug = $originalSlug . '-' . $i++;
			}


        	$insert['slug'] = $slug;
        	$insert['name'] = $request->name;
        	$insert['heading'] = $request->heading;
        	$insert['descrition'] = $request->description;
        	$insert['footer_description'] = $request->footer_description;
        	$insert['created_at'] = date('Y-m-d H:i:s');
        	$run = CategoryModel::insert($insert);
        	if($run){
        		$json['status'] = 1;
        		 Session::flash('message', '<div class="alert alert-success mt-3">Category has been added successfully</div>');
            
        	}else{
        		$json['status'] = 0;
        		Session::flash('error', "<div claas='alert alert-danger mt-3'>Something went wrong.</div>");
        	}
        }

        echo json_encode($json);


    }

    public function edit_category(REQUEST $request){
    	$id = $request->id;
    	$data = CategoryModel::where('id',$id)->get()->first();
    	return view('admin.edit-category', compact('data'));
    }

    public function category_update(REQUEST $request){
    		$rules = [
           'name' => 'required' ,
           'heading' =>'required',
           'description' =>'required',
           'footer_description' => 'required',
        ];
    
        $id = $request->id;

         $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            $json['validation'] = $validator->errors();
            $json['status'] = 0;
        }else{

			$slug = Str::slug($request->name);
			$originalSlug = $slug;
			$i = 1;
			while (CategoryModel::where('slug', $slug)->where('id','!=' ,$id)->exists()) {
				$slug = $originalSlug . '-' . $i++;
			}


        	$update['slug'] = $slug;

        	$update['name'] = $request->name;
        	$update['heading'] = $request->heading;
        	$update['descrition'] = $request->description;
        	$update['footer_description'] = $request->footer_description;
        	$update['updated_at'] = date('Y-m-d H:i:s');

        	$run = CategoryModel::where('id',$id)->update($update);

        	if($run){
        		$json['status'] =1;
        		Session::flash('message','<div class="alert alert-success mt-3">Category has been update successfully.</div>');

        	}else{
        		$json['status'] =0;
        		Session::flash('message','<div class="alert alert-success mt-3">Something went wrong.</div>');
        	}
        }	

        echo json_encode($json);
    }

    public function delete_category(REQUEST $request){

    	$id = $request->id;
    	$run = CategoryModel::where('id',$id)->delete();

    	if($run){
    		Session::flash('message',"<div class='alert alert-success mt-3'>Category deleted successfully.</div>");
    			return back()->with('message','<div class="alert alert-success mt-3">Category has been deleted successfully.</div>');
    	}else{

    			return back()->with('message','Something went wrong');
    	}
    }

}
