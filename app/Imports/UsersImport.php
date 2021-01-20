<?php

namespace App\Imports;

use App\dadosarquivo;
use App\arquivo_mesAno;
use App\cabecalho_arquivo;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Session;
use DateTime;

use Log;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 

      $regiao = Session::get('Regiao'); 

      $novadata = new DateTime();    
      $dataatual = $novadata->format('Y-m-d');    
       

        $Nlinhas = count($row);

        if (!intval($row[0])){

             $temporada = cabecalho_arquivo::orderBy('id', 'asc')
                            ->select('id')
                            ->get(); 

              if (json_encode($temporada)=='[]') {

                for ($i=0; $i < $Nlinhas; $i++) {

                    $cab = new cabecalho_arquivo();
                    $cab->cabecalho_nome = $row[$i];
                    $cab->save();
        

                }
             }                
           
        }

       


        if (intval($row[0])) { 
            

            $tb1 = array();
            

            for ($i=0; $i < $Nlinhas; $i++) {

               array_push($tb1 , $row[$i]);
                
            }

            try {
                DB::beginTransaction();

               $arq = new dadosarquivo();
               $arq->CodigodoProduto = $tb1[0];
               $arq->EAN = $tb1[1];
               $arq->Descricao = $tb1[2];
               $arq->Fornecedor = $tb1[3];
               $arq->valor_1 = $tb1[4];
               $arq->valor_2 = $tb1[5];
               $arq->valor_3 = $tb1[6];
               $arq->valor_4 = $tb1[7];
               $arq->valor_5 = $tb1[8];
               $arq->valor_6 = $tb1[9];
               $arq->valor_7 = $tb1[10];
               $arq->valor_8 = $tb1[11];
               $arq->valor_9 = $tb1[12];
               $arq->valor_10 = $tb1[13];
               $arq->valor_11 = $tb1[14];
               $arq->valor_12 = $tb1[15];
               $arq->valor_13 = $tb1[16];
               $arq->valor_14 = $tb1[17];
               $arq->valor_15 = $tb1[18];
               $arq->valor_16 = $tb1[19];
               $arq->valor_17 = $tb1[20];
               $arq->valor_18 = $tb1[21];
               $arq->valor_19 = $tb1[22];
               $arq->valor_20 = $tb1[23];
               $arq->valor_21 = $tb1[24];
               $arq->valor_22 = $tb1[25];
               $arq->valor_23 = $tb1[26];
               $arq->valor_24 = $tb1[27];
               $arq->regiao = $regiao;
               $arq->dt_arquivo = $dataatual;
               $arq->save(); 


                DB::commit();
                
            } catch (Exception $e) {

                Log::error('Erro ao cadastrar Dados do arquivo ' . $e->getMessage());  
                
            }            
            
        }      
        
    }
}
