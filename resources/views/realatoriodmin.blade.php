@extends('layouts.adminApp')

@section('content')
<!-- Content Wrapper. Contains page content -->
<style type="text/css">

#form_relatorio{

    background-color: #FFFFFF;

}

.input-group{
    padding: 10px;
}

.table-overflow {
  
  max-width: 1100px;
  overflow-y: auto;
  margin-left: -15px;
}

table {
  color: #333;
  font-size: .9em;
  font-weight: 300;
  line-height: 40px;
  border-collapse: separate;
  border-spacing: 0;
  border: 2px solid #B0C4DE;
  width: 500px;
  margin: 50px auto;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,.16);
  border-radius: 2px;
}

th {
  background: #FFFFFF;
  color: #C0C0C0;
  border: none;
}

tr:hover:not(th) {background-color: #C0C0C0;}


input[type="button"] {
  transition: all .3s;
    border: 1px solid #ddd;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
  font-size: 15px;
}

input[type="button"]:not(.active) {
  background-color:transparent;
}

.active {
  background-color: #B0C4DE;
  color :#fff;
}

input[type="button"]:hover:not(.active) {
  background-color: #C0C0C0;
}



</style>
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                 @if(!isset($dadosArquivo))                   
                    <form  method="POST" action="{{route('relatorioadminbusca')}}" enctype="multipart/form-data">
                       @csrf 
                       <div class="row" id="form_relatorio">
                        <div class="col-md-12">
                            <h4>Formulário de Busca</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                              <label for="tipo_relatorio" class="control-label" >Tipo de Relatório</label><br>
                              <select id="tipo_relatorio" name="tipo_relatorio" required ></br>
                                <option value="EAN">Quantidade Vendida</option>
                                <option value="EAN">Valor Vendido</option>                           
                              </select>
                            </div>                           
                        </div>
                           <div class="col-md-6">
                            <div class="input-group" >
                              <label for="industria" class="control-label" >Indústria</label><br>
                              <select id="industria" name="industria" required ></br>
                                <option value="EAN">EMS S/A</option>
                                <option value="EAN">HYPERA S/A</option>                           
                              </select>
                            </div>                           
                           </div>
                           <div class="col-md-6">
                            <div class="input-group">
                              <label for="unidade" class="control-label" >Unidade</label><br>
                              <select id="unidade" name="unidade" required></br>
                                <option value="PE">Green Pharma - PE</option>
                                <option value="BA">Green Pharma - BA</option>
                                <option value="Mg">Green Pharma - MG  </option>
                               
 
                         
                              </select>
                            </div>                           
                           </div>
                           <div class="col-md-6">
                            <div class="input-group">
                             <label for="dt_inicio" class="control-label" >Data Início</label><br>    
                              <input type="date" name="dt_inicio" id="dt_inicio">                             
                            </div>
                            @if($errors->has('dt_inicio'))
                            <div class="invalid-feedback">
                             {{ $errors->first('dt_inicio')}}
                            </div>
                            @endif                            
                           </div>
                           <div class="col-md-12">
                            <div class="input-group">
                            <label for="dt_Fim" class="control-label" >Data Fim</label><br>       
                              <input type="date" name="dt_Fim" id="dt_Fim">                             
                            </div> 
                            @if($errors->has('dt_Fim'))
                            <div class="invalid-feedback">
                             {{ $errors->first('dt_Fim')}}
                            </div>
                            @endif                           
                           </div>
                           <div class="col-md-12" style="margin:10px;">
                            <button type="submit" id='btn-envi' class="btn btn-sm btn-primary">Enviar</button>     
                           </div>                          
                       </div>                                           
                    </form>
                    @if (\Session::has('alerta'))
                      <div id="divsussec_alerta" style="background-color:#FF7F50;color:#FFFAFA;padding: 5px; margin-top:5px;margin-left: 0px;">
                        <ul>
                          <li>{!! \Session::get('alerta') !!}</li>                                  
                        </ul>
                      </div>
                    @endif
                    @else                    
                    <div  class="table-overflow" id="conteudo">
                      <div class="col-md-12" style="margin-left:-28px;">
                        <div class="col-md-6" style="margin-top:10px;">
                          <label>Filtrar por Todos os Campos</label><br>
                          <input style="width: 300px;" id=InputCamposAdmin type=text placeholder=Procurar..>    
                        </div>       
                      </div>                     
                         <table id="tbarquivo"  class="table table-striped">
                            <thead style="font-size: 1.30rem;">                    
                              @foreach($cab_arquivo as $c_ar)
                              <th style="text-align: center;">{{$c_ar->cabecalho_nome}}</th>
                                @endforeach                              
                            </thead>                        
                            <tbody style='background-color: white;font-size: 1.15rem;'>
                                @foreach($dadosArquivo as $d)
                                <tr id="admin_tr">
                                    <td>{{$d->CodigodoProduto}}</td>
                                    <td>{{$d->EAN}}</td>
                                    <td>{{$d->Descricao}}</td>
                                    <td>{{$d->Fornecedor}}</td>
                                    <td>{{$d->valor_1}}</td>
                                    <td>{{$d->valor_2}}</td>
                                    <td>{{$d->valor_3}}</td>
                                    <td>{{$d->valor_4}}</td>
                                    <td>{{$d->valor_5}}</td>
                                    <td>{{$d->valor_6}}</td>
                                    <td>{{$d->valor_7}}</td>
                                    <td>{{$d->valor_8}}</td>
                                    <td>{{$d->valor_9}}</td>
                                    <td>{{$d->valor_10}}</td>
                                    <td>{{$d->valor_11}}</td>
                                    <td>{{$d->valor_12}}</td>
                                    <td>{{$d->valor_13}}</td>
                                    <td>{{$d->valor_14}}</td>
                                    <td>{{$d->valor_15}}</td>
                                    <td>{{$d->valor_16}}</td>
                                    <td>{{$d->valor_17}}</td>
                                    <td>{{$d->valor_18}}</td>
                                    <td>{{$d->valor_19}}</td>
                                    <td>{{$d->valor_20}}</td>
                                    <td>{{$d->valor_21}}</td>
                                    <td>{{$d->valor_22}}</td>
                                    <td>{{$d->valor_23}}</td>
                                    <td>{{$d->valor_24}}</td>

                                </tr>                            
                                @endforeach                          
                                
                            </tbody>  
                        </table> 
                                         
                    </div>                   
                    <div class="row">
                        <div class="col-md-12">
                            <a type="button" class="btn btn-primary" href="{{route('ralatorioadmin')}}">Nova busca</a>
                        </div>                        
                    </div>      

                    @endif                                  
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('relatorioJs')
<script type="text/javascript">

   $( document ).ready(function(){
    $("#InputCamposAdmin").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#tbarquivo, #admin_tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });   
    });
  });

  $("#InputCamposAdmin").click(function(){

    $("#InputCamposAdmin").val('');

  });

  var $table = document.getElementById("tbarquivo"),

  $n = 8,

  $rowCount = $table.rows.length,

  $firstRow = $table.rows[0].firstElementChild.tagName,

  $hasHead = ($firstRow === "TH"),

  $tr = [],

  $i,$ii,$j = ($hasHead)?1:0,

  $th = ($hasHead?$table.rows[(0)].outerHTML:"")

  var $pageCount = Math.ceil($rowCount / $n);

  if ($pageCount > 1) {
  
  for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
    $tr[$ii] = $table.rows[$i].outerHTML;
  
  $table.insertAdjacentHTML("afterend","<div id='buttons'></div");
 
  sort(1);
}


function sort($p) {
 
  var $rows = $th,$s = (($n * $p)-$n);
  for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
    $rows += $tr[$i];
  
  
  $table.innerHTML = $rows;
  
  document.getElementById("buttons").innerHTML = pageButtons($pageCount,$p);
  
  document.getElementById("id"+$p).setAttribute("class","active");
}



function pageButtons($pCount,$cur) {
  
  var $prevDis = ($cur == 1)?"disabled":"",
    $nextDis = ($cur == $pCount)?"disabled":"",
   
    $buttons = "<input type='button' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
  for ($i=1; $i<=$pCount;$i++)
    $buttons += "<input type='button' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
  $buttons += "<input type='button' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+">";
  return $buttons;
}
  

   

</script>
@endsection
