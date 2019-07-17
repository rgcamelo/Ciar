@extends('admin.dashboard')

@section('content')
<div class="container" >
    <div class="container">    
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
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
                            <form id="loginform" method="post" action="{{ url("/software") }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                            <span class="input-group-addon">Titulo</span>
                                <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo')}}">                                   
                                        </div>
                                
                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Numero de Autores</span>
                                <input id="noautores" type="number" class="form-control" requireds name="noautores" min="1" value="{{old('noautores')}}">
                                
                                </div>

                                <div id="grupo">

                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Titulares del software</span>
                                            <input id="titulares" type="text" required class="form-control" name="titulares" value="{{old('titulares')}}">                                          
                                </div>
                                
                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">¿Se evidencia credito a la UPC?</span>
                                            <select class="form-control" required id="credito" name="credito">
                                                 <option value="" selected> </option>
                                                            <option value="si">Si</option>
                                                            <option value="no">No</option>                                                                
                                                          </select>                                         
                                    </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">¿Impacta el software en la comunidad universitaria?</span>
                                            <select class="form-control" required id="impacto" name="impacto">
                                                    <option value="" selected> </option>
                                                    <option value="si">Si</option>
                                                    <option value="no">No</option>                                                                
                                                  </select>    
                                  </div>  
                                  
                                  <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Codigo Fuente</span>
                                     <input type="file" class="form-control" required name="codigo" >    
                                  </div> 
                                
                                  <hr>
                                  
                                <h4>Soportes</h4>
                                
                                      <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon">Manual de instrucciones</span>
                                             <input type="file" class="form-control" required  name="instrucciones" >    
                                          </div> 

                                          <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Manuales Tecnicos de usuario</span>
                                                 <input type="file" class="form-control" required name="manualusuario" >    
                                              </div> 
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Programa ejecutable</span>
                                                 <input type="file" class="form-control" required name="ejecutable" >    
                                              </div> 
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Certificado de registro del software</span>
                                                 <input type="file" class="form-control" required name="certisoft" >    
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
                                                <span class="input-group-addon">Certificacion del impacto interno en la Upc</span>
                                                 <input type="file" class="form-control" required name="certimpacto" >    
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