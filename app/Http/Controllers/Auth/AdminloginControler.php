<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminloginControler extends Controller
{
	public function __construct(){	 	

        $this->middleware('guest:admin');    

    }

    public function login(Request $request){

    	$this->validateLogin($request);

    	$credenciais = [
    		'email' => $request->input('email'),
    		'password' =>  $request->input('password')
    	];

    	//var_dump($credenciais);
        

    	$authOK = Auth::guard('admin')->attempt($credenciais,$request->remember);
    	//echo 'authOK ' . $authOK;
       //echo '<br>';
    	

    	if($authOK){

            //echo  'dentro do authOK';
            //exit;

    		return redirect()->intended(route('admin.dashboard'));

    	}

    	return redirect()->back()->withImputs($request->only('email','remember'));
    }

    public function index(){

    	return view('auth.loginAdmin');

    }

    protected function validateLogin(Request $request){

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }


    
}
