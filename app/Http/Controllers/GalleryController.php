<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Mail\EmailTemplate;
use App\Models\GallaryModel;
use URL;
use Mail;
use Validator;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    public function index()
    {
        //Auth::logout();
        $user = auth()->user();
        $galleries = GallaryModel::where('user_id',$user->id)->orderBy('id','desc')->get();


        return view('user.my-gallery', compact("user","galleries"));
    }
    public function addGallery()
    {
        //Auth::logout();
        $user = auth()->user();

       


        return view('user.add-gallery', compact("user"));
    }
    public function editGallery(Request $request)
    {
        //Auth::logout();
        $user_id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'id' => [
                'required',
                Rule::exists('gallary', 'id')
                    ->where(function ($query) use ($user_id) {
                        $query->where('user_id', $user_id);
                    })
            ]
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = '<ul class="alert alert-danger" style="padding:5px">';
            foreach ($errors as $error) {
                $message .= '<li>' . $error . '</li>';
            }
            $message .= '</ul>';
            session()->flash('message', $message);
            return redirect('/my-gallery');
        }

       $gallery = GallaryModel::where('id',$request->id)->first();


        return view('user.edit-gallery', compact("gallery"));
    }
    public function deleteGallery(Request $request)
    {
        //Auth::logout();
        $user_id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'id' => [
                'required',
                Rule::exists('gallary', 'id')
                    ->where(function ($query) use ($user_id) {
                        $query->where('user_id', $user_id);
                    })
            ]
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = '<ul class="alert alert-danger" style="padding:5px">';
            foreach ($errors as $error) {
                $message .= '<li>' . $error . '</li>';
            }
            $message .= '</ul>';
            session()->flash('message', $message);
            return redirect('/my-gallery');
        }

       $gallery = GallaryModel::where('id',$request->id)->delete();

       session()->flash('message', '<div class="alert alert-success">Gallery has been deleted successfully.</div>');
       return redirect('/my-gallery');
    }


    public function addGalleryPost(Request $request)
    {
        //echo '<pre>'; print_r($request->all()); die();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' =>  [
                'required',
                Rule::in([0, 1, 2])
            ],
            'is_free' =>  [
                'required',
                Rule::in([1, 2])
            ],
            'credits' => 'required_if:is_free,2|numeric',
            'description' => 'required',
            'file' => [
                'required',
                'mimes:jpeg,png,bmp,pdf,jpg',
                //'max:2000'
            ],
        ]);

        if ($validator->fails()) {
            //return $this->sendError('Validation Error.', $validator->errors()->all());

            $errors = $validator->errors()->all();
            $message = '<ul class="alert alert-danger" style="padding:5px">';
            foreach ($errors as $error) {
                $message .= '<li>' . $error . '</li>';
            }
            $message .= '</ul>';
            return response()->json([
                'status' => 0,
                'message' => $message
            ], 200);
        } else {

            $gallery = new GallaryModel;

            $gallery->user_id = auth()->user()->id;
            $gallery->title = $request->title;
            $gallery->status = $request->status;
            $gallery->is_free = $request->is_free;
            if ($request->credits) {
                $gallery->credits = $request->credits;
            }
            $gallery->description = $request->description;

            $fileName = rand() . time() . '.' . $request->file('file')->extension();
            $path = 'uploads/gallery/';
            $request->file('file')->move(public_path($path), $fileName);
            $gallery->file = $path . $fileName;

            $gallery->save();

            return response()->json([
                'status' => 1,
                'message' => 'Gallary has been added successfully'
            ], 200);
        }
    }
    public function updateGalleryPost(Request $request)
    {
        $user_id = auth()->user()->id;
        //echo '<pre>'; print_r($request->all()); die();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'id' => [
                'required',
                Rule::exists('gallary', 'id')
                    ->where(function ($query) use ($user_id) {
                        $query->where('user_id', $user_id);
                    })
            ],
            'status' =>  [
                'required',
                Rule::in([0, 1, 2])
            ],
            'is_free' =>  [
                'required',
                Rule::in([1, 2])
            ],
            'credits' => 'required_if:is_free,2|numeric',
            'description' => 'required',
            'file' => [
                //'required',
                'mimes:jpeg,png,bmp,pdf,jpg',
                //'max:2000'
            ],
        ]);

        if ($validator->fails()) {
            //return $this->sendError('Validation Error.', $validator->errors()->all());

            $errors = $validator->errors()->all();
            $message = '<ul class="alert alert-danger" style="padding:5px">';
            foreach ($errors as $error) {
                $message .= '<li>' . $error . '</li>';
            }
            $message .= '</ul>';
            return response()->json([
                'status' => 0,
                'message' => $message
            ], 200);
        } else {

            $gallery = GallaryModel::where('id', $request->id)
                //->where('user_id', auth()->user()->id)
                ->first();


            $gallery->title = $request->title;
            $gallery->status = $request->status;
            $gallery->is_free = $request->is_free;
            if ($request->credits) {
                $gallery->credits = $request->credits;
            }
            $gallery->description = $request->description;

            if ($request->file('file')) {

                $fileName = rand() . time() . '.' . $request->file('file')->extension();
                $path = 'uploads/gallery/';
                $request->file('file')->move(public_path($path), $fileName);
                $gallery->file = $path . $fileName;
            }

            $gallery->save();

            return response()->json([
                'status' => 1,
                'message' => 'Gallary has been added successfully'
            ], 200);
        }
    }
}
