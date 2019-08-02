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
                                        
                                    </td>
                                    <td>
                                        
                                    </td>