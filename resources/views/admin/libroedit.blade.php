@extends('admin.dashboard')

@section('content')
<script>

    $(document).ready(inicio);
    
        function inicio()
        {
            $("#boton").click(function(){
                limpiar();
                if( validar() == false){
                    $('#alerta').addClass("alert alert-danger");
                    $('#alerta').text('Campos Incompletos');
                }
                else{
                    $("#boton").attr("type","submit");
                    $("#loginform").attr("action",'{{ url("enviarlibro/{$solicitud->idsolicitud}/{$libro->idlibro}") }}');
                }
            });
    
            $("#boton2").click(function() {
                limpiar();
                $("#loginform").attr("action",'{{ url("actualizarlibro/{$solicitud->idsolicitud}/{$libro->idlibro}") }}');
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
                    var vtitulo = true;
                    var vautores = true;
                    var vtipo = true;
                    var vfecha = true;
                    var visbn = true;
                    var vidioma = true;
                    var vcredito = true;
                    var veditorial = true;
                    var vejemplar = true;
                    var vcertificado = true;
                    var vcvlac = true;
                    var vgruplac = true;
                    var vcertieditorial = true;

                    var titulo = $("#titulo").val();
                    var noautores = $("#noautores_libro").val();
                    var tipo = $("#tipo").val();
                    var fecha = $('#fecha').val();
                    var isbn = $('#isbn').val();
                    var idioma = $('#idioma').val();
                    var credito = $('#credito').val();
                    var editorial = $('#editorial').val();
                    var ejemplaractual = $('#ejemplaractual').text();
                    var ejemplar = $('#ejemplar').val();
                    var certificadoactual = $('#certificadoactual').text();
                    var cvlacactual = $('#cvlacactual').text();
                    var gruplacactual = $('#gruplacactual').text();
                    var certieditorialactual = $('#certieditorialactual').text();
                    var certificado = $('#certificado').val();
                    var cvlac = $('#cvlac').val();
                    var gruplac = $('#gruplac').val();
                    var certieditorial = $('#certieditorial').val();

                    if( titulo == null || titulo.length == 0 || /^\s+$/.test(titulo)){
                        $('#iconotitulo').remove();
                        $("#titulo-group").attr("class","has-error input-group");
                        $("#titulo-group").append("<span id='iconotitulo' class='fa fa-close form-control-feedback'></span>");
                        $("#titulo").attr("placeholder","Debe Añadir un titulo");
                        vtitulo=false;
                    }else{
                        $('#iconotitulo').remove();
                        $("#titulo-group").attr("class","has-success input-group");
                        $("#titulo-group").append("<span id='iconotitulo' class='fa fa-check form-control-feedback'></span>");
                        vtitulo = true;
                    }

                    if( tipo == null || tipo.length == 0 || /^\s+$/.test(tipo)){
                        $('#iconotipo').remove();
                        $("#tipo-group").attr("class","has-error input-group");
                        $("#tipo-group").append("<span id='iconotipo' class='fa fa-close form-control-feedback'></span>");
                        vtipo=false;
                    }else{
                        $('#iconotipo').remove();
                        $("#tipo-group").attr("class","has-success input-group");
                        $("#tipo-group").append("<span id='iconotipo' class='fa fa-check form-control-feedback'></span>");
                        vtipo = true;
                    }

                    if( fecha == null || fecha.length == 0 || /^\s+$/.test(fecha)){
                        $('#iconofecha').remove();
                        $("#fecha-group").attr("class","has-error input-group");
                        $("#fecha-group").append("<span id='iconofecha' class='fa fa-close form-control-feedback'></span>");
                        $("#fecha").attr("placeholder","Debe Añadir un fecha");
                        vfecha=false;
                    }else{
                        $('#iconofecha').remove();
                        $("#fecha-group").attr("class","has-success input-group");
                        $("#fecha-group").append("<span id='iconofecha' class='fa fa-check form-control-feedback'></span>");
                        vfecha = true;
                    }

                    if( isbn == null || isbn.length == 0 || /^\s+$/.test(isbn)){
                        $('#iconoisbn').remove();
                        $("#isbn-group").attr("class","has-error input-group");
                        $("#isbn-group").append("<span id='iconoisbn' class='fa fa-close form-control-feedback'></span>");
                        $("#isbn").attr("placeholder","Ingrese el isbn");
                        visbn=false;
                    }else{
                        $('#iconoisbn').remove();
                        $("#isbn-group").attr("class","has-success input-group");
                        $("#isbn-group").append("<span id='iconoisbn' class='fa fa-check form-control-feedback'></span>");
                        visbn = true;
                    }

                    if( idioma == null || idioma.length == 0 || /^\s+$/.test(idioma)){
                        $('#iconoidioma').remove();
                        $("#idioma-group").attr("class","has-error input-group");
                        $("#idioma-group").append("<span id='iconoidioma' class='fa fa-close form-control-feedback'></span>");
                        $("#idioma").attr("placeholder","Ingrese el nombre de la idioma");
                        vidioma=false;
                    }else{
                        $('#iconoidioma').remove();
                        $("#idioma-group").attr("class","has-success input-group");
                        $("#idioma-group").append("<span id='iconoidioma' class='fa fa-check form-control-feedback'></span>");
                        vidioma = true;
                    }

                    if( noautores == null || noautores.length == 0 || /^\s+$/.test(noautores)){
                        $('#icononoautores').remove();
                        $("#noautores-group").attr("class","has-error input-group");
                        $("#noautores-group").append("<span id='icononoautores' class='fa fa-close form-control-feedback'></span>");
                        $("#noautores_libro").attr("placeholder","Ingrese el numero de autores");
                        vautores=false;
                    }else{
                        $('#icononoautores').remove();
                        $("#noautores-group").attr("class","has-success input-group");
                        $("#noautores-group").append("<span id='icononoautores' class='fa fa-check form-control-feedback'></span>");
                        vautores = true;
                    }

                    if( credito == null || credito.length == 0 || /^\s+$/.test(credito)){
                        $('#iconocredito').remove();
                        $("#credito-group").attr("class","has-error input-group");
                        $("#credito-group").append("<span id='iconocredito' class='fa fa-close form-control-feedback'></span>");
                        $("#credito_articulo").attr("placeholder","Ingrese el numero de autores");
                        vcredito=false;
                    }else{
                        $('#iconocredito').remove();
                        $("#credito-group").attr("class","has-success input-group");
                        $("#credito-group").append("<span id='iconocredito' class='fa fa-check form-control-feedback'></span>");
                        vcredito = true;
                    }

                    if( editorial == null || editorial.length == 0 || /^\s+$/.test(editorial)){
                        $('#iconoeditorial').remove();
                        $("#editorial-group").attr("class","has-error input-group");
                        $("#editorial-group").append("<span id='iconoeditorial' class='fa fa-close form-control-feedback'></span>");
                        $("#editorial").attr("placeholder","Ingrese la editorial del libro");
                        veditorial=false;
                    }else{
                        $('#iconoeditorial').remove();
                        $("#editorial-group").attr("class","has-success input-group");
                        $("#editorial-group").append("<span id='iconoeditorial' class='fa fa-check form-control-feedback'></span>");
                        veditorial = true;
                    }

                    if( certificado == null || certificado.length == 0 || /^\s+$/.test(certificado)){
                        $('#iconocertificado').remove();
                        $("#certificado-group").attr("class","has-error input-group");
                        $("#certificado-group").append("<span id='iconocertificado' class='fa fa-close form-control-feedback'></span>");
                        $("#certificado").attr("placeholder","Ingrese la bonificacion solicitada");
                        vcertificado=false;
                        if( certificadoactual == null || certificadoactual.length == 0 || /^\s+$/.test(certificadoactual)){
                        $('#iconocertificado').remove();
                        $("#certificado-group").attr("class","has-error input-group");
                        $("#certificado-group").append("<span id='iconocertificado' class='fa fa-close form-control-feedback'></span>");
                        $("#certificado").attr("placeholder","Ingrese la bonificacion solicitada");
                        vcertificado=false;
                    }else{
                        $('#iconocertificado').remove();
                        $("#certificado-group").attr("class","has-success input-group");
                        $("#certificado-group").append("<span id='iconocertificado' class='fa fa-check form-control-feedback'></span>");
                        vcertificado = true;
                    }
                    }else{
                        $('#iconocertificado').remove();
                        $("#certificado-group").attr("class","has-success input-group");
                        $("#certificado-group").append("<span id='iconocertificado' class='fa fa-check form-control-feedback'></span>");
                        vcertificado = true;
                    }

                    if( ejemplar == null || ejemplar.length == 0 || /^\s+$/.test(ejemplar)){
                        $('#iconoejemplar').remove();
                        $("#ejemplar-group").attr("class","has-error input-group");
                        $("#ejemplar-group").append("<span id='iconoejemplar' class='fa fa-close form-control-feedback'></span>");
                        $("#ejemplar").attr("placeholder","Ingrese la bonificacion solicitada");
                        vejemplar=false;
                        if( ejemplaractual == null || ejemplaractual.length == 0 || /^\s+$/.test(ejemplaractual)){
                        $('#iconoejemplar').remove();
                        $("#ejemplar-group").attr("class","has-error input-group");
                        $("#ejemplar-group").append("<span id='iconoejemplar' class='fa fa-close form-control-feedback'></span>");
                        $("#ejemplar").attr("placeholder","Ingrese la bonificacion solicitada");
                        vejemplar=false;
                        }else{
                        $('#iconoejemplar').remove();
                        $("#ejemplar-group").attr("class","has-success input-group");
                        $("#ejemplar-group").append("<span id='iconoejemplar' class='fa fa-check form-control-feedback'></span>");
                        vejemplar = true;
                    }
                    }else{
                        $('#iconoejemplar').remove();
                        $("#ejemplar-group").attr("class","has-success input-group");
                        $("#ejemplar-group").append("<span id='iconoejemplar' class='fa fa-check form-control-feedback'></span>");
                        vejemplar = true;
                    }

                    if( cvlac == null || cvlac.length == 0 || /^\s+$/.test(cvlac)){
                        $('#iconocvlac').remove();
                        $("#cvlac-group").attr("class","has-error input-group");
                        $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-close form-control-feedback'></span>");
                        $("#cvlac").attr("placeholder","Ingrese la bonificacion solicitada");
                        vcvlac=false;
                        if( cvlacactual == null || cvlacactual.length == 0 || /^\s+$/.test(cvlacactual)){
                        $('#iconocvlac').remove();
                        $("#cvlac-group").attr("class","has-error input-group");
                        $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-close form-control-feedback'></span>");
                        $("#cvlac").attr("placeholder","Ingrese la bonificacion solicitada");
                        vcvlac=false;
                        }else{
                        $('#iconocvlac').remove();
                        $("#cvlac-group").attr("class","has-success input-group");
                        $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-check form-control-feedback'></span>");
                        vcvlac = true;
                    }
                    }else{
                        $('#iconocvlac').remove();
                        $("#cvlac-group").attr("class","has-success input-group");
                        $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-check form-control-feedback'></span>");
                        vcvlac = true;
                    }
                    
                    if( gruplac == null || gruplac.length == 0 || /^\s+$/.test(gruplac)){
                        $('#iconogruplac').remove();
                        $("#gruplac-group").attr("class","has-error input-group");
                        $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-close form-control-feedback'></span>");
                        $("#gruplac").attr("placeholder","Ingrese la bonificacion solicitada");
                        vgruplac=false;
                        if( gruplacactual == null || gruplacactual.length == 0 || /^\s+$/.test(gruplacactual)){
                        $('#iconogruplac').remove();
                        $("#gruplac-group").attr("class","has-error input-group");
                        $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-close form-control-feedback'></span>");
                        $("#gruplac").attr("placeholder","Ingrese la bonificacion solicitada");
                        vgruplac=false;
                        }else{
                        $('#iconogruplac').remove();
                        $("#gruplac-group").attr("class","has-success input-group");
                        $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-check form-control-feedback'></span>");
                        vgruplac = true;
                    }
                    }else{
                        $('#iconogruplac').remove();
                        $("#gruplac-group").attr("class","has-success input-group");
                        $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-check form-control-feedback'></span>");
                        vgruplac = true;
                    }
                    
                    if( certieditorial == null || certieditorial.length == 0 || /^\s+$/.test(certieditorial)){
                        $('#iconocertieditorial').remove();
                        $("#certieditorial-group").attr("class","has-error input-group");
                        $("#certieditorial-group").append("<span id='iconocertieditorial' class='fa fa-close form-control-feedback'></span>");
                        $("#certieditorial").attr("placeholder","Ingrese la bonificacion solicitada");
                        vcertieditorial=false;
                        if( certieditorialactual == null || certieditorialactual.length == 0 || /^\s+$/.test(certieditorialactual)){
                        $('#iconocertieditorial').remove();
                        $("#certieditorial-group").attr("class","has-error input-group");
                        $("#certieditorial-group").append("<span id='iconocertieditorial' class='fa fa-close form-control-feedback'></span>");
                        $("#certieditorial").attr("placeholder","Ingrese la bonificacion solicitada");
                        vcertieditorial=false;
                    }else{
                        $('#iconocertieditorial').remove();
                        $("#certieditorial-group").attr("class","has-success input-group");
                        $("#certieditorial-group").append("<span id='iconocertieditorial' class='fa fa-check form-control-feedback'></span>");
                        vcertieditorial = true;
                        
                    }
                    }else{
                        $('#iconocertieditorial').remove();
                        $("#certieditorial-group").attr("class","has-success input-group");
                        $("#certieditorial-group").append("<span id='iconocertieditorial' class='fa fa-check form-control-feedback'></span>");
                        vcertieditorial = true;
                    }
                    
                    if(vtitulo == true
                    && vautores == true
                    && vtipo == true
                    && vfecha == true
                    && visbn == true
                    && vidioma == true
                    && vcredito == true
                    && veditorial == true
                    && vejemplar == true
                    && vcertificado == true
                    && vcvlac == true
                    && vgruplac == true
                    && vcertieditorial == true)
                    {
                        return true;
                    }
                    else{
                        return false;
                    }
    
                
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
                                {{ method_field('PUT') }}  
                                    {!! csrf_field() !!}
                                <div id="titulo-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Titulo</span>
                                <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo',$productividad->titulo)}}">                                   
                                        </div>
                                
                                <div id="tipo-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Tipo de Libro</span>
                                            <select id="tipo" class="form-control"  id="tipolibro" name="tipolibro">
                                            <option value="{{$libro->tipo_libro}}" selected>{{$libro->tipo_libro}}</option>
                                            @if ($libro->tipo_libro != 'Libro de texto' )
                                            <option value="Libro de texto">Libro de texto</option>   
                                            @endif
                                            @if ($libro->tipo_libro != 'Libro resultado de un labor de investigacion' )
                                            <option value="Libro resultado de un labor de investigacion">Libro resultado de un labor de investigacion</option>   
                                            @endif
                                            @if ($libro->tipo_libro != 'Libro de ensayo' )
                                            <option value="Libro de ensayo">Libro de ensayo</option>    
                                            @endif 
                                            @if ($libro->tipo_libro != 'Traduccion de Libro' )
                                            <option value="Traduccion de Libro">Traduccion de Libro</option>    
                                            @endif   
                                                                                                        
                                                          </select>                                         
                                    </div>
                                
                                <div id="noautores-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores_libro" type="number" class="form-control"  name="noautores" min="1" value="{{old('noautores',$libro->noautores)}}">
                                
                                        </div>


                                <div id="fecha-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Fecha de publicacion</span>
                                <input id="fecha" type="date" class="form-control"  name="fecha" value="{{old('fecha',$libro->fecha_publicacion)}}">
                                
                                        </div>

                                <div id="editorial-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Editorial</span>
                                            <input id="editorial" type="text"  class="form-control" name="editorial" value="{{old('editorial',$libro->editorial)}}">                                          
                                </div>

                                <div id="isbn-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">ISBN</span>
                                            <input id="isbn" type="text"  class="form-control" name="isbn" value="{{old('isbn',$libro->isbn)}}">                                          
                                </div>

                                <div id="idioma-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('idioma') ? 'has-error' : ''}}">
                                        <span class="input-group-addon">Idioma</span>
                                        <select id="idioma" class="form-control"  name="idioma">
                                             <option value="{{$libro->idioma}}"  selected>{{$libro->idioma}}</option>
                                             @if ($libro->idioma != 'Español')
                                             <option value="Español">Español</option>  
                                             @endif
                                             @if ($libro->idioma != 'Ingles')
                                             <option value="Inglés">Inglés</option>   
                                             @endif
                                             @if ($libro->idioma != 'Frances')
                                             <option value="Francés">Francés</option>   
                                             @endif
                                             @if ($libro->idioma != 'Aleman')
                                             <option value="Alemán">Alemán</option>    
                                             @endif
                                             @if ($libro->idioma != 'Italiano')
                                             <option value="Italiano">Italiano</option>   
                                             @endif
                                             @if ($libro->idioma != 'Portugues')
                                             <option value="Portugués">Portugués</option>    
                                             @endif
                                             @if ($libro->idioma != 'Ruso')
                                             <option value="Ruso">Ruso</option>   
                                             @endif
                                                      </select>                                         
                                </div>  
                                
                                <div id="credito-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">¿Se evidencia credito a la UPC?</span>
                                            <select class="form-control"  id="credito" name="credito">
                                            <option value="{{$libro->creditoUpc_libro}}"  selected>{{$libro->creditoUpc_libro}}</option>
                                            @if ($libro->creditoUpc_libro != 'si')
                                            <option value="si">Si</option>
                                            @endif
                                            @if ($libro->creditoUpc_libro != 'no')
                                            <option value="no">No</option>       
                                            @endif                                                            
                                                          </select>                                         
                                    </div>

                                
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div id="ejemplar-group" style="margin-bottom: 25px" class="input-group">
                                            <span id="ejemplaractual" class="input-group-addon">{{$soportes->ejemplar}}</span>
                                             <input id="ejemplar" type="file" class="form-control"   name="ejemplar" >    
                                          </div> 
                                    <div id="certificado-group" style="margin-bottom: 25px" class="input-group">
                                    <span id="certificadoactual" class="input-group-addon">{{$soportes->Certificadolibrodeinvestigacion}}</span>
                                                 <input id="certificado" type="file" class="form-control"  name="certilibroinves" >    
                                              </div> 
                                    <div id="cvlac-group" style="margin-bottom: 25px" class="input-group">
                                                <span id="cvlacactual" class="input-group-addon">{{$soportes->Cvlac_libro}}</span>
                                                 <input id="cvlac" type="file" class="form-control"  name="cvlac" >    
                                              </div>
                                    <div id="gruplac-group" style="margin-bottom: 25px" class="input-group">
                                                <span id="gruplacactual" class="input-group-addon">{{$soportes->Gruplac_libro}}</span>
                                                 <input id="gruplac" type="file" class="form-control"  name="gruplac" >    
                                              </div>
                                    <div id="certieditorial-group" style="margin-bottom: 25px" class="input-group">
                                    <span id="certieditorialactual" class="input-group-addon">{{$soportes->Certificadoeditorial}}</span>
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