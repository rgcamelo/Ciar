@extends('admin.layout')

@section('content')
<div class="container" >
        <div class="container">    
                <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
                    <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Datos Docente</div>
                                <div style="float:right; font-size: 80%; position: relative; top:-10px">Revise sus Datos sean correctos</div>
                            </div>     
        
                            <div style="padding-top:30px" class="panel-body" >
        
                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                    
                                <form id="loginform" method="post" action="{{ url("/Docente/{$docente->id}/seleccionarproductividad ") }}" class="form-horizontal" role="form">
                                        {!! csrf_field() !!}
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Nombre Completo</span>
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $docente->NombreCompleto}}">                                        
                                            </div>
                                        
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Dedicacion</span>
                                    <input id="dedicacion" type="text" class="form-control" name="dedicacion" value="{{ $docente->Dedicacion}}">
                                            </div>

                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Tipo de Identidicacion</span>
                                                <select class="form-control" id="tipoidentificacion" name="tipoidentificacion">
                                                        <option selected>{{ $tipo->Tipo }}</option>
                                                        @foreach ($Tipos as $t)
                                                        @if ($tipo->Tipo != $t->Tipo)
                                                        <option value="{{ $t->id}}">{{ $t->Tipo}}</option>
                                                        @endif               
                                                        @endforeach                                                                       
                                                      </select>                                           
                                    </div>
                                    
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Numero Identificacion</span>
                                    <input id="identificacion" type="text" class="form-control" name="identificacion" value="{{ $docente->Identificacion}}">
                                            </div>

                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Grupo de Investigacion</span>
                                                <select class="form-control" id="grupoinvestigacion" name="grupoinvestigacion">
                                                                <option selected>{{ $grupo->Nombre }}</option>
                                                                
                                                                @foreach ($grupos as $g)
                                                                @if ($grupo->Nombre != $g->Nombre)
                                                                <option value="{{ $g->id}}">{{ $g->Nombre}}</option>
                                                                @endif               
                                                                @endforeach                                                                 
                                                </select>   
                                      </div>                                                                                       
                                            
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Categoria</span>
                                                <select class="form-control" id="categoria" name="categoria">
                                                                <option selected>{{ $categoria->Nombre }}</option>
                                                                
                                                                @foreach ($categorias as $c)
                                                                @if ($categoria->Nombre != $c->Nombre)
                                                                <option value="{{ $c->id}}">{{ $c->Nombre}}</option>
                                                                @endif               
                                                                @endforeach                                                               
                                                </select>   
                                                </div> 
                                    
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Correo</span>
                                    <input id="correo" type="text" class="form-control" name="correo" value="{{ $docente->Correo}}">
                                            </div> 

                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon">Telefono</span>
                                    <input id="telefono" type="text" class="form-control" name="telefono" placeholder="Numero de telefono" value="{{$docente->Telefono}}">
                                            </div>
                                         
                                        <div style="margin-top:10px" class="form-group">
                                            <div class="col-sm-7 col-sm-offset-5  controls">
                                              <button type="submit" class="btn btn-success">Siguiente</button>
        
                                            </div>
                                        </div>
                                         
                                    </form>     
                                    <div style="margin-top:10px" class="form-group">
                                                <div class="col-sm-7 col-sm-offset-5  controls">
                                                <a  class="btn btn-primary" href="{{ route('productividad.seleccionar',$docente) }}">Siguiente</a>                 
             
                                                </div>
                                            </div>   
                                </div>
                                 
                            </div>  
                </div>
            </div>
</div>
@endsection