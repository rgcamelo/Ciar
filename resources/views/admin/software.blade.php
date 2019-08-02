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
                        $("#loginform").attr("action","{{ url('/software') }}");
                    }
                });
        
                $("#boton2").click(function() {
                    limpiar();
                    $("#loginform").attr("action","{{ url('/guardarsoftware') }}");
                })
            }
            function limpiar() { 
                $('#iconotitulo').remove();
                $('#icononoautores').remove();

    
             }    
            function validar(){
                        var valido = true;
                        var titulo = $("#titulo").val();
                        var noautores = $("#noautores").val();
                        var titulares = $("#titulares").val();
                        var credito = $("#credito").val();
                        var impacto = $("#impacto").val();
                        var codigo = $("#codigo").val();
                        var instrucciones = $("#instrucciones").val();
                        var manual = $("#manual").val();
                        var ejecutable = $("#ejecutable").val();
                        var certisoft = $("#certisoft").val();
                        var cvlac = $("#cvlac").val();
                        var gruplac = $("#gruplac").val();
                        var certimpacto = $("#certimpacto").val();

                        if( certimpacto == null || certimpacto.length == 0 || /^\s+$/.test(certimpacto)){
                            $('#iconocertimpacto').remove();
                            $("#certimpacto-group").attr("class","has-error input-group");
                            $("#certimpacto-group").append("<span id='iconocertimpacto' class='fa fa-close form-control-feedback'></span>");
                            $("#certimpacto").attr("placeholder","Debe añadir un certimpacto");
                            valido=false;
                        }else{
                            $('#iconocertimpacto').remove();
                            $("#certimpacto-group").attr("class","has-success input-group");
                            $("#certimpacto-group").append("<span id='iconocertimpacto' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( gruplac == null || gruplac.length == 0 || /^\s+$/.test(gruplac)){
                            $('#iconogruplac').remove();
                            $("#gruplac-group").attr("class","has-error input-group");
                            $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-close form-control-feedback'></span>");
                            $("#gruplac").attr("placeholder","Debe añadir un gruplac");
                            valido=false;
                        }else{
                            $('#iconogruplac').remove();
                            $("#gruplac-group").attr("class","has-success input-group");
                            $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( cvlac == null || cvlac.length == 0 || /^\s+$/.test(cvlac)){
                            $('#iconocvlac').remove();
                            $("#cvlac-group").attr("class","has-error input-group");
                            $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-close form-control-feedback'></span>");
                            $("#cvlac").attr("placeholder","Debe añadir un cvlac");
                            valido=false;
                        }else{
                            $('#iconocvlac').remove();
                            $("#cvlac-group").attr("class","has-success input-group");
                            $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( certisoft == null || certisoft.length == 0 || /^\s+$/.test(certisoft)){
                            $('#iconocertisoft').remove();
                            $("#certisoft-group").attr("class","has-error input-group");
                            $("#certisoft-group").append("<span id='iconocertisoft' class='fa fa-close form-control-feedback'></span>");
                            $("#certisoft").attr("placeholder","Debe añadir un certisoft");
                            valido=false;
                        }else{
                            $('#iconocertisoft').remove();
                            $("#certisoft-group").attr("class","has-success input-group");
                            $("#certisoft-group").append("<span id='iconocertisoft' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( ejecutable == null || ejecutable.length == 0 || /^\s+$/.test(ejecutable)){
                            $('#iconoejecutable').remove();
                            $("#ejecutable-group").attr("class","has-error input-group");
                            $("#ejecutable-group").append("<span id='iconoejecutable' class='fa fa-close form-control-feedback'></span>");
                            $("#ejecutable").attr("placeholder","Debe añadir un ejecutable");
                            valido=false;
                        }else{
                            $('#iconoejecutable').remove();
                            $("#ejecutable-group").attr("class","has-success input-group");
                            $("#ejecutable-group").append("<span id='iconoejecutable' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( manual == null || manual.length == 0 || /^\s+$/.test(manual)){
                            $('#iconomanual').remove();
                            $("#manual-group").attr("class","has-error input-group");
                            $("#manual-group").append("<span id='iconomanual' class='fa fa-close form-control-feedback'></span>");
                            $("#manual").attr("placeholder","Debe añadir un manual");
                            valido=false;
                        }else{
                            $('#iconomanual').remove();
                            $("#manual-group").attr("class","has-success input-group");
                            $("#manual-group").append("<span id='iconomanual' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( instrucciones == null || instrucciones.length == 0 || /^\s+$/.test(instrucciones)){
                            $('#iconoinstrucciones').remove();
                            $("#instrucciones-group").attr("class","has-error input-group");
                            $("#instrucciones-group").append("<span id='iconoinstrucciones' class='fa fa-close form-control-feedback'></span>");
                            $("#instrucciones").attr("placeholder","Debe añadir un instrucciones");
                            valido=false;
                        }else{
                            $('#iconoinstrucciones').remove();
                            $("#instrucciones-group").attr("class","has-success input-group");
                            $("#instrucciones-group").append("<span id='iconoinstrucciones' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( codigo == null || codigo.length == 0 || /^\s+$/.test(codigo)){
                            $('#iconocodigo').remove();
                            $("#codigo-group").attr("class","has-error input-group");
                            $("#codigo-group").append("<span id='iconocodigo' class='fa fa-close form-control-feedback'></span>");
                            $("#codigo").attr("placeholder","Debe añadir un codigo");
                            valido=false;
                        }else{
                            $('#iconocodigo').remove();
                            $("#codigo-group").attr("class","has-success input-group");
                            $("#codigo-group").append("<span id='iconocodigo' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( impacto == null || impacto.length == 0 || /^\s+$/.test(impacto)){
                            $('#iconoimpacto').remove();
                            $("#impacto-group").attr("class","has-error input-group");
                            $("#impacto-group").append("<span id='iconoimpacto' class='fa fa-close form-control-feedback'></span>");
                            $("#impacto").attr("placeholder","Debe añadir un impacto");
                            valido=false;
                        }else{
                            $('#iconoimpacto').remove();
                            $("#impacto-group").attr("class","has-success input-group");
                            $("#impacto-group").append("<span id='iconoimpacto' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( credito == null || credito.length == 0 || /^\s+$/.test(credito)){
                            $('#iconocredito').remove();
                            $("#credito-group").attr("class","has-error input-group");
                            $("#credito-group").append("<span id='iconocredito' class='fa fa-close form-control-feedback'></span>");
                            $("#credito").attr("placeholder","Debe añadir un credito");
                            valido=false;
                        }else{
                            $('#iconocredito').remove();
                            $("#credito-group").attr("class","has-success input-group");
                            $("#credito-group").append("<span id='iconocredito' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( titulares == null || titulares.length == 0 || /^\s+$/.test(titulares)){
                            $('#iconotitulares').remove();
                            $("#titulares-group").attr("class","has-error input-group");
                            $("#titulares-group").append("<span id='iconotitulares' class='fa fa-close form-control-feedback'></span>");
                            $("#titulares").attr("placeholder","Debe añadir titulares");
                            valido=false;
                        }else{
                            $('#iconotitulares').remove();
                            $("#titulares-group").attr("class","has-success input-group");
                            $("#titulares-group").append("<span id='iconotitulares' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( titulo == null || titulo.length == 0 || /^\s+$/.test(titulo)){
                            $('#iconotitulo').remove();
                            $("#titulo-group").attr("class","has-error input-group");
                            $("#titulo-group").append("<span id='iconotitulo' class='fa fa-close form-control-feedback'></span>");
                            $("#titulo").attr("placeholder","Debe añadir un titulo");
                            valido=false;
                        }else{
                            $('#iconotitulo').remove();
                            $("#titulo-group").attr("class","has-success input-group");
                            $("#titulo-group").append("<span id='iconotitulo' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

    
                        if( noautores == null || noautores.length == 0 || /^\s+$/.test(noautores)){
                            $('#icononoautores').remove();
                            $("#noautores-group").attr("class","has-error input-group");
                            $("#noautores-group").append("<span id='icononoautores' class='fa fa-close form-control-feedback'></span>");
                            $("#noautores").attr("placeholder","Ingrese el numero de autores");
                            valido=false;
                        }else{
                            $('#icononoautores').remove();
                            $("#noautores-group").attr("class","has-success input-group");
                            $("#noautores-group").append("<span id='icononoautores' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }
    
        
        
                    return valido;
              }	
                    
        </script>
<div class="section" >
    <div > 
            <center>
                    <div id="alerta" style="width:700px" class="text-center">
                        </div> 
            </center>   
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-success" >
                        <div class="panel-heading">
                            <div class="panel-title">Datos Software</div>
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
                                
                                <div id="noautores-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores" type="number" class="form-control"  name="noautores" min="1" value="{{old('noautores')}}">
                                
                                </div>

                                <div id="grupo">

                                </div>

                                <div id="titulares-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Titulares del software</span>
                                            <input id="titulares" type="text"  class="form-control" name="titulares" value="{{old('titulares')}}">                                          
                                </div>
                                
                                <div id="credito-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">¿Se evidencia credito a la UPC?</span>
                                            <select class="form-control"  id="credito" name="credito">
                                                 <option disabled value="null" selected>Seleccione una Opcion</option>
                                                            <option value="si">Si</option>
                                                            <option value="no">No</option>                                                                
                                                          </select>                                         
                                    </div>

                                <div id="impacto-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">¿Impacta el software en la comunidad universitaria?</span>
                                            <select class="form-control"  id="impacto" name="impacto">
                                                    <option disabled value="null" selected>Seleccion una Opcion</option>
                                                    <option value="si">Si</option>
                                                    <option value="no">No</option>                                                                
                                                  </select>    
                                  </div>  
                                  
                                  <div id="codigo-group" style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Codigo Fuente</span>
                                     <input id="codigo" type="file" class="form-control"  name="codigo" >    
                                  </div> 
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div id="instrucciones-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Manual de instrucciones</span>
                                             <input id="instrucciones" type="file" class="form-control"   name="instrucciones" >    
                                          </div> 

                                          <div id="manual-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Manuales Tecnicos de usuario</span>
                                                 <input id="manual" type="file" class="form-control"  name="manualusuario" >    
                                              </div> 
                                    <div id="ejecutable-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Programa ejecutable</span>
                                                 <input id="ejecutable" type="file" class="form-control"  name="ejecutable" >    
                                              </div> 
                                    <div id="certisoft-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Certificado de registro del software</span>
                                                 <input id="certisoft" type="file" class="form-control"  name="certisoft" >    
                                              </div> 
                                    <div id="cvlac-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion CVLac</span>
                                                 <input id="cvlac" type="file" class="form-control"  name="cvlac" >    
                                              </div>
                                    <div id="gruplac-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion del GrupLac</span>
                                                 <input id="gruplac" type="file" class="form-control"  name="gruplac" >    
                                              </div>
                                    <div id="certimpacto-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Certificacion del impacto interno en la Upc</span>
                                                 <input id="certimpacto" type="file" class="form-control"  name="certimpacto" >    
                                              </div>   

                                    <div style="margin-top:10px" class="form-group">
                                        <div >
                                                <center>
                                                        <div class="text center" style="justify-content:center">
                                                            <button id="boton" type="button" class="btn btn-success mr-4">Siguiente</button>
                                                            <button id="boton2" type="submit" class="btn btn-primary">Guardar</button>
                                                          </div>
                                                    </center>
                                        </div>
                                    </div>
                                     
                                </form>       
                            </div>
                             
                        </div>  
            </div>
        </div>
</div>
@endsection