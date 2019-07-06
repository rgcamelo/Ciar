@extends('admin.dashboard')

@section('content')
<div class="container" >
    <div class="container">    
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
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
                            <form id="loginform" method="post" action="{{ url("/libro") }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Titulo</span>
                                <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo')}}">                                   
                                        </div>
                                
                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Tipo de Libro</span>
                                            <select class="form-control" required id="tipolibro" name="tipolibro">
                                                 <option value="" selected></option>
                                                            <option value="Libro de texto">Libro de texto</option>
                                                            <option value="Libro resultado de un labor de investigacion">Libro resultado de un labor de investigacion</option>
                                                            <option value="Libro de ensayo">Libro de ensayo</option>                                                                  
                                                          </select>                                         
                                    </div>
                                
                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores_libro" type="number" class="form-control" requireds name="noautores" min="1" value="{{old('noautores')}}">
                                
                                        </div>


                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Fecha de publicacion</span>
                                <input id="autores" type="date" class="form-control" required name="fecha" value="{{old('fecha')}}">
                                
                                        </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Editorial</span>
                                            <input id="titulares" type="text" required class="form-control" name="editorial" value="{{old('editorial')}}">                                          
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">ISBN</span>
                                            <input id="titulares" type="text" required class="form-control" name="isbn" value="{{old('isbn')}}">                                          
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
                                            <span class="input-group-addon">¿Se evidencia credito a la UPC?</span>
                                            <select class="form-control" required id="credito" name="credito">
                                                 <option value="" selected> </option>
                                                            <option value="si">Si</option>
                                                            <option value="no">No</option>                                                                
                                                          </select>                                         
                                    </div>

                                
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Ejemplar</span>
                                             <input type="file" class="form-control" required  name="ejemplar" >    
                                          </div> 
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Certificado de libro producto de investigacion</span>
                                                 <input type="file" class="form-control" required name="certilibroinves" >    
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
                                                <span class="input-group-addon">Certificacion de identificacion reconocidad por la editorial</span>
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