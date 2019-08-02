@extends('admin.dashboard')

@section('content')
<script>

        $(document).ready(inicio);
        
            function inicio()
            {
                $("#boton").click(function(){
                    if( validar() == false){
                        $('#alerta').addClass("alert alert-danger");
                        $('#alerta').text('Campos Incompletos');
                    }
                    else{
                        $("#boton").attr("type","submit");
                        $("#loginform").attr("action","{{ url('/obra') }}");
                    }
                });
        
                $("#boton2").click(function() {
                    limpiar();
                    $("#loginform").attr("action","{{ url('/guardarobra') }}");
                })
            }
            function limpiar() { 
                $('#iconotitulo').remove();
                $('#iconotipo').remove();
                $('#iconoimpacto').remove();
                $('#icononoautores').remove();

    
             }    
            function validar(){
                        var valido = true;
                        var titulo = $("#titulo").val();
                        var noautores = $("#noautores_obra").val();
                        var tipo = $("#tipo").val();
                        var impacto = $('#impacto').val();

    
                        if( titulo == null || titulo.length == 0 || /^\s+$/.test(titulo)){
                            $('#iconotitulo').remove();
                            $("#titulo-group").attr("class","has-error input-group");
                            $("#titulo-group").append("<span id='iconotitulo' class='fa fa-close form-control-feedback'></span>");
                            $("#titulo").attr("placeholder","Debe Añadir un titulo");
                            valido=false;
                        }else{
                            $('#iconotitulo').remove();
                            $("#titulo-group").attr("class","has-success input-group");
                            $("#titulo-group").append("<span id='iconotitulo' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }
    
                        if( tipo == null || tipo.length == 0 || /^\s+$/.test(tipo)){
                            $('#iconotipo').remove();
                            $("#tipo-group").attr("class","has-error input-group");
                            $("#tipo-group").append("<span id='iconotipo' class='fa fa-close form-control-feedback'></span>");
                            valido=false;
                        }else{
                            $('#iconotipo').remove();
                            $("#tipo-group").attr("class","has-success input-group");
                            $("#tipo-group").append("<span id='iconotipo' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }
    
                        if( noautores == null || noautores.length == 0 || /^\s+$/.test(noautores)){
                            $('#icononoautores').remove();
                            $("#noautores-group").attr("class","has-error input-group");
                            $("#noautores-group").append("<span id='icononoautores' class='fa fa-close form-control-feedback'></span>");
                            $("#noautores_obra").attr("placeholder","Ingrese el numero de autores");
                            valido=false;
                        }else{
                            $('#icononoautores').remove();
                            $("#noautores-group").attr("class","has-success input-group");
                            $("#noautores-group").append("<span id='icononoautores' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }
    
                        if( impacto == null || impacto.length == 0 || /^\s+$/.test(impacto)){
                            $('#iconoimpacto').remove();
                            $("#impacto-group").attr("class","has-error input-group");
                            $("#impacto-group").append("<span id='iconoimpacto' class='fa fa-close form-control-feedback'></span>");
                            $("#impacto_articulo").attr("placeholder","Ingrese el numero de autores");
                            valido=false;
                        }else{
                            $('#iconoimpacto').remove();
                            $("#impacto-group").attr("class","has-success input-group");
                            $("#impacto-group").append("<span id='iconoimpacto' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }
        
        
                    return valido;
              }	
                    
        </script>
<div class="section" >
    <div class=""> 
            <center>
                    <div id="alerta" style="width:700px" class="text-center">
                        </div> 
            </center>    
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-8 col-md-offset-2">                    
                <div class="panel panel-success" >
                        <div class="panel-heading">
                            <div class="panel-title">Datos de la Obra Artistica</div>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px">Revise sus Datos sean correctos</div>
                        </div>     
    
                        <div style="padding-top:30px" class="panel-body" >
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <h5>Por favor corrija los siguientes errores</h5>
                                   <ul>
                                           @foreach ($errors->all() as $error)
                                           <li>{{$error}}</li>
                                            @endforeach
                                   </ul>
                            </div>
                            @endif
                            <form id="loginform" method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                <div id="titulo-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Titulo</span>
                                <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo')}}">                                   
                                        </div>

                                <div id="tipo-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Tipo</span>
                                            <select id="tipo" class="form-control"  name="tipo">
                                                 <option disabled value="" selected> Seleccion un tipo de Obra</option>
                                                            <option value="Original">Original</option>
                                                            <option value="Complementaria">Complementaria</option>
                                                            <option value="Interpretacion">Interpretacion</option>
                                                          </select>                                         
                                </div>  

                                <div id="impacto-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Impacto</span>
                                            <select  id="impacto" class="form-control" required name="impacto">
                                                 <option disabled value="" selected>Seleccione el nivel de Impacto</option>
                                                 @if (isset(auth()->user()->Docente()->Productividad()->obras))
                                                 @if (auth()->user()->Docente()->Productividad()->obras <5)
                                                     <option value="Internacional">Internacional</option>
                                                     <option value="Nacional">Nacional</option>
                                                 @endif
                                                 @if (auth()->user()->Docente()->Productividad()->obrasbon <5)
                                                     <option value="Regional">Regional</option>
                                                     <option value="Local">Local</option>
                                                 @endif 
                                              @else
                                              <option value="Internacional">Internacional</option>
                                              <option value="Nacional">Nacional</option>
                                              <option value="Regional">Regional</option>
                                              <option value="Local">Local</option>
                                              @endif
                                            </select>                                         
                                </div> 

                                <div id="noautores-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('noautores') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores_obra" type="number" class="form-control"  name="noautores" min="1" value="{{old('noautores')}}">
                                
                                </div>
                                
                                    <div style="margin-top:10px" class="form-group">
                                        <div class="">
                                                @if (isset(auth()->user()->Docente()->Productividad()->obras))
                                                @if (auth()->user()->Docente()->Productividad()->obras <5 or auth()->user()->Docente()->Productividad()->obrasbon <5)
                                                    <center>
                                                            <div class="text center" style="justify-content:center">
                                                                <button id="boton" type="button" class="btn btn-success mr-4">Siguiente</button>
                                                                <button id="boton2" type="submit" class="btn btn-primary">Guardar</button>
                                                              </div>
                                                        </center>
                                                @endif
                                                
                                            @else
                                            <center>
                                                    <div class="text center" style="justify-content:center">
                                                        <button id="boton" type="button" class="btn btn-success mr-4">Siguiente</button>
                                                        <button id="boton2" type="submit" class="btn btn-primary">Guardar</button>
                                                      </div>
                                                </center>
                                            @endif
                                        </div>
                                    </div>
                                     
                                </form>       
                            </div>
                             
                        </div>  
            </div>
        </div>
</div>
@endsection