@extends('admin.dashboard')

@section('content')
    
    <div class="container  col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-1">
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
                            <th>estado</th>
                            <th >Contenido</th>
                            <th>Soporte</th>
                            <th>Respuesta</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reclamos as $sol)
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
                                                @if ($sol->estado == 'Aprobado')
                                               <span style="font-size:16px" class="label label-success">{{$sol->estado}}</span>
                                                @endif   
                                                @if ($sol->estado == 'No Aprobado')
                                                  <span style="font-size:16px" class="label label-danger">{{$sol->estado}}</span>
                                                @endif  
                                                @if ($sol->estado == 'Cancelado')
                                                  <span style="font-size:16px" class="label label-danger">{{$sol->estado}}</span>
                                                @endif                                                  
                                        
                                <td>{{$sol->contenido}}</td>
                                <td style="font-size:24px">{{$sol->soporte}}</td>
                                <td style="font-size:24px">{{$sol->soporte_respuesta}}</td>                 
                                <td >
                                    @if ($sol->estado == 'Enviado')
                                        <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#cancelar">
                                                Cancelar
                                              </button>
                                              
                                              <!-- Modal -->
                                              <div class="modal fade" id="cancelar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                              </div><br><br>
                                    @endif
                                    @if ($sol->estado == 'Aprobado' or $sol->estado == 'No Aprobado')
                                        <button type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#reclamo">
                                                Reclamo
                                              </button>
                                              
                                              <!-- Modal -->
                                              <div class="modal fade" id="reclamo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                                    <textarea name="reclamo" rows="5" cols="60" placeholder="Escriba su reclamo"></textarea> 
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
                                              </div><br><br>
                                    @endif
                                
                                </td>
                            </tr>   
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection