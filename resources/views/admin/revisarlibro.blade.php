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
                            <strong>Tipo de Productividad:</strong>                                           
                           Libro
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
                                <strong>Tipo de libro:</strong>                                           
                                {{$p->tipo_libro}}
                        </div>
                        </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Numero de Autores:</strong>                                           
                       {{$p->noautores}}
                </div>
                </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Nombre de la Editorial:</strong>                                           
                       {{$p->editorial}}
                </div>
                </div>
                <div class="row">
                <div class="col-md-9">
                        <strong>Evidencia Credito a la Upc:</strong>                                           
                       {{$p->creditoUpc_libro}}
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
                                @if ($p->estado == 'Enviado a Pares')
                                  <span class="label label-warning">Enviado a Pares</span>
                               
                                @endif
                                @if ($p->estado == 'Calificado por Pares')
                                  <span class="label label-warning">{{$p->estado}}</span>
                               
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
<td>
    <div class="box box-default box-solid collapsed-box">
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
                           <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_libro}}/{{$p->ejemplar}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                           </div>
                       </div> 
                       <br>
             <div class="row">
             <div class="col-md-9">
                 <strong>CvLac:</strong>
             </div>
             <div class="col-md-3">
                <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_libro}}/{{$p->Cvlac_libro}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                </div>
            </div> 
            <br>
            <div class="row">
                    <div class="col-md-9">
                        <strong>GrupLac:</strong>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_libro}}/{{$p->Gruplac_libro}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                       </div>
                   </div>  
            <br>
                   <div class="row">
             <div class="col-md-9">
                 <strong>Certificado de la Editorial:</strong>
             </div>
             <div class="col-md-3">
                <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_libro}}/{{$p->Certificadoeditorial}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                </div>
            </div>  
            <br>
            <div class="row">
                    <div class="col-md-9">
                        <strong>Certificado de libro de investigacion:</strong>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip_libro}}/{{$p->Certificadolibrodeinvestigacion}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                       </div>
                   </div>                                  
        
</div>
<div class="">

          <form action="{{ url('descargarziplibro',[ 'ruta' => $p->id_soportelibro]) }}" method="post">
            {!! csrf_field() !!}
            <button type="submit" style="margin-top:4px;margin-bottom:4px" class="btn btn-success btn-block"><i class="fa fa-download"></i></button>
          </form>
 
</div>
</div>
</td>
<td>
        @if ($p->estado == 'Enviado')
        <button type="button" class="btn btn-warning" style="width:150px" data-toggle="modal" data-target="#pares">
                Enviar a Pares
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="pares" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h2 class="text-center">¿Esta seguro de enviar la productividad a revision de pares?</h2>
                      
                    </div>
                    <div class="modal-footer" style="display: flex;justify-content:center">
                    <form action="{{ url("enviarpares/{$p->idsolicitud}") }}" method="post">
                              {!! csrf_field() !!}
                              <button type="submit" class="btn btn-success ">Aceptar</button>
                      </form>
                      <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div><br><br>
        @endif

        @if ($p->estado == 'Enviado a Pares')
        <button type="button" class="btn btn-warning" style="width:150px" data-toggle="modal" data-target="#pares">
                Subir Evaluacion Pares
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="pares" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="display: flex;justify-content:center">
                            <form action="{{ url('calificarpareslibro',['solicitud' => $p->idsolicitud, 'libro' => $p->idlibro]) }}" id="calipar" method="post">
                                {!! csrf_field() !!}
                                <label style="font-size: 32px" for="">Puntaje Par: </label><input style="font-size: 16px" type="number" required max="{{$p->puntos_aprox}}" min="0"   name="resultadoPares">
                                
                                <div class="" style="display: flex;justify-content:center">
                                        <input type="submit" class="btn btn-success " value="Aceptar">
                                        <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                                    </div>
                                
                        </form>
                        
                    </div>
                    <div class="modal-footer" style="display: flex;justify-content:center">
                    
                    </div>
                  </div>
                </div>
              </div><br><br>
        @endif
        <!-- Button trigger modal -->

        @if ($p->estado == 'Calificado por Pares')
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
        <button class="btn btn-primary">Modificar</button>
    </td>