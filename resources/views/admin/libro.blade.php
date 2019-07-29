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
                    $("#loginform").attr("action","{{ url('/libro') }}");
                }
            });
    
            $("#boton2").click(function() {
                limpiar();
                $("#loginform").attr("action","{{ url('/guardarlibro') }}");
            })
        }
        function limpiar() { 
            $('#iconotitulo').remove();
            $('#iconotipo').remove();
            $('#iconofecha').remove();
            $('#iconoisbn').remove();
            $('#iconoidioma').remove();
            $('#icononoautores').remove();
            $('#iconocredito').remove();
            $('#iconoeditorial').remove();
            $('#iconoejemplar').remove();
            $('#iconocertificado').remove();
            $('#iconocvlac').remove();
            $('#iconogruplac').remove();
            $('#iconocertieditorial').remove();

         }    
        function validar(){
                    var valido = true;
                    var titulo = $("#titulo").val();
                    var noautores = $("#noautores_libro").val();
                    var tipo = $("#tipo").val();
                    var fecha = $('#fecha').val();
                    var isbn = $('#isbn').val();
                    var idioma = $('#idioma').val();
                    var credito = $('#credito').val();
                    var editorial = $('#editorial').val();
                    var ejemplar = $('#ejemplar').val();
                    var certificado = $('#certificado').val();
                    var cvlac = $('#cvlac').val();
                    var gruplac = $('#gruplac').val();
                    var certieditorial = $('#certieditorial').val();

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

                    if( fecha == null || fecha.length == 0 || /^\s+$/.test(fecha)){
                        $('#iconofecha').remove();
                        $("#fecha-group").attr("class","has-error input-group");
                        $("#fecha-group").append("<span id='iconofecha' class='fa fa-close form-control-feedback'></span>");
                        $("#fecha").attr("placeholder","Debe Añadir un fecha");
                        valido=false;
                    }else{
                        $('#iconofecha').remove();
                        $("#fecha-group").attr("class","has-success input-group");
                        $("#fecha-group").append("<span id='iconofecha' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( isbn == null || isbn.length == 0 || /^\s+$/.test(isbn)){
                        $('#iconoisbn').remove();
                        $("#isbn-group").attr("class","has-error input-group");
                        $("#isbn-group").append("<span id='iconoisbn' class='fa fa-close form-control-feedback'></span>");
                        $("#isbn").attr("placeholder","Ingrese el isbn");
                        valido=false;
                    }else{
                        $('#iconoisbn').remove();
                        $("#isbn-group").attr("class","has-success input-group");
                        $("#isbn-group").append("<span id='iconoisbn' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( idioma == null || idioma.length == 0 || /^\s+$/.test(idioma)){
                        $('#iconoidioma').remove();
                        $("#idioma-group").attr("class","has-error input-group");
                        $("#idioma-group").append("<span id='iconoidioma' class='fa fa-close form-control-feedback'></span>");
                        $("#idioma").attr("placeholder","Ingrese el nombre de la idioma");
                        valido=false;
                    }else{
                        $('#iconoidioma').remove();
                        $("#idioma-group").attr("class","has-success input-group");
                        $("#idioma-group").append("<span id='iconoidioma' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( noautores == null || noautores.length == 0 || /^\s+$/.test(noautores)){
                        $('#icononoautores').remove();
                        $("#noautores-group").attr("class","has-error input-group");
                        $("#noautores-group").append("<span id='icononoautores' class='fa fa-close form-control-feedback'></span>");
                        $("#noautores_libro").attr("placeholder","Ingrese el numero de autores");
                        valido=false;
                    }else{
                        $('#icononoautores').remove();
                        $("#noautores-group").attr("class","has-success input-group");
                        $("#noautores-group").append("<span id='icononoautores' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( credito == null || credito.length == 0 || /^\s+$/.test(credito)){
                        $('#iconocredito').remove();
                        $("#credito-group").attr("class","has-error input-group");
                        $("#credito-group").append("<span id='iconocredito' class='fa fa-close form-control-feedback'></span>");
                        $("#credito_articulo").attr("placeholder","Ingrese el numero de autores");
                        valido=false;
                    }else{
                        $('#iconocredito').remove();
                        $("#credito-group").attr("class","has-success input-group");
                        $("#credito-group").append("<span id='iconocredito' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( editorial == null || editorial.length == 0 || /^\s+$/.test(editorial)){
                        $('#iconoeditorial').remove();
                        $("#editorial-group").attr("class","has-error input-group");
                        $("#editorial-group").append("<span id='iconoeditorial' class='fa fa-close form-control-feedback'></span>");
                        $("#editorial").attr("placeholder","Ingrese la editorial del libro");
                        valido=false;
                    }else{
                        $('#iconoeditorial').remove();
                        $("#editorial-group").attr("class","has-success input-group");
                        $("#editorial-group").append("<span id='iconoeditorial' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( certificado == null || certificado.length == 0 || /^\s+$/.test(certificado)){
                        $('#iconocertificado').remove();
                        $("#certificado-group").attr("class","has-error input-group");
                        $("#certificado-group").append("<span id='iconocertificado' class='fa fa-close form-control-feedback'></span>");
                        $("#certificado").attr("placeholder","Ingrese la bonificacion solicitada");
                        valido=false;
                    }else{
                        $('#iconocertificado').remove();
                        $("#certificado-group").attr("class","has-success input-group");
                        $("#certificado-group").append("<span id='iconocertificado' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( ejemplar == null || ejemplar.length == 0 || /^\s+$/.test(ejemplar)){
                        $('#iconoejemplar').remove();
                        $("#ejemplar-group").attr("class","has-error input-group");
                        $("#ejemplar-group").append("<span id='iconoejemplar' class='fa fa-close form-control-feedback'></span>");
                        $("#ejemplar").attr("placeholder","Ingrese la bonificacion solicitada");
                        valido=false;
                    }else{
                        $('#iconoejemplar').remove();
                        $("#ejemplar-group").attr("class","has-success input-group");
                        $("#ejemplar-group").append("<span id='iconoejemplar' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( cvlac == null || cvlac.length == 0 || /^\s+$/.test(cvlac)){
                        $('#iconocvlac').remove();
                        $("#cvlac-group").attr("class","has-error input-group");
                        $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-close form-control-feedback'></span>");
                        $("#cvlac").attr("placeholder","Ingrese la bonificacion solicitada");
                        valido=false;
                    }else{
                        $('#iconocvlac').remove();
                        $("#cvlac-group").attr("class","has-success input-group");
                        $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( gruplac == null || gruplac.length == 0 || /^\s+$/.test(gruplac)){
                        $('#iconogruplac').remove();
                        $("#gruplac-group").attr("class","has-error input-group");
                        $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-close form-control-feedback'></span>");
                        $("#gruplac").attr("placeholder","Ingrese la bonificacion solicitada");
                        valido=false;
                    }else{
                        $('#iconogruplac').remove();
                        $("#gruplac-group").attr("class","has-success input-group");
                        $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-check form-control-feedback'></span>");
                        valido = true;
                    }

                    if( certieditorial == null || certieditorial.length == 0 || /^\s+$/.test(certieditorial)){
                        $('#iconocertieditorial').remove();
                        $("#certieditorial-group").attr("class","has-error input-group");
                        $("#certieditorial-group").append("<span id='iconocertieditorial' class='fa fa-close form-control-feedback'></span>");
                        $("#certieditorial").attr("placeholder","Ingrese la bonificacion solicitada");
                        valido=false;
                    }else{
                        $('#iconocertieditorial').remove();
                        $("#certieditorial-group").attr("class","has-success input-group");
                        $("#certieditorial-group").append("<span id='iconocertieditorial' class='fa fa-check form-control-feedback'></span>");
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
                            <div class="panel-title">Datos del Libro</div>
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
                            <form id="loginform" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                <div id="titulo-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Titulo</span>
                                <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo')}}">                                   
                                        </div>
                                
                                <div id="tipo-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Tipo de Libro</span>
                                            <select id="tipo" class="form-control" required id="tipolibro" name="tipolibro">
                                                 <option value="" disabled selected>Seleccione un tipo de libro</option>
                                                            <option value="Libro de texto">Libro de texto</option>
                                                            <option value="Libro resultado de un labor de investigacion">Libro resultado de un labor de investigacion</option>
                                                            <option value="Libro de ensayo">Libro de ensayo</option>                                                                  
                                                          </select>                                         
                                    </div>
                                
                                <div id="noautores-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores_libro" type="number" class="form-control" required name="noautores" min="1" value="{{old('noautores')}}">
                                
                                        </div>


                                <div id="fecha-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Fecha de publicacion</span>
                                <input id="fecha" type="date" class="form-control" required name="fecha" value="{{old('fecha')}}">
                                
                                        </div>

                                <div id="editorial-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Editorial</span>
                                            <input id="editorial" type="text"  class="form-control" name="editorial" value="{{old('editorial')}}">                                          
                                </div>

                                <div id="isbn-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">ISBN</span>
                                            <input id="isbn" type="text"  class="form-control" name="isbn" value="{{old('isbn')}}">                                          
                                </div>

                                <div id="idioma-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('idioma') ? 'has-error' : ''}}">
                                        <span class="input-group-addon">Idioma</span>
                                        <select id="idioma" class="form-control" required name="idioma" value="{{old('idioma')}}">
                                             <option value="" disabled selected>Seleccione un idioma</option>
                                                        <option value="Español">Español</option>
                                                        <option value="Inglés">Inglés</option>
                                                        <option value="Francés">Francés</option>
                                                        <option value="Alemán">Alemán</option>
                                                        <option value="Italiano">Italiano</option>
                                                        <option value="Portugués">Portugués</option>
                                                        <option value="Ruso">Ruso</option>
                                                      </select>                                         
                                </div>  
                                
                                <div id="credito-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">¿Se evidencia credito a la UPC?</span>
                                            <select class="form-control" required id="credito" name="credito">
                                                 <option value="" disabled selected> Seleccion una opcion </option>
                                                            <option value="si">Si</option>
                                                            <option value="no">No</option>                                                                
                                                          </select>                                         
                                    </div>

                                
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div id="ejemplar-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Ejemplar</span>
                                             <input id="ejemplar" type="file" class="form-control"   name="ejemplar" >    
                                          </div> 
                                    <div id="certificado-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Certificado de libro producto de investigacion</span>
                                                 <input id="certificado" type="file" class="form-control"  name="certilibroinves" >    
                                              </div> 
                                    <div id="cvlac-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion CVLac</span>
                                                 <input id="cvlac" type="file" class="form-control"  name="cvlac" >    
                                              </div>
                                    <div id="gruplac-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion del GrupLac</span>
                                                 <input id="gruplac" type="file" class="form-control"  name="gruplac" >    
                                              </div>
                                    <div id="certieditorial-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Certificacion de identificacion reconocidad por la editorial</span>
                                                 <input id="certieditorial" type="file" class="form-control"  name="certieditorial" >    
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