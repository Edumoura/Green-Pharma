<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\cabecalho_arquivo;

use Session;

class ColaboradorController extends Controller
{

	 public function __construct(){


       $this->middleware('auth:colaborador');
       

    }
	

	public function index(){

	return view('analista');

	}


	public function busca(Request $request){

		$regras = [
            'dt_inicio' => 'required',
            'dt_Fim' => 'required'
        ];

        $mensagens = [          

            'dt_inicio.required'=> 'Atenção não foi passada a data de início!',
             'dt_Fim.required'=> 'Atenção não foi passada a data de fim!',
            
        ];

        $request->validate($regras,$mensagens);

		$tipo_relatorio = $request->input('tipo_relatorio');
		$industria = $request->input('industria');
		$unidade = $request->input('unidade');
		$dt_inicio = $request->input('dt_inicio');
		$dt_Fim = $request->input('dt_Fim');		

		$dadosArquivo = DB::connection('mysql')
        ->select('call select_arquivo(?,?,?,?,?)',array($tipo_relatorio, $industria,$unidade,$dt_inicio,$dt_Fim));	
		
		$cab_arquivo = cabecalho_arquivo::all();

		if (json_encode($dadosArquivo) == '[]') {

			$alerta = 'Não foi possível retornar os dados do arquivo, é provável que os dados da consulta não existam no cadastro!';
            return redirect()->back()->with(compact('alerta'));
			
		}else{

			return view('analista',compact('dadosArquivo','cab_mesano','cab_arquivo'));

		}
		

	}


}
