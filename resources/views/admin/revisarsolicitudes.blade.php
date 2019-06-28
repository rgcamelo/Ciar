@extends('admin.dashboard')

@section('content')
    
    <div class="container">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": true,
                        "info":     true
                    } );
                } );</script>
            <table id="tabla" class='display table table-stripper'style="width:90%">
                    <thead>
                        <tr>

                            <th>Informacion</th>
                            <th>Archivos</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productividades as $p)
                        <tr>                           
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
                                                                <strong>Solicitante:</strong>                                           
                                                               {{$p->NombreCompleto}}
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-9">
                                                                        <strong>Tipo:</strong>                                           
                                                               {{$p->productividadable_type}}
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
                                                                <strong>Credito a la UPC:</strong>                                           
                                                               {{$p->creditoUpc}}
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-9">
                                                                <strong>Impacta en la Comunidad Universitaria:</strong>                                           
                                                               {{$p->impactanivelU}}
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-9">
                                                                <strong>Puntaje Aproximado:</strong>                                           
                                                               {{$p->puntos_aprox}}
                                                        </div>
                                                        </div>
                                    </div>                      
                                    </td>
                                    <td>
                                            <div class="box box-default box-solid collapsed-box" style="width:350px">
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
                                                                           
                                                                           {{$p->codigo}}
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                       <a class="btn btn-warning btn-sm" href="archivos/software/{{$p->codigo}}" style="width:50px"><i class="fa fa-download"></i></a>
                                                                       <a class="btn btn-primary btn-sm" href="#" onclick="window.open('archivos/software/{{$p->codigo}}')"  style="width:50px"><i class="fa fa-download"></i></a>
                                                                       </div>
                                                                   </div> 
                                                                   <br>
                                                         <div class="row">
                                                         <div class="col-md-9">
                                                             <strong>Instrucciones:</strong>
                                                                
                                                                {{$p->instrucciones}}
                                                         </div>
                                                         <div class="col-md-3">
                                                            <a class="btn btn-warning btn-sm" href="archivos/software/{{$p->instrucciones}}"style="width:50px"><i class="fa fa-download"></i></a>
                                                            </div>
                                                        </div> 
                                                        <br>
                                                        <div class="row">
                                                                <div class="col-md-9">
                                                                    <strong>Manual de Usuario:</strong>
                                                                       
                                                                    {{$p->manualusuario}}
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a class="btn btn-warning btn-sm" href="archivos/software/{{$p->manualusuario}}"style="width:50px"><i class="fa fa-download"></i></a>
                                                                   </div>
                                                               </div>  
                                                        <br>
                                                               <div class="row">
                                                         <div class="col-md-9">
                                                             <strong>Ejecutable:</strong>
                                                                
                                                             {{$p->ejecutable}}
                                                         </div>
                                                         <div class="col-md-3">
                                                            <a class="btn btn-warning btn-sm" href="archivos/software/{{$p->ejecutable}}"style="width:50px"><i class="fa fa-download"></i></a>
                                                            </div>
                                                        </div>  
                                                        <br>
                                                        <div class="row">
                                                                <div class="col-md-9">
                                                                    <strong>Certificado de software:</strong>
                                                                       
                                                                    {{$p->certificado_software}}
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a class="btn btn-warning btn-sm" href="archivos/software/{{$p->certificado_software}}"style="width:50px"><i class="fa fa-download"></i></a>
                                                                   </div>
                                                               </div>  
                                                        <br>
                                                               <div class="row">
                                                         <div class="col-md-9">
                                                             <strong>CvLac:</strong>
                                                                
                                                             {{$p->CvLac}}
                                                         </div>
                                                         <div class="col-md-3">
                                                            <a class="btn btn-warning btn-sm" href="archivos/software/{{$p->CvLac}}"style="width:50px"><i class="fa fa-download"></i></a>
                                                            </div>
                                                        </div> 
                                                        <br>
                                                         <div class="row">
                                                         <div class="col-md-9">
                                                             <strong>GrupLac:</strong>
                                                                
                                                             {{$p->GrupLac}}
                                                         </div>
                                                         <div class="col-md-3">
                                                            <a class="btn btn-warning btn-sm" href="archivos/software/{{$p->GrupLac}}"style="width:50px"><i class="fa fa-download"></i></a>
                                                            </div>
                                                        </div>  
                                                        <br>
                                                        <div class="row">
                                                                <div class="col-md-9">
                                                                    <strong>Certificado de impacto:</strong>
                                                                       
                                                                    {{$p->Certificado_impacto}} 
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a class="btn btn-warning btn-sm" href="archivos/software/{{$p->Certificado_impacto}}"style="width:50px"><i class="fa fa-download"></i></a><br><br>
                                                                   </div>
                                                               </div>  
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <!-- box-footer -->
                                                  </div>
                                                  <!-- /.box -->   
                                    </td>      
                                    <td>
                                        <!-- Button trigger modal -->
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
                                        <button style="width:150px" class="btn btn-success">Calificar</button> <br><br>
                                        <button style="width:150px" class="btn btn-primary">ver</button>
                                    </td> 
                            </tr>                              
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection