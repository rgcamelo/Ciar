<td>
    <div class="">
        <div class="row">
                <div class="col-md-9">
                        <strong>Titulo:</strong>                                           
                       {{$p->titulo}}
                </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                            <strong>Tipo de Publicacion:</strong>                                           
                           {{$p->tipo_publicacion}}
                    </div>
                    </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Solicitante:</strong>                                           
                       {{$p->NombreCompleto}}
                </div>
                </div>
                <div class="row">
                        <div class="col-md-9">
                                <strong>Tipo:</strong>                                           
                        Articulo
                        </div>
                        </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Numero de Autores:</strong>                                           
                       {{$p->noautores_articulo}}
                </div>
                </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Nombre de la Revista en la que se publica:</strong>                                           
                       {{$p->nombrerevista}}
                </div>
                </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Tipo de Revista:</strong>                                           
                       {{$p->tiporevista}}
                </div>
                </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Evidencia Filiacion Upc:</strong>                                           
                       {{$p->evidenciafiliacionUpc}}
                </div>
                </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Puntaje Aproximado:</strong>                                           
                       {{$p->puntos_aprox}}
                </div>
                </div>
                <div class="row">
                        <div class="col-md-9">
                                <strong>Estado:</strong>                                           
                                @if ($p->estado == 'Enviado')
                                <span class="label label-warning">Recibido</span>
                              @endif
                              @if ($p->estado == 'Aprobado')
                        <span class="label label-success">{{$p->estado}}</span>
                              @endif   
                              @if ($p->estado == 'No Aprobado')
                                <span class="label label-danger">{{$p->estado}}</span>
                              @endif  
                        </div>
                        </div>
</div> 
</td>
<td >
    <div class="box box-default box-solid collapsed-box" >
        <div class="box-header with-border">
                <h3 class="box-title">Soportes</h3>
            <br>
          <div class="box-tools pull-right">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display:none">
                <div class="row">
                        <div class="col-md-9">
                            <strong>Ejemplar:</strong>
                        </div>
                        <div class="col-md-3">
                           <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_articulo}}/{{$p->ejemplar_articulo}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                           </div>
                       </div> 
                       <br>
             <div class="row">
             <div class="col-md-9">
                 <strong>Cvlac:</strong>
             </div>
             <div class="col-md-3">
                <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_articulo}}/{{$p->Cvlac_articulo}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                </div>
            </div> 
            <br>
            <div class="row">
                    <div class="col-md-9">
                        <strong>Gruplac:</strong>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_articulo}}/{{$p->Gruplac_articulo}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                       </div>
                   </div>  
            <br>
                   <div class="row">
             <div class="col-md-9">
                 <strong>Evidencia de la indexacion de la Revista:</strong>
             </div>
             <div class="col-md-3">
                <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_articulo}}/{{$p->Evidenciarevista}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                </div>
            </div>  
                                                    
        
</div>
<div class="">

          <form action="{{ url('descargarziparticulo',[ 'ruta' => $p->idsoportearticulo]) }}" method="post">
            {!! csrf_field() !!}
            <button type="submit" style="margin-top:4px;margin-bottom:4px" class="btn btn-success btn-block"><i class="fa fa-download"></i></button>
          </form>
 
</div>
</div>
</td>
<td>
        @if ($p->estado == 'Enviado')
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#calificar"><span class="fa fa-check"></span></button>
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#reprobar"><span class="fa fa-close"></span></button>
              </div>
        </div>
        
              
              <!-- Modal -->
              <div class="modal fade" id="calificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="display: flex;justify-content:center">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12" >
                              <form action="{{ url('calificar',['solicitud' => $p->idsolicitud]) }}" method="post" id="aprobar">
                                  {!! csrf_field() !!}
                                  <div class="form-row" style="display: flex;justify-content:center">
                                      <span style="font-size: 16px;margin:10px"  >Puntaje Asignado:</span> <input style="font-size: 32px" type="number" required max="{{$p->puntos_aprox}}" min="0"   name="puntos_asignados">
                                  </div>
                                  <br>
                                  <div class="form-row" style="display: flex;justify-content:center">
                                    <span style="font-size: 16px">Observaciones : </span>
                                    <textarea name="comentario" rows="5" cols="30" placeholder="Escriba un observacion"></textarea> 
                                  </div>
                                  <br>
                                  <div class="form-row" style="display: flex;justify-content:center" >
                                   <br>
                                          <input type="submit" class="btn btn-success " value="Aceptar">
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

              <div class="modal fade" id="reprobar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body" style="display: flex;justify-content:center">
                              <form action="{{ url('reprobar',['solicitud' => $p->idsolicitud]) }}" method="post" id="reprobar" name="reprobar">
                                  {!! csrf_field() !!}
                                  <div class="form-row" style="display: flex;justify-content:center">
                                      <span style="font-size: 16px">Observaciones : </span>
                                      <textarea name="comentario" rows="5" cols="30" placeholder="Escriba un observacion"></textarea>                                                                      </div>
                                  <br>
                                  <div class="form-row" style="display: flex;justify-content:center" >
                                   <br>
                                          <input type="submit" class="btn btn-success " value="Aceptar">
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
    <button class="btn btn-primary">ver</button>
</td>