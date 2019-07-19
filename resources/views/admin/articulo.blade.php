@extends('admin.dashboard')

@section('content')
<div class="container" >
    <div class="container">    
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
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
                            <form id="loginform" method="post" action="{{ url("/articulo") }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Titulo</span>
                                <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo')}}">                                   
                                        </div>
                                
                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Tipo de publicacion</span>
                                            <select class="form-control" required name="tipoarticulo">
                                                 <option value="" selected></option>
                                                            <option value="Articulo Tradicional">Articulo Tradicional</option>
                                                            <option value="Articulo Corto">Articulo Corto</option>
                                                            <option value="Reporte de Caso">Reporte de Caso</option>
                                                            <option value="Revision de Tema">Revision de Tema</option>
                                                            <option value="Carta al editor">Cartas al editor</option>
                                                            <option value="Editorial">Editoriales</option>
                                                            
                                                          </select>                                         
                                </div>        


                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Tipo de revista</span>
                                            <select class="form-control" required name="tiporevista">
                                                 <option value="" selected></option>
                                                            <option value="A1">A1</option>
                                                            <option value="A2">A2</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                            <option value="No indexada">No indexada</option>
                                                          </select>                                         
                                </div>
                                
                                
                                

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Fecha de publicacion</span>
                                <input id="autores" type="date" class="form-control" required name="fechaarticulo" value="{{old('fechaarticulo')}}">
                                
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Nombre de revista</span>
                                            <input id="titulares" type="text" required class="form-control" name="revista" value="{{old('revista')}}">                                          
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">ISSN</span>
                                            <input id="titulares" type="text" required class="form-control" name="issn" value="{{old('issn')}}">                                          
                                </div>

                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('idioma') ? 'has-error' : ''}}">
                                        <span class="input-group-addon">Idioma</span>
                                        <select class="form-control" required name="idioma" value="{{old('idioma')}}">
                                             <option value="" selected></option>
                                                        <option value="Español">Español</option>
                                                        <option value="Inglés">Inglés</option>
                                                        <option value="Francés">Francés</option>
                                                        <option value="Alemán">Alemán</option>
                                                        <option value="Italiano">Italiano</option>
                                                        <option value="Portugués">Portugués</option>
                                                        <option value="Ruso">Ruso</option>
                                                      </select>                                         
                                </div>  

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores_libro" type="number" class="form-control" requireds name="noautores" min="1" value="{{old('noautores')}}">
                                
                                </div>

                                <div id="grupo">

                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">¿Evidencia filiacion de la UPC?</span>
                                            <select class="form-control" required name="filiacion">
                                                 <option value="" selected></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                          </select>                                         
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Puntos Solicitados</span>
                                 <input id="puntossolicitados" type="number" class="form-control" requireds name="puntossolicitados" value="{{old('puntossolicitados')}}">
                        
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Bonificacion Solicitada</span>
                                 <input id="bonificacionsolicitada" type="number" class="form-control" requireds name="bonificacionsolicitada" value="{{old('bonificacionsolicitada')}}">
                        
                                </div>               
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Ejemplar</span>
                                             <input type="file" class="form-control" required  name="ejemplar" >    
                                          </div> 
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion CVLac</span>
                                                 <input type="file" class="form-control" required name="cvlac" >    
                                              </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia de actualizacion del GrupLac</span>
                                                 <input type="file" class="form-control" required name="gruplac" >    
                                              </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Evidencia indexacion u homologacion de la revista</span>
                                                 <input type="file" class="form-control" required name="certieditorial" >    
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