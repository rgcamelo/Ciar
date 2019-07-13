<td>
    <div class="info-box 
    ">
      @if ($p->puntos_aprox == null)
      <div>
          <span class="info-box-icon
          @if($p->estado == 'Aprobado' or $p->estado =='Aprobado2')bg-green @endif
          @if ($p->estado == 'Enviado' or $p->estado == 'Enviado a Pares' or $p->estado == 'Reclamado' or $p->estado == 'Calificado por Pares')bg-yellow @endif
          @if ($p->estado == 'No Aprobado' or $p->estado == 'Rechazado2' or $p->estado == 'Cancelado')bg-red @endif
    
          ">
            <i class="
            @if($p->estado == 'Aprobado' or $p->estado =='Aprobado2')fa fa-check @endif
            @if ($p->estado == 'Enviado' or $p->estado == 'Enviado a Pares' or $p->estado == 'Reclamado' or $p->estado == 'Calificado por Pares')fa fa-envelope @endif
            @if ($p->estado == 'No Aprobado' or $p->estado == 'Rechazado2' or $p->estado == 'Cancelado')fa fa-close @endif
            "></i>
          </span>
          <div class="info-box-content">
              <span class="info-box-text"><strong>Titulo: </strong>{{$p->titulo}}</span>
              <span class="info-box-text"><strong>Tipo: </strong>Software</span>
              <span class="info-box-text"><strong>Bonificacion Calculada: </strong>{{$p->bonificacion_calculada}}</span>
              @if ($p->bonificacion_asignada != null)
              <span class="info-box-text"><strong>Bonificacion Asignada: </strong>{{$p->bonificacion_asignada}}</span>
              @endif
              <span class="info-box-text"><strong>Estado: </strong>
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
              @if ($p->estado == 'Cancelado')
                <span style="font-size:16px" class="label label-danger">{{$p->estado}}</span>
              @endif 
              @if ($p->estado == 'Reclamado')
                <span class="label label-warning">{{$p->estado}}</span>
              @endif 
            </span>
          </div>
        </div>
      @endif
      @if ($p->bonificacion_calculada == null)
      <div>
        <span class="info-box-icon 
        @if($p->estado == 'Aprobado' or $p->estado =='Aprobado2')bg-green @endif
        @if ($p->estado == 'Enviado' or $p->estado == 'Enviado a Pares' or $p->estado == 'Reclamado' or $p->estado == 'Calificado por Pares')bg-yellow @endif
        @if ($p->estado == 'No Aprobado' or $p->estado == 'Rechazado2' or $p->estado == 'Cancelado')bg-red @endif
    
        ">
          <i class="
          @if($p->estado == 'Aprobado' or $p->estado =='Aprobado2')fa fa-check @endif
          @if ($p->estado == 'Enviado' or $p->estado == 'Enviado a Pares' or $p->estado == 'Reclamado' or $p->estado == 'Calificado por Pares')fa fa-envelope @endif
          @if ($p->estado == 'No Aprobado' or $p->estado == 'Rechazado2' or $p->estado == 'Cancelado')fa fa-close @endif
          "></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text"><strong>Titulo: </strong>{{$p->titulo}}</span>
            <span class="info-box-text"><strong>Tipo: </strong>Software</span>
            <span class="info-box-text"><strong>Puntos Calculados: </strong>{{$p->puntos_aprox}}</span>
            @if ($p->puntos_asignados != null)
            <span class="info-box-text"><strong>Puntos Asignados: </strong>{{$p->puntos_asignados}}</span>
            @endif
            <span class="info-box-text"><strong>Estado: </strong>
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
            @if ($p->estado == 'Cancelado')
              <span style="font-size:16px" class="label label-danger">{{$p->estado}}</span>
            @endif 
            @if ($p->estado == 'Reclamado')
              <span class="label label-warning">{{$p->estado}}</span>
            @endif 
          </span>
                                    
        </div>
      </div>
      @endif

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
                                            <strong>Codigo fuente:</strong>
                                               
                                        </div>
                                        <div class="col-md-3">
                                           <!--<a class="btn btn-warning btn-sm" href="archivos/software/{{$p->codigo}}" style="width:50px"><i class="fa fa-download"></i></a>-->
                                           <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip}}/{{$p->codigo}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                           </div>
                                       </div> 
                                       <br>
                             <div class="row">
                             <div class="col-md-9">
                                 <strong>Instrucciones:</strong>
                                    
                             </div>
                             <div class="col-md-3">
                                <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip}}/{{$p->instrucciones}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                </div>
                            </div> 
                            <br>
                            <div class="row">
                                    <div class="col-md-9">
                                        <strong>Manual de Usuario:</strong>
                                           
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip}}/{{$p->manualusuario}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                       </div>
                                   </div>  
                            <br>
                                   <div class="row">
                             <div class="col-md-9">
                                 <strong>Ejecutable:</strong>
                                    
                             </div>
                             <div class="col-md-3">
                                <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip}}/{{$p->ejecutable}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>  
                            <br>
                            <div class="row">
                                    <div class="col-md-9">
                                        <strong>Certificado de software:</strong>
                                           
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip}}/{{$p->certificado_software}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                       </div>
                                   </div>  
                            <br>
                                   <div class="row">
                             <div class="col-md-9">
                                 <strong>CvLac:</strong>
                                    
                             </div>
                             <div class="col-md-3">
                                <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip}}/{{$p->CvLac}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                </div>
                            </div> 
                            <br>
                             <div class="row">
                             <div class="col-md-9">
                                 <strong>GrupLac:</strong>
                                    
                             </div>
                             <div class="col-md-3">
                                <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip}}/{{$p->GrupLac}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>  
                            <br>
                            <div class="row">
                                    <div class="col-md-9">
                                        <strong>Certificado de impacto:</strong>
                                           
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zip}}/{{$p->Certificado_impacto}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                       </div>
                                   </div>  
                        
                        
              </div>
              <div class="">

                          <form action="{{ url('descargarzip',[ 'ruta' => $p->idsoporte]) }}" method="post">
                            {!! csrf_field() !!}
                            <button type="submit" style="margin-top:4px;margin-bottom:4px" class="btn btn-success btn-block"><i class="fa fa-download"></i></button>
                          </form>
                 
                </div>
              </div>    
        </td>      
        <td>
            @if ($p->estado == 'Enviado')
            <button type="button" class="btn btn-warning btn-lg" title="Enviar a Pares" data-toggle="modal" data-target="#pares">
                <span class="fa fa-arrow-left"></span>
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
                                  <button type="submit" class="btn btn-success mr-5 ">Aceptar</button>
                          </form>
                          <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn btn-danger btn-lg" title="Rechazar" data-toggle="modal" data-target="#reprobar">
                      <span class="fa fa-close"></span>
                    </button>
                    
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
            @endif

            @if ($p->estado == 'Enviado a Pares')
            <button type="button" class="btn btn-warning btn-lg" title="Subir Calificacion de Pares"  data-toggle="modal" data-target="#pares">
                <span class="fa fa-graduation-cap"></span>
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="pares" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" style="display: flex;justify-content:center">
                                <form action="{{ url('calificarparessoft',['solicitud' => $p->idsolicitud, 'software' => $p->idsoftware]) }}" id="calipar" method="post">
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
                  </div>
            @endif
            <!-- Button trigger modal -->

            @if ($p->estado == 'Calificado por Pares')
                    <button class="btn btn-success btn-lg" type="button" title="Aprobar" data-toggle="modal" data-target="#calificar"><span class="fa fa-check"></span></button>
                    <button class="btn btn-danger btn-lg" type="button" title="No Aprobar" data-toggle="modal" data-target="#reprobar"><span class="fa fa-close"></span></button>

            
                  
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
            @endif
            <button class="btn btn-primary btn-lg"> <i class="fa fa-eye"></i></button>
        </td>