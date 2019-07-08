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
                                    @if ($p->estado == 'Aprobado')
                                   <span style="font-size:16px" class="label label-success">{{$p->estado}}</span>
                                    @endif   
                                    @if ($p->estado == 'No Aprobado')
                                      <span style="font-size:16px" class="label label-danger">{{$p->estado}}</span>
                                    @endif
                                    @if ($p->estado == 'Cancelado')
                                    <span style="font-size:16px" class="label label-danger">{{$p->estado}}</span>
                                  @endif     
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

                                      <form action="{{ url('descargarzip',[ 'ruta' => $p->id_soportelibro]) }}" method="post">
                                        {!! csrf_field() !!}
                                        <button type="submit" style="margin-top:4px;margin-bottom:4px" class="btn btn-success btn-block"><i class="fa fa-download"></i></button>
                                      </form>
                             
                            </div>
                            </div>
                            </td>
                            <td>
                                    <button class="btn btn-primary">Modificar</button>
                                </td>