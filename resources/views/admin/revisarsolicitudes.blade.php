@extends('admin.dashboard')

@section('content')
    
    <div class="container">
            <script>$(document).ready(function() {
                    $('#tabla').DataTable( {
                        "paging":   true,
                        "ordering": false,
                        "info":     true
                    } );
                } );
                </script>
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
                        @switch($p->productividadable_type)
                            @case('App\Libro')
                            <tr>
                            @include('admin.revisarlibro')
                        </tr>
                            @break
                            @case('App\Articulo')
                            <tr>
                                @include('admin.revisararticulo')
                                </tr>                            
                                @break
                                @case('App\Software')
                              <tr>                           
                                 @include('admin.revisarsoftware')
                                </tr>                              
                
                                @break
                                @case('App\Ponencia')
                                 <tr>                           
                                 @include('admin.revisarponencia')
                                </tr>                              
                
                                @break
                                @case('App\Video')
                                <tr>
                                   @include('admin.revisarvideos')
                                </tr>
                            
                                @break
                                @case('App\Premios_Nacionales')
                                <tr>
                                   @include('admin.revisarpremios')
                                </tr>
                            
                                @break
                                @case('App\Patente')
                                <tr>
                                   @include('admin.revisarpatentes')
                                </tr>
                            
                                @break
                                @case('App\Traduccion')
                                <tr>
                                   @include('admin.revisartraducciones')
                                </tr>
                            
                                @break
                                @case('App\Obra')
                                <tr>
                                   @include('admin.revisarobras')
                                </tr>
                            
                                @break
                                @case('App\ProduccionTecnica')
                                <tr>
                                   @include('admin.revisarproducciones')
                                </tr>
                            
                                @break
                                @case('App\EstudiosPostdoctorales')
                                <tr>
                                   @include('admin.revisarestudios')
                                </tr>
                            
                                @break
                                @case('App\PublicacionImpresa')
                                <tr>
                                   @include('admin.revisarpublicaciones')
                                </tr>
                            
                                @break
                                @case('App\ReseñasCriticas')
                                <tr>
                                   @include('admin.revisarreseñas')
                                </tr>
                            
                                @break
                                @case('App\DireccionTesis')
                                <tr>
                                   @include('admin.revisardirecciones')
                                </tr>
                            
                                @break
                            @default
                        
                        @endswitch
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection