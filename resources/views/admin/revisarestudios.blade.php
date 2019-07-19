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
          @if ($p->estado == 'Enviado')fa fa-envelope @endif
          @if ($p->estado == 'Enviado a Pares' )fa fa-arrow-left @endif
          @if ($p->estado == 'Reclamado' )fa fa-commenting @endif
          @if ($p->estado == 'Calificado por Pares' )fa fa-graduation-cap @endif
          @if ($p->estado == 'No Aprobado' or $p->estado == 'Rechazado2' or $p->estado == 'Cancelado')fa fa-close @endif
          @if ($p->estado == 'Cancelado')fa fa-minus @endif
            "></i>
          </span>
          <div class="info-box-content">
              <span class="info-box-text"><strong>Titulo: </strong>{{$p->titulo}}</span>
              <span class="info-box-text"><strong>Tipo: </strong>Estudio Posdoctoral</span>
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
                <span class="label label-danger">{{$p->estado}}</span>
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
            <span class="info-box-text"><strong>Tipo: </strong>Ponencia</span>
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
              <span class="label label-danger">{{$p->estado}}</span>
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
            
    </td>
    <td>

            @if ($p->estado == 'Enviado')

                    <button class="btn btn-success btn-lg" title="Aceptar" type="button" data-toggle="modal" data-target="#calificar{{$p->idsolicitud}}"><span class="fa fa-check"></span></button>
                    <button class="btn btn-danger btn-lg" title="Rechazar" type="button" data-toggle="modal" data-target="#reprobar{{$p->idsolicitud}}"><span class="fa fa-close"></span></button>
            
                  
                  <!-- Modal -->
                  <div class="modal fade" id="calificar{{$p->idsolicitud}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" style="display: flex;justify-content:center">
                          <div class="container">
                            <div class="row">
                              <div class="col-md-12" >
                                  <form action="{{ url('calificarbonificacion',['solicitud' => $p->idsolicitud]) }}" method="post" id="aprobar">
                                      {!! csrf_field() !!}
                                      <div class="form-row" style="display: flex;justify-content:center">
                                          <span style="font-size: 16px;margin:10px"  >Puntaje Asignado:</span> <input value="{{$p->bonificacion_calculada}}" step="0.001" name="bonificacion" style="font-size: 32px" type="number" required max="{{$p->bonificacion_calculada}}" min="0"  >
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
    
                  <div class="modal fade" id="reprobar{{$p->idsolicitud}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
            <!--<button class="btn btn-primary btn-lg"><span class="fa fa-eye"></span></button>-->
        </td>