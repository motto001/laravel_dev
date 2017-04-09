<?php

namespace App\Http\Controllers\proba;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class ProbaController extends Controller
{
	public function index()
	    {
		return 'proba index function';
	}
	public function create()
	{
		
		return 'proba create function';
	}
	public function show($photoId)
	     {
		echo 'fotoid:'.$photoId;
		
	}
	public function valami()
	    {
		$g=Config::get('proba.proba.t1');
		// 		return 'hhhh'.$g;
		// 		print_r(Auth::user());
		if(Auth::id()>0){
			echo 'belepve' ;
		}
		else{
			return response()->view('auth.errors.403') ;
		}
		//C		onfig::set('app.name','gfgggg');
		//$		g=Config::get('app.name');
		// 		return 'hhhh'.$g;
		//p		rint_r($g);
		
	}
}
