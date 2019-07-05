@extends('admin.dashboard')

@section('content')
<div class="container" >
    <div class="container">    
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
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
                            <form id="loginform" method="post" action="{{ url("/ponencia") }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Titulo</span>
                                <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo')}}">                                   
                                        </div>
                                
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('nombreevento') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Nombre del Evento</span>
                                <input id="titulo" type="text" class="form-control" required name="nombreevento" value="{{old('nombreevento')}}">                                   
                                </div>    
                                        
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('fechaevento') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Fecha del evento</span>
                                <input id="autores" type="date" class="form-control" required name="fechaevento" value="{{old('fechaevento')}}">
                                
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('lugarevento') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Lugar del Evento</span>
                                <input id="titulo" type="text" class="form-control" required name="lugarevento" value="{{old('lugarevento')}}">                                   
                                </div>    



                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('tipoevento') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Tipo de Evento</span>
                                            <select class="form-control" required name="tipoevento">
                                                 <option value="" selected></option>
                                                            <option value="Internacional">Internacional</option>
                                                            <option value="Nacional">Nacional</option>
                                                            <option value="Regional">Regional</option>
                                                          </select>                                         
                                </div>        

                                
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('idioma') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Idioma</span>
                                            <input id="titulares" type="text" required class="form-control" name="idioma" value="{{old('idioma')}}">                                          
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('noautores') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores" type="number" class="form-control" requireds name="noautores" value="{{old('noautores')}}">
                                
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('paginaevento') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Pagina web del Evento</span>
                                    <input id="titulares" type="text" required class="form-control" name="paginaevento" value="{{old('paginaevento')}}">                                          
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('credito') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">¿Evidencia credito a la UPC?</span>
                                            <select class="form-control" required name="credito">
                                                 <option value="" selected></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                          </select>                                         
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('memoria') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">¿Presenta memorias?</span>
                                            <select class="form-control" required name="memoria">
                                                 <option value="" selected></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                          </select>                                         
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('issn') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">ISSN</span>
                                            <input id="titulares" type="text"  class="form-control" name="issn" value="{{old('issn')}}">                                          
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('isbn') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">ISBN</span>
                                    <input id="titulares" type="text" class="form-control" name="isbn" value="{{old('isbn')}}">                                          
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('ponencias') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Ponencias reconocidas en el presente año</span>
                                 <input id="noautores" type="number" class="form-control" name="ponencias" value="{{old('ponencias')}}">
                        
                                </div>             
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div style="margin-bottom: 25px" class="input-group ">
                                            <span class="input-group-addon">Memorias del evento</span>
                                             <input type="file" class="form-control" required  name="memoria" >    
                                          </div> 

                                        <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Certificado como ponente</span>
                                                 <input type="file" class="form-control" required name="certieponente" >    
                                              </div>   

                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion CVLac</span>
                                                 <input type="file" class="form-control" required name="cvlac" >    
                                              </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion del GrupLac</span>
                                                 <input type="file" class="form-control" required name="gruplac" >    
                                              </div>
                                    

                                    <div style="margin-top:10px" class="form-group">
                                        <div class="col-sm-7 col-sm-offset-5  controls">
                                          <button type="submit" class="btn btn-success">Siguiente</button>
    
                                        </div>
                                    </div>
                                     
                                </form>       
                            </div>
                             
                        </div>  
            </div>
        </div>
</div>
@endsection