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
                    $("#loginform").attr("action",'{{ url("enviararticulo/{$solicitud->idsolicitud}/{$articulo->id_articulo}") }}');
                }
            });
    
            $("#boton2").click(function() {
                limpiar();
                $("#loginform").attr("action",'{{ url("actualizararticulo/{$solicitud->idsolicitud}/{$articulo->id_articulo}") }}');
            })
        }
        function limpiar() { 
            $('#iconotitulo').remove();
            $('#iconotipo').remove();
            $('#iconotiporevista').remove();
            $('#iconofecha').remove();
            $('#iconorevista').remove();
            $('#iconoissn').remove();
            $('#iconoidioma').remove();
            $('#icononoautores').remove();
            $('#iconofiliacion').remove();
            $('#iconopuntossolicitados').remove();
            $('#iconobonificacionsolicitada').remove();
            $('#iconoejemplar').remove();
            $('#iconocvlac').remove();
            $('#iconogruplac').remove();
            $('#iconocertieditorial').remove();

         }    
        function validar(){
                    var vtitulo = true;
                    var vautores = true;
                    var vtipo = true;
                    var vtiporevista = true;
                    var vfecha = true;
                    var vrevista = true;
                    var vissn = true;
                    var vidioma = true;
                    var vfiliacion = true;
                    var vps = true;
                    var vbs = true;
                    var vejemplar = true;
                    var vcvlac = true;
                    var vgruplac = true;
                    var vcertieditorial = true;

                    var titulo = $("#titulo").val();
                    var noautores = $("#noautores_articulo").val();
                    var tipo = $("#tipo").val();
                    var tiporevista = $("#tiporevista").val();
                    var fecha = $('#fecha').val();
                    var revista = $('#revista').val();
                    var issn = $('#issn').val();
                    var idioma = $('#idioma').val();
                    var filiacion = $('#filiacion').val();
                    var puntossolicitados = $('#puntossolicitados').val();
                    var bonificacionsolicitada = $('#bonificacionsolicitada').val();
                    var ejemplaractual = $('#ejemplaractual').text();
                    var cvlacactual = $('#cvlacactual').text();
                    var gruplacactual = $('#gruplacactual').text();
                    var certieditorialactual = $('#certieditorialactual').text();
                    var ejemplar = $('#ejemplar').val();
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
                        vtitulo=true;
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
                        vtipo=true;
                    }

                    if( tiporevista == null || tiporevista.length == 0 || /^\s+$/.test(tiporevista)){
                        $('#iconotiporevista').remove();
                        $("#tiporevista-group").attr("class","has-error input-group");
                        $("#tiporevista-group").append("<span id='iconotiporevista' class='fa fa-close form-control-feedback'></span>");
                        vtiporevista=false;
                    }else{
                        $('#iconotiporevista').remove();
                        $("#tiporevista-group").attr("class","has-success input-group");
                        $("#tiporevista-group").append("<span id='iconotiporevista' class='fa fa-check form-control-feedback'></span>");
                        vtiporevista=true;
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
                        vfecha=true;
                    }

                    if( revista == null || revista.length == 0 || /^\s+$/.test(revista)){
                        $('#iconorevista').remove();
                        $("#revista-group").attr("class","has-error input-group");
                        $("#revista-group").append("<span id='iconorevista' class='fa fa-close form-control-feedback'></span>");
                        $("#revista").attr("placeholder","Ingrese el nombre de la revista");
                        vrevista=false;
                    }else{
                        $('#iconorevista').remove();
                        $("#revista-group").attr("class","has-success input-group");
                        $("#revista-group").append("<span id='iconorevista' class='fa fa-check form-control-feedback'></span>");
                        vrevista=true;
                    }

                    if( issn == null || issn.length == 0 || /^\s+$/.test(issn)){
                        $('#iconoissn').remove();
                        $("#issn-group").attr("class","has-error input-group");
                        $("#issn-group").append("<span id='iconoissn' class='fa fa-close form-control-feedback'></span>");
                        $("#issn").attr("placeholder","Ingrese el ISSN");
                        vissn=false;
                    }else{
                        $('#iconoissn').remove();
                        $("#issn-group").attr("class","has-success input-group");
                        $("#issn-group").append("<span id='iconoissn' class='fa fa-check form-control-feedback'></span>");
                        vissn=true;
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
                        vidioma=true;
                    }

                    if( noautores == null || noautores.length == 0 || /^\s+$/.test(noautores)){
                        $('#icononoautores').remove();
                        $("#noautores-group").attr("class","has-error input-group");
                        $("#noautores-group").append("<span id='icononoautores' class='fa fa-close form-control-feedback'></span>");
                        $("#noautores_articulo").attr("placeholder","Ingrese el numero de autores");
                        vautores=false;
                    }else{
                        $('#icononoautores').remove();
                        $("#noautores-group").attr("class","has-success input-group");
                        $("#noautores-group").append("<span id='icononoautores' class='fa fa-check form-control-feedback'></span>");
                        vautores=true;
                    }

                    if( filiacion == null || filiacion.length == 0 || /^\s+$/.test(filiacion)){
                        $('#iconofiliacion').remove();
                        $("#filiacion-group").attr("class","has-error input-group");
                        $("#filiacion-group").append("<span id='iconofiliacion' class='fa fa-close form-control-feedback'></span>");
                        $("#filiacion_articulo").attr("placeholder","Ingrese el numero de autores");
                        vfiliacion=false;
                    }else{
                        $('#iconofiliacion').remove();
                        $("#filiacion-group").attr("class","has-success input-group");
                        $("#filiacion-group").append("<span id='iconofiliacion' class='fa fa-check form-control-feedback'></span>");
                        vfiliacion=true;
                    }

                    if( puntossolicitados == null || puntossolicitados.length == 0 || /^\s+$/.test(puntossolicitados)){
                        $('#iconopuntossolicitados').remove();
                        $("#puntossolicitados-group").attr("class","has-error input-group");
                        $("#puntossolicitados-group").append("<span id='iconopuntossolicitados' class='fa fa-close form-control-feedback'></span>");
                        $("#puntossolicitados").attr("placeholder","Ingrese los puntos solicitados");
                        vps=false;
                    }else{
                        $('#iconopuntossolicitados').remove();
                        $("#puntossolicitados-group").attr("class","has-success input-group");
                        $("#puntossolicitados-group").append("<span id='iconopuntossolicitados' class='fa fa-check form-control-feedback'></span>");
                        vps=true;
                    }

                    if( bonificacionsolicitada == null || bonificacionsolicitada.length == 0 || /^\s+$/.test(bonificacionsolicitada)){
                        $('#iconobonificacionsolicitada').remove();
                        $("#bonificacionsolicitada-group").attr("class","has-error input-group");
                        $("#bonificacionsolicitada-group").append("<span id='iconobonificacionsolicitada' class='fa fa-close form-control-feedback'></span>");
                        $("#bonificacionsolicitada").attr("placeholder","Ingrese la bonificacion solicitada");
                        vbs=false;
                    }else{
                        $('#iconobonificacionsolicitada').remove();
                        $("#bonificacionsolicitada-group").attr("class","has-success input-group");
                        $("#bonificacionsolicitada-group").append("<span id='iconobonificacionsolicitada' class='fa fa-check form-control-feedback'></span>");
                        vbs=true;
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
                        vejemplar=true;
                    }
                    }else{
                        $('#iconoejemplar').remove();
                        $("#ejemplar-group").attr("class","has-success input-group");
                        $("#ejemplar-group").append("<span id='iconoejemplar' class='fa fa-check form-control-feedback'></span>");
                        vejemplar=true;
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
                        vcvlac=true;
                    }   
                    }else{
                        $('#iconocvlac').remove();
                        $("#cvlac-group").attr("class","has-success input-group");
                        $("#cvlac-group").append("<span id='iconocvlac' class='fa fa-check form-control-feedback'></span>");
                        vcvlac=true;
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
                        vgruplac=true;
                    }  

                    }else{
                        $('#iconogruplac').remove();
                        $("#gruplac-group").attr("class","has-success input-group");
                        $("#gruplac-group").append("<span id='iconogruplac' class='fa fa-check form-control-feedback'></span>");
                        vgruplac=true;
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
                        vcertieditorial=true;
                    }
                    }else{
                        $('#iconocertieditorial').remove();
                        $("#certieditorial-group").attr("class","has-success input-group");
                        $("#certieditorial-group").append("<span id='iconocertieditorial' class='fa fa-check form-control-feedback'></span>");
                        vcertieditorial=true;
                    }

                if( vtitulo == true &&
                     vautores == true &&
                     vtipo == true &&
                     vtiporevista == true &&
                     vfecha == true &&
                     vrevista == true &&
                     vissn == true &&
                     vidioma == true &&
                     vfiliacion == true &&
                     vps == true &&
                     vbs == true &&
                     vejemplar == true &&
                     vcvlac == true &&
                     vgruplac == true &&
                     vcertieditorial == true){
                         return true;
                }    
                else{
                    return false;
                }

          }	
                
    </script>
<div class="section" >
    <div>    
            <center>
                    <div id="alerta" style="width:700px" class="text-center">
                        </div> 
            </center>
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-8 col-md-offset-2">                    
                <div class="panel panel-success" >
                        <div class="panel-heading">
                            <div class="panel-title">Datos del Articulo</div>
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
                                {{ method_field('PUT') }}  
                                {!! csrf_field() !!}
                                <div id="titulo-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Titulo</span>
                                <input id="titulo" type="text" class="form-control" required  name="titulo" value="{{old('titulo',$productividad->titulo)}}">                                   
                                        </div>
                                
                                <div id="tipo-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Tipo de publicacion</span>
                                            <select id="tipo" class="form-control"  name="tipoarticulo"  >
                                            <option value="{{$articulo->tipo_publicacion}}" selected>{{$articulo->tipo_publicacion}}</option>
                                            @if ($articulo->tipo_publicacion != 'Articulo Tradicional')
                                            <option value="Articulo Tradicional">Articulo Tradicional</option>
                                            @endif
                                            @if ($articulo->tipo_publicacion != 'Articulo Corto')
                                            <option value="Articulo Corto">Articulo Corto</option>
                                            @endif
                                            @if ($articulo->tipo_publicacion != 'Reporte de Caso')
                                            <option value="Reporte de Caso">Reporte de Caso</option>
                                            @endif
                                            @if ($articulo->tipo_publicacion != 'Revision de Tema')
                                            <option value="Revision de Tema">Revision de Tema</option>
                                            @endif                
                                            @if ($articulo->tipo_publicacion != 'Carta al editor')
                                            <option value="Carta al editor">Cartas al editor</option>
                                            @endif
                                            @if ($articulo->tipo_publicacion != 'Editorial')
                                            <option value="Editorial">Editoriales</option>
                                            @endif
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                          </select>                                         
                                </div>        


                                <div id="tiporevista-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Tipo de revista</span>
                                            <select id="tiporevista"  class="form-control"  name="tiporevista">
                                                 <option value="{{$articulo->tiporevista}}" selected>{{$articulo->tiporevista}}</option>
                                                 @if ($articulo->tiporevista != 'A1')
                                                 <option value="A1">A1</option>  
                                                 @endif
                                                 @if ($articulo->tiporevista != 'A2')
                                                 <option value="A2">A2</option>  
                                                 @endif
                                                 @if ($articulo->tiporevista != 'B')
                                                 <option value="B">B</option>  
                                                 @endif
                                                 @if ($articulo->tiporevista != 'C')
                                                 <option value="C">C</option> 
                                                 @endif
                                                 @if ($articulo->tiporevista != 'No indexada')
                                                 <option value="No indexada">No indexada</option>
                                                 @endif 
                                                          </select>                                         
                                </div>
                                
                                
                                

                                <div id="fecha-group"  style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Fecha de publicacion</span>
                                <input id="fecha" type="date" class="form-control"   name="fechaarticulo" value="{{old('fechaarticulo',$articulo->fechapublicacion_articulo)}}">
                                
                                </div>

                                <div id="revista-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Nombre de revista</span>
                                            <input id="revista" type="text"  class="form-control" name="revista" value="{{old('revista',$articulo->nombrerevista)}}">                                          
                                </div>

                                <div id="issn-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">ISSN</span>
                                            <input id="issn" type="text"  class="form-control" name="issn" value="{{old('issn',$articulo->issn)}}">                                          
                                </div>

                                <div id="idioma-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('idioma') ? 'has-error' : ''}}">
                                        <span class="input-group-addon">Idioma</span>
                                        <select id="idioma" class="form-control"  name="idioma" >
                                             <option value="{{$articulo->idioma_articulo}}"  selected>{{$articulo->idioma_articulo}}</option>
                                             @if ($articulo->idioma_articulo != 'Español')
                                             <option value="Español">Español</option>  
                                             @endif
                                             @if ($articulo->idioma_articulo != 'Ingles')
                                             <option value="Inglés">Inglés</option>   
                                             @endif
                                             @if ($articulo->idioma_articulo != 'Frances')
                                             <option value="Francés">Francés</option>   
                                             @endif
                                             @if ($articulo->idioma_articulo != 'Aleman')
                                             <option value="Alemán">Alemán</option>    
                                             @endif
                                             @if ($articulo->idioma_articulo != 'Italiano')
                                             <option value="Italiano">Italiano</option>   
                                             @endif
                                             @if ($articulo->idioma_articulo != 'Portugues')
                                             <option value="Portugués">Portugués</option>    
                                             @endif
                                             @if ($articulo->idioma_articulo != 'Ruso')
                                             <option value="Ruso">Ruso</option>   
                                             @endif
                                                      </select>                                         
                                </div>  

                                <div id="noautores-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores_articulo" type="number" class="form-control"  name="noautores" min="1" value="{{old('noautores',$articulo->noautores_articulo)}}">
                                
                                </div>

                                <div id="filiacion-group" style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">¿Evidencia filiacion de la UPC?</span>
                                            <select id="filiacion"  class="form-control" name="filiacion">
                                            <option value="{{$articulo->evidenciafiliacionUpc}}" selected> {{$articulo->evidenciafiliacionUpc}}</option>
                                            @if ($articulo->evidenciafiliacionUpc != 'Si')
                                            <option value="Si">Si</option> 
                                            @endif
                                            @if ($articulo->evidenciafiliacionUpc != 'No')
                                            <option value="No">No</option>    
                                            @endif
                                                          </select>                                         
                                </div>

                                <div id="puntossolicitados-group" style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Puntos Solicitados</span>
                                 <input id="puntossolicitados" type="number" class="form-control" name="puntossolicitados" value="{{old('puntossolicitados',$articulo->puntos_solicitados)}}">
                        
                                </div>

                                <div id="bonificacionsolicitada-group" style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Bonificacion Solicitada</span>
                                 <input id="bonificacionsolicitada" type="number" class="form-control"  name="bonificacionsolicitada" value="{{old('bonificacionsolicitada',$articulo->bonificacion_solicitada)}}">
                        
                                </div>               
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div id="ejemplar-group" style="margin-bottom: 25px" class="input-group">
                                            <span id="ejemplaractual" class="input-group-addon">{{$soportes->ejemplar_articulo}}</span>
                                      <input  id="ejemplar"type="file" class="form-control" name="ejemplar" >    
                                          </div> 
                                    <div id="cvlac-group" style="margin-bottom: 25px" class="input-group">
                                                <span id="cvlacactual" class="input-group-addon">{{$soportes->Cvlac_articulo}}</span>
                                                 <input id="cvlac" type="file" class="form-control" name="cvlac" >    
                                              </div>
                                    <div id="gruplac-group" style="margin-bottom: 25px" class="input-group">
                                    <span id="gruplacactual" class="input-group-addon">{{$soportes->Gruplac_articulo}}</span>
                                                 <input id="gruplac" type="file" class="form-control" name="gruplac" >    
                                              </div>
                                    <div id="certieditorial-group" style="margin-bottom: 25px" class="input-group">
                                                <span id="certieditorialactual" class="input-group-addon">{{$soportes->Evidenciarevista}}</span>
                                                 <input id="certieditorial" type="file" class="form-control" name="certieditorial" >    
                                              </div>   

                                              <center>
                                                  <div class="text center" style="justify-content:center">
                                                      <button id="boton" type="button" class="btn btn-success mr-4">Siguiente</button>
                                                      <button id="boton2" type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                              </center>
                                     
                                </form>       
                            </div>
                             
                        </div>  
            </div>
        </div>
</div>
@endsection