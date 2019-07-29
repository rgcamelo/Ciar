@extends('admin.dashboard')

@section('content')
    
    <div class="section">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true,
                        "language": {
                        "emptyTable": "<div><img style='width:200px;heigth:200px'  src='/admintle/img/mensaje2.png'></img></div>"
                        }
                    } );
                } );</script>
            <table id="tabla" class='display'style="width:100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>Respuesta</th>
                            <th>Soporte</th>
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
                                                @if ($sol->estado == 'No Aprobado' or $sol->estado =='Rechazado')
                                                  <span style="font-size:16px" class="label label-danger">{{$sol->estado}}</span>
                                                @endif  
                                                @if ($sol->estado == 'Cancelado')
                                                  <span style="font-size:16px" class="label label-danger">{{$sol->estado}}</span>
                                                @endif                                                  
                                        
                                <td>{{$sol->respuesta}}
                                </td>
                                <td style="font-size:24px">
                                  @if ($sol->soporte_respuesta != null)
                                  <a class="btn btn-primary btn-sm" href="#" onclick="window.open('{{$sol->ruta}}/{{$sol->soporte_respuesta}}')" ><i class="fa fa-eye"></i></a>

                                  @endif

                                </td>                 
                                
                            </tr>   
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection