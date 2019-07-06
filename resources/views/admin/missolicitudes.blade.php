@extends('admin.dashboard')

@section('content')
    
    <div class="container  col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-1">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true
                    } );
                } );</script>
            <table id="tabla" class='display table table-stripper'style="width:90%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>estado</th>
                            <th>Puntos Calculados</th>
                            <th>Puntos Asignados</th>
                            <th>Bonificacion Calculada</th>
                            <th>Bonificacion Asignada</th>
                            <th>Observaciones</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $sol)
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
                                                @if ($sol->estado == 'No Aprobado')
                                                  <span style="font-size:16px" class="label label-danger">{{$sol->estado}}</span>
                                                @endif                                                   
                                        
                                <td style="font-size:24px">{{$sol->puntos_aprox}}</td>
                                <td style="font-size:24px">{{$sol->puntos_asignados}}</td>
                                <td style="font-size:24px">{{$sol->bonificacion_calculada}}</td>
                                <td style="font-size:24px">{{$sol->bonificacion_asignada}}</td>
                                <td>{{$sol->observaciones}}</td>
                                <td ><button class="btn btn-danger btn-sm">x</button>
                                <button class="btn btn-warning btn-sm">R</button><br><br></td>
                            </tr>   
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection