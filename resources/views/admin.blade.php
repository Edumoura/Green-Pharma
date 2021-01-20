@extends('layouts.adminApp')

@section('content')
<!-- Content Wrapper. Contains page content -->
<style type="text/css">

.inputFile {
width: 185px;
height:60px;
position: relative;
overflow: hidden;
background: #F8F8FF;
color: #4682B4;
box-shadow: 0px 4px 9px -5px rgba(0,0,0,0.75);
margin-bottom: 10px;
}
.inputFile span {
  padding: 10px;
  padding-right: 50px;                 
  display: block;
  position: absolute;
  margin-top: 10px;
  margin-left: 15px;
  box-shadow: 0px 4px 9px -6px rgba(0,0,0,0.75);
}
.inputFile input {
  position: absolute;
  right: 0;
  z-index: 2;
  font-size: 100px; /* Aumenta tamanho do campo */
  opacity: 0;
  filter: alpha(opacity=0);
  cursor: pointer;
}

.table-overflow {
  max-height:400px;                  
  overflow-y:auto;
} 

.btn {
font-family: arial;
  font-size:14px;
  text-transform: uppercase;
  font-weight:700;
  border:none;
  padding:10px;
  cursor: pointer;
  display:inline-block;
  text-decoration: none;
  box-shadow:0 5px 0 #C0C0C0;
}

.btn:hover{

  background:#F5DEB3;
  
} 

.btn:active{

  position:relative;
  top:5px;
  box-shadow:none;
}

</style>
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="Instrucao" style="margin-left: 15px;">
                         <div class="content-header" style="padding-top: 10px;margin-bottom: -25px;">
                          <h2>Instrução para importar arquivos</h2>    
                        </div><br>
                        <p class="center" style="background-color: #F5F5F5;padding: 20px;box-shadow: 0px 4px 9px -9px rgba(0,0,0,0.75);margin-top: -15px;margin-left: -15px;margin-right: -15px;border:2px solid  #4F4F4F;margin-top: 20px;" >

                         <span style="color:#4F4F4F; font-size:1.9rem;padding: 5px;"> 
                          O arquivo deverar ser no formado xls ou xlsx, caso não seja o sistema não poderar salvar os dados. Antes de fazer o upload do arquivo, informe a sigla do Estado de onde está importando o arquivo.
                         </span>
                    </div>  
                    <form method="POST" action="{{route('anexo')}}" enctype="multipart/form-data">
                       @csrf 
                       <div style="padding: 10px; margin-top: 10px;margin-left: -10px;" class="input-group">

                          <label for="estado" class="control-label" style='font-size: 1.80rem;' >Estado</label><br>

                          <input type="text" name="estado" id="estado" placeholder="Informe a sigla do Estado">
                         
                       </div>
                        @if($errors->has('estado'))
                        <div class="invalid-feedback">
                         {{ $errors->first('estado')}}
                        </div>
                        @endif 
                       <div id="divarquivo" class="inputFile">
                        <span>
                          <img src="{{ asset('img/outline_attach_file_black_18dp.png') }}">importar arquivo Excel
                        </span>
                        <input class="file-input" type="file"   name="arquivo" class="form-control {{$errors->has('arquivo') ? 'is-invalid' : ''}}" id="arquivo">
                       </div> 
                       @if($errors->has('arquivo'))
                        <div class="invalid-feedback">
                         {{ $errors->first('arquivo')}}
                        </div>
                        @endif  
                        @if (\Session::has('sussec'))
                          <div id="erroPrimLinha" style="background-color:#708090;color:#FFFAFA;padding: 5px; margin-top:5px;margin-left: 0px;display: block;">
                            <ul>
                              <li>{!! \Session::get('sussec') !!}</li>
                            </ul>
                          </div>
                      @endif                                         
                      <button type="submit" id='btn-envi' class="btn btn-sm btn-primary">Enviar</button>                      
                    </form>                    
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('uploadJs')
<script type="text/javascript">

    $("#arquivo").change(function() {
       $(this).prev().html($(this).val());
    });  

</script>
@endsection
