<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\UsersImport;

use Excel;

use Session;


class uploadController extends Controller
{	



	public function salvarArquivo(Request $request){

		$regras = [
            'arquivo' => 'required|mimes:xls,xlsx',
            'estado' => 'required'
        ];

        $mensagens = [          

            'arquivo.required'=> 'O formato do arquivo deverar ser em xls ou xlsx!',
             'estado.required'=> 'Digite o estado!',
            
        ];

        $request->validate($regras,$mensagens);
		 
         $regiao = $request->input('estado');
         session(['Regiao' => $regiao]);

		 $path = $request->file('arquivo')->getRealPath();

		 $data = Excel::import(new UsersImport, $path);      

		return redirect()->back()->with('sussec', 'Os dados foram cadastrados com sussesso!');

	}


}
