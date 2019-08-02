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
                        $("#loginform").attr("action","{{ url('/ponencia') }}");
                    }
                });
        
                $("#boton2").click(function() {
                    limpiar();
                    $("#loginform").attr("action","{{ url('/guardarponencia') }}");
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
                        var valido = true;
                        var titulo = $("#titulo").val();
                        var evento = $("#evento").val();
                        var fecha = $('#fecha').val();
                        var lugar = $('#lugar').val();
                        var tipo = $("#tipo").val();
                        var idioma = $('#idioma').val();
                        var noautores = $("#noautores_ponencia").val();
                        var pagina = $('#pagina').val();
                        var credito = $('#credito').val();
                        var memorias = $('#memorias').val();
                        var issn = $('#issn').val();
                        var isbn = $('#isbn').val();
                        var noponencias = $('#noponencias').val();
                        var memoria = $('#memoria').val();
                        var certieponente = $('#certieponente').val();
                        var cvlac = $('#cvlac').val();
                        var gruplac = $('#gruplac').val();
    
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

                        if( evento == null || evento.length == 0 || /^\s+$/.test(evento)){
                            $('#iconoevento').remove();
                            $("#evento-group").attr("class","has-error input-group");
                            $("#evento-group").append("<span id='iconoevento' class='fa fa-close form-control-feedback'></span>");
                            $("#evento").attr("placeholder","Debe Añadir un el nombre del evento");
                            valido=false;
                        }else{
                            $('#iconoevento').remove();
                            $("#evento-group").attr("class","has-success input-group");
                            $("#evento-group").append("<span id='iconoevento' class='fa fa-check form-control-feedback'></span>");
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

                        if( lugar == null || lugar.length == 0 || /^\s+$/.test(lugar)){
                            $('#iconolugar').remove();
                            $("#lugar-group").attr("class","has-error input-group");
                            $("#lugar-group").append("<span id='iconolugar' class='fa fa-close form-control-feedback'></span>");
                            $("#lugar").attr("placeholder","Debe Añadir un lugar");
                            valido=false;
                        }else{
                            $('#iconolugar').remove();
                            $("#lugar-group").attr("class","has-success input-group");
                            $("#lugar-group").append("<span id='iconolugar' class='fa fa-check form-control-feedback'></span>");
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

                        if( idioma == null || idioma.length == 0 || /^\s+$/.test(idioma)){
                            $('#iconoidioma').remove();
                            $("#idioma-group").attr("class","has-error input-group");
                            $("#idioma-group").append("<span id='iconoidioma' class='fa fa-close form-control-feedback'></span>");
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
                            $("#noautores_ponencia").attr("placeholder","Ingrese el numero de autores");
                            valido=false;
                        }else{
                            $('#icononoautores').remove();
                            $("#noautores-group").attr("class","has-success input-group");
                            $("#noautores-group").append("<span id='icononoautores' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( pagina == null || pagina.length == 0 || /^\s+$/.test(pagina)){
                            $('#iconopagina').remove();
                            $("#pagina-group").attr("class","has-error input-group");
                            $("#pagina-group").append("<span id='iconopagina' class='fa fa-close form-control-feedback'></span>");
                            $("#pagina").attr("placeholder","Ingrese el link de la pagina del evento");
                            valido=false;
                        }else{
                            $('#iconopagina').remove();
                            $("#pagina-group").attr("class","has-success input-group");
                            $("#pagina-group").append("<span id='iconopagina' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( credito == null || credito.length == 0 || /^\s+$/.test(credito)){
                            $('#iconocredito').remove();
                            $("#credito-group").attr("class","has-error input-group");
                            $("#credito-group").append("<span id='iconocredito' class='fa fa-close form-control-feedback'></span>");
                            valido=false;
                        }else{
                            $('#iconocredito').remove();
                            $("#credito-group").attr("class","has-success input-group");
                            $("#credito-group").append("<span id='iconocredito' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( memorias == null || memorias.length == 0 || /^\s+$/.test(memorias)){
                            $('#iconomemorias').remove();
                            $("#memorias-group").attr("class","has-error input-group");
                            $("#memorias-group").append("<span id='iconomemorias' class='fa fa-close form-control-feedback'></span>");
                            valido=false;
                        }else{
                            $('#iconomemorias').remove();
                            $("#memorias-group").attr("class","has-success input-group");
                            $("#memorias-group").append("<span id='iconomemorias' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( issn == null || issn.length == 0 || /^\s+$/.test(issn)){
                            $('#iconoissn').remove();
                            $("#issn-group").attr("class","has-error input-group");
                            $("#issn-group").append("<span id='iconoissn' class='fa fa-close form-control-feedback'></span>");
                            $("#issn").attr("placeholder","Ingrese el ISSN");
                            valido=false;
                        }else{
                            $('#iconoissn').remove();
                            $("#issn-group").attr("class","has-success input-group");
                            $("#issn-group").append("<span id='iconoissn' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( isbn == null || isbn.length == 0 || /^\s+$/.test(isbn)){
                            $('#iconoisbn').remove();
                            $("#isbn-group").attr("class","has-error input-group");
                            $("#isbn-group").append("<span id='iconoisbn' class='fa fa-close form-control-feedback'></span>");
                            $("#isbn").attr("placeholder","Ingrese el ISBN");
                            valido=false;
                        }else{
                            $('#iconoisbn').remove();
                            $("#isbn-group").attr("class","has-success input-group");
                            $("#isbn-group").append("<span id='iconoisbn' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( noponencias == null || noponencias.length == 0 || /^\s+$/.test(noponencias)){
                            $('#icononoponencias').remove();
                            $("#noponencias-group").attr("class","has-error input-group");
                            $("#noponencias-group").append("<span id='icononoponencias' class='fa fa-close form-control-feedback'></span>");
                            $("#noponencias").attr("placeholder","Ingrese el numero de las ponencias aceptadas");
                            valido=false;
                        }else{
                            $('#icononoponencias').remove();
                            $("#noponencias-group").attr("class","has-success input-group");
                            $("#noponencias-group").append("<span id='icononoponencias' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }

                        if( memoria == null || memoria.length == 0 || /^\s+$/.test(memoria)){
                            $('#iconomemoria').remove();
                            $("#memoria-group").attr("class","has-error input-group");
                            $("#memoria-group").append("<span id='iconomemoria' class='fa fa-close form-control-feedback'></span>");
                            $("#memoria_articulo").attr("placeholder","Ingrese el numero de autores");
                            valido=false;
                        }else{
                            $('#iconomemoria').remove();
                            $("#memoria-group").attr("class","has-success input-group");
                            $("#memoria-group").append("<span id='iconomemoria' class='fa fa-check form-control-feedback'></span>");
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
    
                        if( certieponente == null || certieponente.length == 0 || /^\s+$/.test(certieponente)){
                            $('#iconocertieponente').remove();
                            $("#certieponente-group").attr("class","has-error input-group");
                            $("#certieponente-group").append("<span id='iconocertieponente' class='fa fa-close form-control-feedback'></span>");
                            $("#certieponente").attr("placeholder","Ingrese la bonificacion solicitada");
                            valido=false;
                        }else{
                            $('#iconocertieponente').remove();
                            $("#certieponente-group").attr("class","has-success input-group");
                            $("#certieponente-group").append("<span id='iconocertieponente' class='fa fa-check form-control-feedback'></span>");
                            valido = true;
                        }
 
                    return valido;
              }	
                    
        </script>
<div class="section" >
    <div>    
            <center>
                    <div id="alerta" style="width:700px" class="text-center">
                        </div> 
            </center>
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-success" >
                        <div class="panel-heading">
                            <div class="panel-title">Datos de la Ponencia</div>
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
                                
                                <div id="evento-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('nombreevento') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Nombre del Evento</span>
                                <input id="evento" type="text" class="form-control" name="nombreevento" value="{{old('nombreevento')}}">                                   
                                </div>    
                                        
                                <div id="fecha-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('fechaevento') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Fecha del evento</span>
                                <input id="fecha" type="date" class="form-control"  name="fechaevento" value="{{old('fechaevento')}}">
                                
                                </div>

                                <div id="lugar-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('lugarevento') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Lugar del Evento</span>
                                <input id="lugar" type="text" class="form-control" name="lugarevento" value="{{old('lugarevento')}}">                                   
                                </div>    



                                <div id="tipo-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('tipoevento') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Tipo de Evento</span>
                                            <select id="tipo" class="form-control"  name="tipoevento">
                                                 <option disabled value="" selected>Seleccione un tipo de evento</option>
                                                            <option value="Internacional">Internacional</option>
                                                            <option value="Nacional">Nacional</option>
                                                            <option value="Regional">Regional</option>
                                                          </select>                                         
                                </div>        

                                <div id="idioma-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('idioma') ? 'has-error' : ''}}">
                                        <span class="input-group-addon">Idioma</span>
                                        <select id="idioma" class="form-control"  name="idioma" value="{{old('idioma')}}">
                                             <option disabled value="" selected>Seleccione un Idioma</option>
                                                        <option value="Español">Español</option>
                                                        <option value="Inglés">Inglés</option>
                                                        <option value="Francés">Francés</option>
                                                        <option value="Alemán">Alemán</option>
                                                        <option value="Italiano">Italiano</option>
                                                        <option value="Portugués">Portugués</option>
                                                        <option value="Ruso">Ruso</option>
                                                      </select>                                         
                                </div>  
                                

                                <div id="noautores-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('noautores') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores_ponencia" type="number" class="form-control"  name="noautores" min="1" value="{{old('noautores')}}">
                                
                                </div>

                                <div id="pagina-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('paginaevento') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Pagina web del Evento</span>
                                    <input id="pagina" type="text" class="form-control" name="paginaevento" value="{{old('paginaevento')}}">                                          
                                </div>

                                <div id="credito-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('credito') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">¿Evidencia credito a la UPC?</span>
                                            <select id="credito" class="form-control"  name="credito">
                                                 <option disabled value="" selected>Seleccione una opcion</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                          </select>                                         
                                </div>

                                <div id="memorias-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('memoria') ? 'has-error' : ''}}">
                                            <span id="memorias" class="input-group-addon">¿Presenta memorias?</span>
                                            <select class="form-control"  name="memoria">
                                                 <option disabled value="" selected>Seleccione una opcion</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                          </select>                                         
                                </div>

                                <div id="issn-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('issn') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">ISSN</span>
                                            <input id="issn" type="text"  class="form-control" name="issn" value="{{old('issn')}}">                                          
                                </div>

                                <div id="isbn-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('isbn') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">ISBN</span>
                                    <input id="isbn" type="text" class="form-control" name="isbn" value="{{old('isbn')}}">                                          
                                </div>

                                <div id="noponencias-group" style="margin-bottom: 25px" class="input-group {{ $errors->has('ponencias') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Ponencias reconocidas en el presente año</span>
                                 <input id="noponencias" type="number" class="form-control" name="ponencias" min="0" value="{{old('ponencias')}}">
                        
                                </div>             
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div id="memoria-group" style="margin-bottom: 25px" class="input-group ">
                                            <span class="input-group-addon">Memorias del evento</span>
                                             <input id="memoria" type="file" class="form-control" name="memoria" >    
                                          </div> 

                                        <div id="certieponente-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Certificado como ponente</span>
                                                 <input id="certieponente" type="file" class="form-control" name="certieponente" >    
                                              </div>   

                                    <div id="cvlac-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion CVLac</span>
                                                 <input id="cvlac" type="file" class="form-control" name="cvlac" >    
                                              </div>
                                    <div id="gruplac-group" style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion del GrupLac</span>
                                                 <input id="gruplac" type="file" class="form-control"  name="gruplac" >    
                                              </div>
                                    

                                    <div style="margin-top:10px" class="form-group">

                                        <div>
                                          @if (isset(auth()->user()->Docente()->Productividad()->publicacion))
                                          @if (auth()->user()->Docente()->Productividad()->ponencia < 3 )
                                          <center>
                                                <div class="text center" style="justify-content:center">
                                                    <button id="boton" type="button" class="btn btn-success mr-4">Siguiente</button>
                                                    <button id="boton2" type="submit" class="btn btn-primary">Guardar</button>
                                                  </div>
                                            </center>
                                          @else
                                          Limite maximo Alcanzado
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