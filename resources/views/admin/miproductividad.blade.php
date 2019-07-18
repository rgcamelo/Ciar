@extends('admin.dashboard')

@section('content')
    
    <div class="container">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true,
                        "language": {
                        "emptyTable": "<div><img style='width:200px;heigth:200px'  src='/admintle/img/mensaje7.png'></img></div>"
                        }
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
                                @case('App\Video')
                                <tr>
                                   @include('admin.misvideos')
                                </tr>
                            
                                @break
                                @case('App\Premios_Nacionales')
                                <tr>
                                   @include('admin.mispremios')
                                </tr>
                            
                                @break
                                @case('App\Patente')
                                <tr>
                                   @include('admin.mispatentes')
                                </tr>
                            
                                @break
                                @case('App\Traduccion')
                                <tr>
                                   @include('admin.mistraducciones')
                                </tr>
                            
                                @break
                                @case('App\Obra')
                                <tr>
                                   @include('admin.misobras')
                                </tr>
                            
                                @break
                                @case('App\ProduccionTecnica')
                                <tr>
                                   @include('admin.misproducciones')
                                </tr>
                            
                                @break
                                @case('App\EstudiosPostdoctorales')
                                <tr>
                                   @include('admin.miestudios')
                                </tr>
                            
                                @break
                                @case('App\PublicacionImpresa')
                                <tr>
                                   @include('admin.mispublicaciones')
                                </tr>
                            
                                @break
                                @case('App\ReseñasCriticas')
                                <tr>
                                   @include('admin.misreseñas')
                                </tr>
                            
                                @break
                                @case('App\DireccionTesis')
                                <tr>
                                   @include('admin.misdirecciones')
                                </tr>
                            
                                @break

                            @default
                                
                        @endswitch
                        
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection