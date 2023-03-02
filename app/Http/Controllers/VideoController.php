<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoModel;
use Validator;
use Illuminate\Validation\Rule;

class VideoController extends Controller
{
    public function index()
    {
        //Auth::logout();
        $user = auth()->user();
        $videos = VideoModel::where('user_id',$user->id)->orderBy('id','desc')->get();


        return view('user.my-video', compact("user","videos"));
    }
    public function addVideo()
    {
        //Auth::logout();
        $user = auth()->user();

       


        return view('user.add-video', compact("user"));
    }
    public function editVideo(Request $request)
    {
        //Auth::logout();
        $user_id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'id' => [
                'required',
                Rule::exists('videos', 'id')
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
            return redirect('/my-videos');
        }

       $gallery = VideoModel::where('id',$request->id)->first();


        return view('user.edit-video', compact("gallery"));
    }
    public function deleteVideo(Request $request)
    {
        //Auth::logout();
        $user_id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'id' => [
                'required',
                Rule::exists('videos', 'id')
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
            return redirect('/my-video');
        }

       $gallery = VideoModel::where('id',$request->id)->delete();

       session()->flash('message', '<div class="alert alert-success">Gallery has been deleted successfully.</div>');
       return redirect('/my-video');
    }


    public function addVideoPost(Request $request)
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
            'thumb' => [
                'required',
                'mimes:jpeg,png,bmp,pdf,jpg',
                //'max:2000'
            ],
            'trailer' => [
                'required',
                'mimetypes:video/mp4,video/webm,video/quicktime,video/x-msvideo,video/x-matroska,video/3gpp,video/x-ms-wmv',
                //'max:2000'
            ],
            'video' => [
                'required',
                'mimetypes:video/mp4,video/webm,video/quicktime,video/x-msvideo,video/x-matroska,video/3gpp,video/x-ms-wmv',
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

            $gallery = new VideoModel;

            $gallery->user_id = auth()->user()->id;
            $gallery->title = $request->title;
            $gallery->status = $request->status;
            $gallery->is_free = $request->is_free;
            if ($request->credits) {
                $gallery->credits = $request->credits;
            }
            $gallery->description = $request->description;

            $fileName = rand() . time() . '.' . $request->file('video')->extension();
            $path = 'uploads/video/';
            $request->file('video')->move(public_path($path), $fileName);
            $gallery->video = $path . $fileName;

            $fileName = rand() . time() . '.' . $request->file('trailer')->extension();
            $path = 'uploads/trailer/';
            $request->file('trailer')->move(public_path($path), $fileName);
            $gallery->trailer = $path . $fileName;

            $fileName = rand() . time() . '.' . $request->file('thumb')->extension();
            $path = 'uploads/thumb/';
            $request->file('thumb')->move(public_path($path), $fileName);
            $gallery->thumb = $path . $fileName;

            $gallery->save();

            return response()->json([
                'status' => 1,
                'message' => 'Video has been added successfully'
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
                Rule::exists('videos', 'id')
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
            'thumb' => [
                //'required',
                'mimes:jpeg,png,bmp,pdf,jpg',
                //'max:2000'
            ],
            'trailer' => [
                //'required',
                'mimetypes:video/mp4,video/webm,video/quicktime,video/x-msvideo,video/x-matroska,video/3gpp,video/x-ms-wmv',
                //'max:2000'
            ],
            'video' => [
                //'required',
                'mimetypes:video/mp4,video/webm,video/quicktime,video/x-msvideo,video/x-matroska,video/3gpp,video/x-ms-wmv',
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

            $gallery = VideoModel::where('id', $request->id)
                //->where('user_id', auth()->user()->id)
                ->first();


            $gallery->title = $request->title;
            $gallery->status = $request->status;
            $gallery->is_free = $request->is_free;
            if ($request->credits) {
                $gallery->credits = $request->credits;
            }
            $gallery->description = $request->description;

            if ($request->file('video')) {

                $fileName = rand() . time() . '.' . $request->file('video')->extension();
                $path = 'uploads/video/';
                $request->file('video')->move(public_path($path), $fileName);
                $gallery->file = $path . $fileName;
            }

            if ($request->file('trailer')) {

                $fileName = rand() . time() . '.' . $request->file('trailer')->extension();
                $path = 'uploads/trailer/';
                $request->file('trailer')->move(public_path($path), $fileName);
                $gallery->trailer = $path . $fileName;
            }

            if ($request->file('thumb')) {

                $fileName = rand() . time() . '.' . $request->file('thumb')->extension();
                $path = 'uploads/thumb/';
                $request->file('thumb')->move(public_path($path), $fileName);
                $gallery->thumb = $path . $fileName;
            }

            $gallery->save();

            return response()->json([
                'status' => 1,
                'message' => 'Video has been updated successfully'
            ], 200);
        }
    }
}
