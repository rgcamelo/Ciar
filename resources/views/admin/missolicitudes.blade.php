@extends('admin.dashboard')

@section('content')
    
    <div class="section">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true,
                        "language": {
                        "emptyTable": "<div><img style='width:300px;heigth:300px'  src='/admintle/img/logo1.png'></img></div>"
                        }
                    } );
                } );</script>
            <table id="tabla" class='display'style="width:100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th style="width:100px">Estado</th>
                            <th style="width:200px"></th>
                            <th>Observaciones</th>
                            <th style="width:100px">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $sol)
                        <tr>
                                <td>{{$sol->titulo}}</td>
                                <td>
                                                
                                                @if ($sol->estado == 'Enviado')
                                                <span style="font-size:16px" class="label label-warning">{{$sol->estado}}</span>
                                                @endif
                                                @if ($sol->estado == 'Enviado a Pares')
                                                  <span style="font-size:16px" class="label label-warning">{{$sol->estado}}</span>
                                               
                                                @endif
                                                @if ($sol->estado == 'Calificado por Pares')
                                                  <span style="font-size:16px" class="label label-warning">{{$sol->estado}}</span>
                                               
                                                @endif 
                                                @if ($sol->estado == 'Aprobado' or $sol->estado =='Aprobado2')
                                               <span style="font-size:16px" class="label label-success">Aprobado</span>
                                                @endif   
                                                @if ($sol->estado == 'No Aprobado' or $sol->estado == 'Rechazado2')
                                                  <span style="font-size:16px" class="label label-danger">No Aprobado</span>
                                                @endif  
                                                @if ($sol->estado == 'Cancelado')
                                                  <span style="font-size:16px" class="label label-danger">{{$sol->estado}}</span>
                                                @endif 
                                                @if ($sol->estado == 'Reclamado')
                                                  <span style="font-size:16px" class="label label-warning">{{$sol->estado}}</span>
                                                @endif
                                                @if ($sol->estado == 'Incompleta')
                                                  <span style="font-size:16px" class="label label-primary">Guardado</span>
                                                @endif                                                 
                                </td> 
                                <td>
                                  <div class="info-box 
                                  @if($sol->estado == 'Aprobado' or $sol->estado =='Aprobado2')bg-green @endif
                                  @if($sol->estado == 'Incompleta' )bg-blue @endif
                                  @if ($sol->estado == 'Enviado' or $sol->estado == 'Enviado a Pares' or $sol->estado == 'Reclamado' or $sol->estado == 'Calificado por Pares')bg-yellow @endif
                                  @if ($sol->estado == 'No Aprobado' or $sol->estado == 'Rechazado2' or $sol->estado == 'Cancelado')bg-red @endif
                                  ">
                                    @if ($sol->puntos_aprox == null)
                                    <div>
                                        <span class="info-box-icon">
                                          <i class="
                                          @if($sol->estado == 'Aprobado' or $sol->estado =='Aprobado2')fa fa-check @endif
                                          @if ($sol->estado == 'Enviado')fa fa-envelope @endif
                                          @if ($sol->estado == 'Enviado a Pares' )fa fa-arrow-left @endif
                                          @if ($sol->estado == 'Reclamado' )fa fa-commenting @endif
                                          @if ($sol->estado == 'Calificado por Pares' )fa fa-graduation-cap @endif
                                          @if ($sol->estado == 'No Aprobado' or $sol->estado == 'Rechazado2' or $sol->estado == 'Cancelado')fa fa-close @endif
                                          @if ($sol->estado == 'Cancelado')fa fa-minus @endif
                                          @if ($sol->estado == 'Incompleta')fa fa-paperclip @endif
                                          "></i>
                                        </span>
                                        <div class="info-box-content">
                                          <span class="info-box-text">Bonificacion Calculada:</span>
                                          <span class="info-box-number">{{$sol->bonificacion_calculada}}</span>
                                          <span class="info-box-text">Bonificacion Asignada:</span>
                                          <span class="info-box-number">{{$sol->bonificacion_asignada}}</span>
                                        </div>
                                      </div>
                                    @endif
                                    @if ($sol->bonificacion_calculada == null)
                                    <div>
                                      <span class="info-box-icon">
                                        <i class="
                                        @if($sol->estado == 'Aprobado' or $sol->estado =='Aprobado2')fa fa-check @endif
                                          @if ($sol->estado == 'Enviado')fa fa-envelope @endif
                                          @if ($sol->estado == 'Enviado a Pares' )fa fa-arrow-left @endif
                                          @if ($sol->estado == 'Reclamado' )fa fa-commenting @endif
                                          @if ($sol->estado == 'Calificado por Pares' )fa fa-graduation-cap @endif
                                          @if ($sol->estado == 'No Aprobado' or $sol->estado == 'Rechazado2' or $sol->estado == 'Cancelado')fa fa-close @endif
                                          @if ($sol->estado == 'Cancelado')fa fa-minus @endif
                                          @if ($sol->estado == 'Incompleta')fa fa-paperclip @endif
                                        "></i>
                                      </span>
                                      <div class="info-box-content">
                                        <span class="info-box-text">Puntos Calculados:</span>
                                        <span class="info-box-number">{{$sol->puntos_aprox}}</span>
                                        <span class="info-box-text">Puntos Asignados:</span>
                                        <span class="info-box-number">{{$sol->puntos_asignados}}</span>
                                      </div>
                                    </div>
                                    @endif

                                  </div>
                                </td>       
                                <td>{{$sol->observaciones}}</td>
                                <td >
                                    @if ($sol->estado == 'Enviado')
                                  
                                    @switch($sol->productividadable_type)
                                        @case('App\Video')
                                          @if ($sol->bonificacion_calculada == null)
                                          @if ($sol->videos >= 5)
                                            <div class="info-box">
                                                <div>
                                                  <span class="info-box-icon bg-blue">
                                                    <i class="fa fa-exclamation"></i>
                                                  </span>
                                                  <div class="info-box-content">
                                                    <span class="info-box-text">Tope Maximo </span>
                                                  </div>
                                                </div>
                                                
                                              </div>
                                              @else
                                              <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                  <span class="fa fa-close"></span>
                                                </button>
                                            @endif
                                          @else
                                          @if ($sol->videosbon >= 5)
                                          <div class="info-box">
                                              <div>
                                                <span class="info-box-icon bg-blue">
                                                  <i class="fa fa-exclamation"></i>
                                                </span>
                                                <div class="info-box-content">
                                                  <span class="info-box-text">Tope Maximo </span>
                                                </div>
                                              </div>
                                              
                                            </div>
                                            @else
                                              <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                  <span class="fa fa-close"></span>
                                                </button>
                                          @endif


                                          @endif
                                            
                                            @break
                                        @case('App\Traduccion')
                                            @if ($sol->bonificacion_calculada != null)
                                              @if ($sol->traduccionesbon >= 5)
                                              <div class="info-box">
                                                <div>
                                                  <span class="info-box-icon bg-blue">
                                                    <i class="fa fa-exclamation"></i>
                                                  </span>
                                                  <div class="info-box-content">
                                                    <span class="info-box-text">Tope Maximo </span>
                                                  </div>
                                                </div>
                                                
                                              </div>
                                              @else
                                              <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                  <span class="fa fa-close"></span>
                                                </button>
                                              @endif
                                            @else
                                            <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                <span class="fa fa-close"></span>
                                              </button>
                                            @endif
                                            @break

                                            @case('App\PublicacionImpresa')
                                            @if ($sol->bonificacion_calculada != null)
                                              @if ($sol->publicacion >= 5)
                                              <div class="info-box">
                                                <div>
                                                  <span class="info-box-icon bg-blue">
                                                    <i class="fa fa-exclamation"></i>
                                                  </span>
                                                  <div class="info-box-content">
                                                    <span class="info-box-text">Tope Maximo </span>
                                                  </div>
                                                </div>
                                                
                                              </div>
                                              @else
                                              <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                  <span class="fa fa-close"></span>
                                                </button>
                                              @endif
                                            @else
                                            <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                <span class="fa fa-close"></span>
                                              </button>
                                            @endif
                                            @break
                                        
                                        @break
                                        
                                        @case('App\ReseñasCriticas')
                                            @if ($sol->bonificacion_calculada != null)
                                              @if ($sol->reseñas >= 5)
                                              <div class="info-box">
                                                <div>
                                                  <span class="info-box-icon bg-blue">
                                                    <i class="fa fa-exclamation"></i>
                                                  </span>
                                                  <div class="info-box-content">
                                                    <span class="info-box-text">Tope Maximo </span>
                                                  </div>
                                                </div>
                                                
                                              </div>
                                              @else
                                              <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                  <span class="fa fa-close"></span>
                                                </button>
                                              @endif
                                            @else
                                            <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                <span class="fa fa-close"></span>
                                              </button>
                                            @endif
                                            @break

                                            @case('App\DireccionTesis')
                                            @if ($sol->bonificacion_calculada != null)
                                              @if ($sol->direccion >= 3)
                                              <div class="info-box">
                                                <div>
                                                  <span class="info-box-icon bg-blue">
                                                    <i class="fa fa-exclamation"></i>
                                                  </span>
                                                  <div class="info-box-content">
                                                    <span class="info-box-text">Tope Maximo </span>
                                                  </div>
                                                </div>
                                                
                                              </div>
                                              @else
                                              <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                  <span class="fa fa-close"></span>
                                                </button>
                                              @endif
                                            @else
                                            <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                <span class="fa fa-close"></span>
                                              </button>
                                            @endif
                                            @break

                                        @case('App\Obra')
                                          @if ($sol->bonificacion_calculada == null)
                                          @if ($sol->obras >= 5)
                                            <div class="info-box">
                                                <div>
                                                  <span class="info-box-icon bg-blue">
                                                    <i class="fa fa-exclamation"></i>
                                                  </span>
                                                  <div class="info-box-content">
                                                    <span class="info-box-text">Tope Maximo </span>
                                                  </div>
                                                </div>
                                                
                                              </div>
                                              @else
                                              <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                  <span class="fa fa-close"></span>
                                                </button>
                                            @endif
                                          @else
                                          @if ($sol->obrasbon >= 5)
                                          <div class="info-box">
                                              <div>
                                                <span class="info-box-icon bg-blue">
                                                  <i class="fa fa-exclamation"></i>
                                                </span>
                                                <div class="info-box-content">
                                                  <span class="info-box-text">Tope Maximo </span>
                                                </div>
                                              </div>
                                              
                                            </div>
                                            @else
                                              <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                                  <span class="fa fa-close"></span>
                                                </button>
                                          @endif


                                          @endif
                                            
                                            @break
                                            @default
                                        <button type="button" class="btn btn-danger btn-lg" title="Cancelar"  data-toggle="modal" data-target="#cancelar{{$sol->idsolicitud}}">
                                            <span class="fa fa-close"></span>
                                          </button>
                                    @endswitch
                                        
                                              
                                              <!-- Modal -->
                                            <div class="modal fade" id="cancelar{{$sol->idsolicitud}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2 class="text-center">¿Esta seguro de cancelar la solicitud?</h2>
                                                      
                                                    </div>
                                                    <div class="modal-footer" style="display: flex;justify-content:center">
                                                    <form action="{{ url("cancelar/{$sol->idsolicitud}") }}" method="post">
                                                              {!! csrf_field() !!}
                                                              <button type="submit" class="btn btn-success mr-5 ">Aceptar</button>
                                                              <button type="button"  class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                                                      </form>
                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                    @endif
                                    @if ( ($sol->estado == 'Aprobado' or $sol->estado == 'No Aprobado') and ( strtotime(date('Y-m-d'))-strtotime($sol->fechaCalificada) <= 20) ) 
                                            <button type="button" class="btn btn-warning btn-lg"  data-toggle="modal" data-target="#reclamo{{$sol->idproductividad}}">
                                            <span class="fa fa-commenting">
                                            </span>
                                              </button>
                                              
                                              <!-- Modal -->
                                              <div class="modal fade" id="reclamo{{$sol->idproductividad}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form action="{{ url("reclamar/{$sol->idsolicitud}/{$sol->idproductividad}") }}" method="post" enctype="multipart/form-data">
                                                        {!! csrf_field() !!}
                                                    <div class="modal-body">
                                                            <div class="form-row" style="display: flex;justify-content:center">
                                                                    <span style="font-size: 16px">Reclamo: </span>
                                                                    <textarea name="reclamo" rows="5" required cols="60" placeholder="Escriba su reclamo"></textarea> 
                                                            </div>
                                                            <br>
                                                            <div class="form-row" style="display: flex;justify-content:center">
                                                                    <div style="margin-bottom: 25px" class="input-group">
                                                                            <span class="input-group-addon">Soporte:</span>
                                                                             <input type="file" class="form-control" name="soportereclamo" >    
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
                                              </div>
                                    @endif
                                    @if ($sol->folder != null)
                                    @if ( ($sol->estado == 'Aprobado' or $sol->estado == 'No Aprobado') ) 
                                    <button class="btn btn-primary btn-lg" onclick="window.open('{{$sol->folder}}/{{$sol->formatorecibido}}')"> <i class="fa fa-eye"></i></button>
                                    @else
                                    <button class="btn btn-primary btn-lg" onclick="window.open('{{$sol->folder}}/{{$sol->formatoenviado}}')"> <i class="fa fa-eye"></i></button>
                                    @endif
                                    @endif
                                    
                                </td>
                            </tr>   
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection