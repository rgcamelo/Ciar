@extends('admin.dashboard')

@section('content')
    
    <div class="container  col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-1">
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
                            <th>Titulo</th>
                            <th>estado</th>
                            <th>puntos_aproximados</th>
                            <th>puntos_asignados</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $sol)
                        <tr>
                                <td>{{$sol->titulo}}</td>
                                <td>{{$sol->estado}}</td>
                                <td>{{$sol->puntos_aprox}}</td>
                                <td>{{$sol->puntos_asignados}}</td>
                                <td><button class="btn btn-danger btn-sm">x</button>
                                <button class="btn btn-warning btn-sm">R</button><br><br></td>
                            </tr>   
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection