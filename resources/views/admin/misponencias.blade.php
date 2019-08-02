<td>{{$p->titulo}}</td>
                                    <td>
                                        @if ($p->estado == 'Enviado')
                                            <span style="font-size:16px" class="label label-warning">{{$p->estado}}</span>
                                            @endif
                                            @if ($p->estado == 'Enviado a Pares')
                                              <span style="font-size:16px" class="label label-warning">{{$p->estado}}</span>
                                           
                                            @endif
                                            @if ($p->estado == 'Calificado por Pares')
                                              <span style="font-size:16px" class="label label-warning">{{$p->estado}}</span>
                                           
                                            @endif 
                                            @if ($p->estado == 'Aprobado' or $p->estado == 'Aprobado2')
                                           <span style="font-size:16px" class="label label-success">Aprobado</span>
                                            @endif   
                                            @if ($p->estado == 'No Aprobado')
                                              <span style="font-size:16px" class="label label-danger">{{$p->estado}}</span>
                                            @endif
                                            @if ($p->estado == 'Cancelado')
                                                  <span style="font-size:16px" class="label label-danger">{{$p->estado}}</span>
                                                @endif     
                                            @if ($p->estado == 'Reclamado')
                                                  <span style="font-size:16px" class="label label-warning">{{$p->estado}}</span>
                                                @endif  
                                            @if ($p->estado == 'Incompleta')
                                                <span style="font-size:16px" class="label label-primary">Guardada</span>
                                            @endif   
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
                                                                <strong>Memoria del Evento:</strong>
                                                            </div>
                                                            <div class="col-md-3">
                                                              @if ( isset($p->memoriaevento))
                                                              <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zipponencia}}/{{$p->memoriaevento}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                                              @endif
                                                               </div>
                                                           </div> 
                                                           <br>
                                                 <div class="row">
                                                 <div class="col-md-9">
                                                     <strong>Cvlac:</strong>
                                                 </div>
                                                 <div class="col-md-3">
                                                    @if ( isset($p->Cvlacponencia))
                                                    <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zipponencia}}/{{$p->Cvlacponencia}}')"  style="width:50px"><i class="fa fa-eye"></i></a> 
                                                    @endif
                                                    </div>
                                                </div> 
                                                <br>
                                                <div class="row">
                                                        <div class="col-md-9">
                                                            <strong>Gruplac:</strong>
                                                        </div>
                                                        <div class="col-md-3">
                                                          @if ( isset($p->Gruplacponencia))
                                                          <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zipponencia}}/{{$p->Gruplacponencia}}')"  style="width:50px"><i class="fa fa-eye"></i></a>
                                                          @endif
                                                           </div>
                                                       </div>  
                                                <br>
                                                       <div class="row">
                                                 <div class="col-md-9">
                                                     <strong>Evidencia de la indexacion de la Revista:</strong>
                                                 </div>
                                                 <div class="col-md-3">
                                                   @if ( isset($p->certificadoponente))
                                                   <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$p->Zipponencia}}/{{$p->certificadoponente}}')"  style="width:50px"><i class="fa fa-eye"></i></a> 
                                                   @endif
                                                    </div>
                                                </div>  
                                                                                        
                                            
                                  </div>
                                  <div class="">
        
                                              <form action="{{ url('descargarzipponencia',[ 'ruta' => $p->idponenciasoporte]) }}" method="post">
                                                {!! csrf_field() !!}
                                                @if ( ( isset($p->certificadoponente)) ||  ( isset($p->Gruplacponencia)) ||  ( isset($p->Cvlacponencia)) || ( isset($p->memoriaevento))  )
                                                <button type="submit" style="margin-top:4px;margin-bottom:4px" class="btn btn-success btn-block"><i class="fa fa-download"></i></button>
                                                @endif
                                                
                                              </form>
                                     
                                    </div>
                                    </div>
                                    </td>
                                    <td>
                                        
                                    </td>