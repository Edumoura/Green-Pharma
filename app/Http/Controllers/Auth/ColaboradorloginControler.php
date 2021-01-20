<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

use App\Colaborador;


class ColaboradorloginControler extends Controller
{
	public function __construct(){	 	

        $this->middleware('guest:colaborador');    

    }

    public function login(Request $request){



    	$this->validateLogin($request);

    	$credenciais = [
    		'email' => $request->input('email'),
    		'password' =>  $request->input('password')
    	];

    	

    	$authOK = Auth::guard('colaborador')->attempt($credenciais,$request->remember);
    	//echo $authOK;
    	//exit;

    	if($authOK){
    		
    	   return redirect()->intended(route('colaborador.dashboard'));    		

    	}

    	return redirect()->back()->withImputs($request->only('email','remember'));
    }

    public function index(){

    	return view('auth.logincolab');

    }

    protected function validateLogin(Request $request){

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }


    
}
