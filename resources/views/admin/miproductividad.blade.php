@extends('admin.dashboard')

@section('content')
    
    <div class="container">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true,
                    } );
                } );</script>
            <table id="tabla" class='display table table-stripper'style="width:90%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th style="width:500px">Soportes</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productividades as $p)
                        @switch($p->productividadable_type)
                            @case('App\Libro')
                            <tr>
                            @include('admin.mislibros')
                            </tr>
                            @break
                            @case('App\Articulo')
                                <tr>
                                @include('admin.misarticulos')
                                </tr>
                                @break
                                @case('App\Software')
                                <tr>
                                   @include('admin.missoftware')
                                </tr>
                            
                                @break
                                @case('App\Ponencia')
                                <tr>
                                   @include('admin.misponencias')
                                </tr>
                            
                                @break
                            @default
                                
                        @endswitch
                        
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection