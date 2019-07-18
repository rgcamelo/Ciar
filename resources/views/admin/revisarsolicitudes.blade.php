@extends('admin.dashboard')

@section('content')
    
    <div class="section">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true,
                        "language": {
                        "emptyTable": "<div><img style='width:200px;heigth:200px'  src='/admintle/img/mensaje4.png'></img></div>"
                        }
                    } );
                    $('#tabla2').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true,
                        "language": {
                        "emptyTable": "<div><img style='width:200px;heigth:200px'  src='/admintle/img/mensaje5.png'></img></div>"
                        }
                    } );
                    $('#tabla3').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true,
                        "language": {
                        "emptyTable": "<div><img style='width:200px;heigth:200px'  src='/admintle/img/mensaje6.png'></img></div>"
                        }
                    } );
                } );
                </script>
            
    </div>
    
    <div class="nav-tabs-custom">
         <ul class="nav nav-tabs">
           <li class="active"><a href="#Solicitudes" data-toggle="tab">Solicitudes</a></li>
           <li><a href="#Aprobadas" data-toggle="tab">Aprobadas</a></li>
           <li><a href="#Rechazadas" data-toggle="tab">Rechazadas</a></li>
         </ul>
         <div class="tab-content">
           <div class="active tab-pane" id="Solicitudes">
               <table id="tabla" class='display table table-stripper'style="width:90%">
                     <thead>
                         <tr>
                             <th>Informacion</th>
                             <th width="300px" >Archivos</th>
                             <th>Opciones</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($productividades as $p)
                         @if ($p->estado != 'Aprobado' and $p->estado != 'No Aprobado' )
                           @include('admin.switchtipos')
                         @endif
                         
                         @endforeach
                                                 
                     </tbody>
                 </table>
           </div>
           <!-- /.tab-pane -->
           <div class="tab-pane" id="Aprobadas">
               <table id="tabla2" class='display table table-stripper'style="width:90%">
                     <thead>
                         <tr>
                             <th>Informacion</th>
                             <th width="300px" >Archivos</th>
                             <th>Opciones</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($productividades as $p)
                         @if ($p->estado == 'Aprobado')
                         @include('admin.switchtipos')
                         @endif
                         
                         @endforeach
                                                 
                     </tbody>
                 </table>
           </div>
           <!-- /.tab-pane -->

           <div class="tab-pane" id="Rechazadas">
               <table id="tabla3" class='display table table-stripper'style="width:90%">
                     <thead>
                         <tr>
                             <th>Informacion</th>
                             <th width="300px" >Archivos</th>
                             <th>Opciones</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($productividades as $p)
                         @if ($p->estado == 'No Aprobado')
                         @include('admin.switchtipos')
                         @endif
                         
                         @endforeach
                                                 
                     </tbody>
                 </table>
           </div>
           <!-- /.tab-pane -->
         </div>
         <!-- /.tab-content -->
       </div>
@endsection