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
                            <th>Estado</th>
                            <th >Contenido</th>
                            <th>Soporte</th>
                            <th>Respuesta</th>
                            <th style="width:100px" >Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reclamos as $sol)
                        <tr>
                                <td>{{$sol->titulo}}</td>
                                <td>
                                                
                                                @if ($sol->estado == 'Enviado')
                                                <span style="font-size:16px" class="label label-warning">Recibido</span>
                                                @endif
                                                @if ($sol->estado == 'Enviado a Pares')
                                                  <span style="font-size:16px" class="label label-warning">{{$sol->estado}}</span>
                                               
                                                @endif
                                                @if ($sol->estado == 'Calificado por Pares')
                                                  <span style="font-size:16px" class="label label-warning">{{$sol->estado}}</span>
                                               
                                                @endif 
                                                @if ($sol->estado == 'Aprobado')
                                               <span style="font-size:16px" class="label label-success">{{$sol->estado}}</span>
                                                @endif   
                                                @if ($sol->estado == 'No Aprobado' or $sol->estado == 'Rechazado')
                                                  <span style="font-size:16px" class="label label-danger">{{$sol->estado}}</span>
                                                @endif  
                                                @if ($sol->estado == 'Cancelado')
                                                  <span style="font-size:16px" class="label label-danger">{{$sol->estado}}</span>
                                                @endif                                                  
                                        
                                <td>{{$sol->contenido}}</td>
                                <td>
                                  @if ($sol->soporte != null)
                                  <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$sol->ruta}}/{{$sol->soporte}}')" ><i class="fa fa-eye"></i></a>  
                                  @endif
                                </td>
                                <td style="font-size:24px">
                                  @if ($sol->soporte_respuesta != null)
                                  <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$sol->ruta}}/{{$sol->soporte_respuesta}}')" ><i class="fa fa-eye"></i></a>

                                  @endif

                                </td>                 
                                <td>
                                    @if ($sol->estado == 'Enviado')
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#calificar{{$sol->idreclamo}}"><span class="fa fa-check"></span></button>
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#reprobar{{$sol->idreclamo}}"><span class="fa fa-close"></span></button>
                                          </div>
                                    </div>
                                    
                                          
                                          <!-- Modal -->
                                  <div class="modal fade" id="calificar{{$sol->idreclamo}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body" style="display: flex;justify-content:center">
                                                  <div class="container">
                                                    <div class="row">
                                                      <div class="col-md-12" >
                                                          <form @if ($sol->bonificacion_calculada != null)
                                                              action="{{ url('aceptarreclamobonificacion',['reclamo' => $sol->idreclamo]) }}"
                                                           @else
                                                          action="{{ url('aceptarreclamo',['reclamo' => $sol->idreclamo]) }}"
                                                          @endif
                                                             method="post" id="aprobar" enctype="multipart/form-data">
                                                              {!! csrf_field() !!}
                                                                          <h3 class="text-center">¿Esta seguro de Aceptar el reclamo?</h3>
                                                                            <br>
                                                                            <div class="form-row" style="display: flex;justify-content:center">
                                                                                <span style="font-size: 16px">Justificacion: </span>
                                                                                <textarea name="justificacion"  rows="5" cols="60" placeholder="Escriba su justificacion"></textarea> 
                                                                        </div>
                                                                      
                                                                        <br>
                                                                        <div class="form-row" style="display: flex;justify-content:center">
                                                                                <div style="margin-bottom: 25px" class="input-group">
                                                                                        <span class="input-group-addon">Soporte:</span>
                                                                                         <input type="file" required class="form-control" name="soportejustificacion" >    
                                                                                </div> 
                                                                        </div>
                                                                            <br>
                                                                            <br>
                                                                            <div class="form-row" style="display: flex;justify-content:center" >
                                                                             <br>
                                                                                    <input type="submit" class="btn btn-success mr-5 " value="Aceptar">
                                                                                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                                                                                </div>
                                                      </form>
                                                      </div>
                                                    </div>
                                                      
                                                  </div>
                                                        
                                                    <br>
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer" style="display: flex;justify-content:center">
                                                
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                            
                                          <div class="modal fade" id="reprobar{{$sol->idreclamo}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  </div>
                                                  <div class="modal-body" style="display: flex;justify-content:center">
                                                          <form action="{{ url('rechazarreclamo',['reclamo' => $sol->idreclamo]) }}" method="post" id="reprobar" name="reprobar"  enctype="multipart/form-data">
                                                              {!! csrf_field() !!}
                                                              <h3 class="text-center">¿Esta seguro de Rechazar el reclamo?</h3>
                                                              <br>
                                                              <div class="form-row" style="display: flex;justify-content:center">
                                                                  <span style="font-size: 16px">Justificacion: </span>
                                                                  <textarea name="justificacion"  rows="5" cols="60" placeholder="Escriba su justificacion"></textarea> 
                                                          </div>
                                                          <br>
                                                          <div class="form-row" style="display: flex;justify-content:center">
                                                                  <div style="margin-bottom: 25px" class="input-group">
                                                                          <span class="input-group-addon">Soporte:</span>
                                                                           <input type="file" required class="form-control" name="soportejustificacion" >    
                                                                  </div> 
                                                          </div>
                                                              <br>
                                                              <br>
                                                              <div class="form-row" style="display: flex;justify-content:center" >
                                                               <br>
                                                                      <input type="submit" class="btn btn-success mr-5" value="Aceptar">
                                                                      <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                                                                  </div>
                                                      </form>
                                                      
                                                  </div>
                                                  <div class="modal-footer" style="display: flex;justify-content:center">
                                                  
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          
                                          <br>
                                    @endif
                                        
                                </td>
                            </tr>   
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection