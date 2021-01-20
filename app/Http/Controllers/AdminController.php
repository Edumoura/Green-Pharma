<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{

	 public function __construct(){

	 	//echo "__construct";
        //exit;

       $this->middleware('auth:admin');
       //$this->middleware('auth.admin');

    }
	

	public function index(){

		return view('admin');

	}


}
