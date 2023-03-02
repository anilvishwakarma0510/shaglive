<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
	{
		//$data = ContentDataModel::where('id',2)->first(['data']);
		return view('user.home');
	}

	public function terms()
	{
		//$data = ContentDataModel::where('id',2)->first(['data']);
		return view('user.terms-and-conditions');
	}

	public function privacy()
	{
		//$data = ContentDataModel::where('id',2)->first(['data']);
		return view('user.privacy-policy');
	}
}
