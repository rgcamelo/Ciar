@extends('admin.dashboard')

@section('content')
<div class="container" >
    <div class="container">
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
                                            <form action="{{ url("cerrarconvocatoria/{$convocatoria->first()->idconvocatoria}") }}" method="post">
                                                {!! csrf_field() !!}
                                                <button class="btn btn-danger" > Cerrar Convocatoria</button>
                                            </form>
                                                
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                 
                                </div>
                            </div>
        
                            
                    </div>
        
                    
                    
                </div>
        </div>
</div>
@endsection    
        