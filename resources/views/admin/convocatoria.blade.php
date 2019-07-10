@extends('admin.dashboard')

@section('content')
<div class="container" >
    <div class="container">
        @if ($convocatoria->isEmpty() )
        <button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#reclamo">
                Iniciar
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="reclamo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h3>Iniciar Convocatoria</h3>
                    </div>
                    
                    <div class="modal-body">
                            <form action="{{ url("/convocatoria") }}" method="post">
                                {!! csrf_field() !!}
                            <div class="form-row" style="display: flex;justify-content:center">
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Titulo</span>
                            <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo')}}">                                   
                            </div>
                            </div>
                         
                            <div class="form-row" style="display: flex;justify-content:center">
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('fechainicio') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Fecha de Inicio</span>
                        <input id="fechainicio" type="date" class="form-control" required name="fechainicio" value="{{old('fechainicio')}}">                                   
                        </div>
                            </div>

                            <div class="form-row" style="display: flex;justify-content:center">
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('fechafinal') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Fecha Final</span>
                        <input id="fechafinal" type="date" class="form-control" required name="fechafinal" value="{{old('fechafinal')}}">                                   
                        </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer" style="display: flex;justify-content:center">
                    
                              <button type="submit" class="btn btn-success mr-5 ">Aceptar</button>
                              <button type="button"  class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                      
                      
                    </div>
                </form>
                  </div>
                </div>
              </div><br><br>
        @else
              
        <div class="info-box ">
            <div class="container ml-2" >
                    <h1 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Convocatoria: {{$convocatoria->first()->titulo}}</h1>
                    <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
                        Estado: <span style="font-size:16px" class="label label-success">
                                Abierta
                        </span>
                    </h2>
                    
                    <div class="content">
                        <div class="row">
                            <div class="col-md-2">
                                <ul class="timeline">
                                    <li class="timelabel">
                                        <span style="font-size:16px" class="label label-success">
                                                Apertura
                                        </span>
                                    </li>
                                    <li class="timelabel">
                                        <span style="font-size:24px" class="label label-success">
                                                {{$convocatoria->first()->fecha_inicio}}
                                        </span>
                                    </li>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <li class="timelabel">
                                            <span style="font-size:24px" class="label label-danger ">
                                                
                                                    {{$convocatoria->first()->fecha_final}}
                                            </span>
                                        </li>
                                    <li class="timelabel">
                                            <span style="font-size:16px" class="label label-danger ">
                                                Cierre
                                            </span>
                                        </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                        <div class="col-md-4">
                                                <div class="small-box bg-yellow">
                                                    <div class="inner">
                                                        <h4>Solicitudes</h4>
                                                        <h3>{{$solicituds}}</h3>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fa fa-archive"></i>
                                                    </div>
                    
                                                </div>
                    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="small-box bg-green">
                                                    <div class="inner">
                                                            <h4>Aprobadas</h4>
                                                            <h3>{{$aprobado}}</h3>
                                                    </div>
                                                    <div class="icon">
                                                        <i class=" fa fa-check"></i>

                                                    </div>
                    
                                                </div>
                    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="small-box bg-red">
                                                    <div class="inner">
                                                            <h4>No Aprobadas</h4>
                                                            <h3>{{$reprobado}}</h3>
                                                    </div>
                                                    <div class="icon">
                                                            <i class=" fa fa-close"></i>
    
                                                        </div>
                    
                                                </div>
                    
                                            </div>
                                </div>
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        

                    </div>
            </div>
            
            
        </div>
        @endif    
            
        </div>
</div>
@endsection