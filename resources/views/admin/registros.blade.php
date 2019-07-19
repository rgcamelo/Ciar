@extends('admin.dashboard')

@section('content')
    
    <div class="section">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true
                    } );
                } );</script>
            <table id="tabla" class='display'style="width:100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th style="width:100px">Solicitudes</th>
                            <th style="width:100px">Aceptadas</th>
                            <th>Rechazadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($convocatorias as $c)
                        <tr>
                                <td>
                                                @if ($c->estado == 'Actual')
                                               <span style="font-size:16px" class="label label-success">{{$c->titulo}}</span>
                                                @endif   

                                                @if ($c->estado == 'Cerrada')
                                                  <span style="font-size:16px" class="label label-danger">{{$c->titulo}}</span>
                                                @endif                                              
                                </td>
                                <td>
                                        <div class="info-box bg-yellow ">
                                          <div>
                                              <span class="info-box-icon">
                                                <i class="fa fa-envelope"></i>
                                              </span>
                                              <div class="info-box-content">
                                                <span class="info-box-text">Solicitudes Recibidas:</span>
                                                <span class="info-box-number">{{$c->solicitudes}}</span>
                                                @if ($c->estado == 'Cerrada')
                                              <form action="{{url('bajaracta',['convocatoria' => $c->idconvocatoria])}} " method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-warning form-control"><i class="fa fa-file"></i> </button>       
                                                </form>
                                                @endif
                                              </div>
                                              
                                            </div>
                                        </div>
                                </td>
                                <td>
                                        <div class="info-box bg-green ">
                                          <div>
                                              <span class="info-box-icon">
                                                <i class="fa fa-check"></i>
                                              </span>
                                              <div class="info-box-content">
                                                <span class="info-box-text">Solicitudes Aprobadas:</span>
                                                <span class="info-box-number">{{$c->aprobadas}}</span>
                                                @if ($c->estado == 'Cerrada')
                                                <form action="{{url('aprobadas',['convocatoria' => $c->idconvocatoria])}} " method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-success form-control"><i class="fa fa-file"></i> </button>       
                                                    </form>                                                @endif
                                              </div>
                                            </div>
                                        </div>
                                </td> 
                                <td>
                                        <div class="info-box bg-red ">
                                          <div>
                                              <span class="info-box-icon">
                                                <i class="fa fa-close"></i>
                                              </span>
                                              <div class="info-box-content">
                                                <span class="info-box-text">Solicitudes Rechazadas:</span>
                                                <span class="info-box-number">{{$c->rechazadas}}</span>
                                                @if ($c->estado == 'Cerrada')
                                                <form action="{{url('noaprobadas',['convocatoria' => $c->idconvocatoria])}} " method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger form-control"><i class="fa fa-file"></i> </button>       
                                                    </form>       
                                                @endif
                                              </div>
                                            </div>
                                        </div>
                                </td>   
                            </tr>                                             
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection