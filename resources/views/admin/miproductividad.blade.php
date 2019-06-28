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
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>codigoFuente</th>
                            <th>Soportes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productividades as $p)
                        <tr>
                                <td>{{$p->titulo}}</td>
                                <td>{{$p->estado}}</td>
                                <td><div class="row">
                                        <div class="col-md-9">                                               
                                               {{$p->codigo}}
                                        </div>
                                        <div class="col-md-3">
                                               <button class="btn btn-warning btn-sm">+</button><br><br>
                                        <a href="archivos/software/{{$p->codigo}}">f</a>
                                        <a href="#" onclick="window.open('archivos/software/{{$p->codigo}}')">Abrir archivo pdf</a>
                                           </div>
                                       </div>  
                                    </td>
                                <td> <div class="row">
                                     <div class="col-md-9">
                                         <strong>Instrucciones:</strong>
                                            
                                            {{$p->instrucciones}}
                                     </div>
                                     <div class="col-md-3">
                                            <button class="btn btn-warning btn-sm">v</button>
                                            <button class="btn btn-success btn-sm">v</button><br><br>
                                        </div>
                                    </div> 
                                    <div class="row">
                                            <div class="col-md-9">
                                                <strong>Manual de Usuario:</strong>
                                                   
                                                {{$p->manualusuario}}
                                            </div>
                                            <div class="col-md-3">
                                                   <button class="btn btn-warning btn-sm">v</button>
                                                   <button class="btn btn-success btn-sm">v</button><br><br>
                                               </div>
                                           </div>  
                                           <div class="row">
                                     <div class="col-md-9">
                                         <strong>Ejecutable:</strong>
                                            
                                         {{$p->ejecutable}}
                                     </div>
                                     <div class="col-md-3">
                                            <button class="btn btn-warning btn-sm">v</button>
                                            <button class="btn btn-success btn-sm">v</button><br><br>
                                        </div>
                                    </div>  
                                    <div class="row">
                                            <div class="col-md-9">
                                                <strong>Certificado de software:</strong>
                                                   
                                                {{$p->certificado_software}}
                                            </div>
                                            <div class="col-md-3">
                                                   <button class="btn btn-warning btn-sm">v</button>
                                                   <button class="btn btn-success btn-sm">v</button><br><br>
                                               </div>
                                           </div>  
                                           <div class="row">
                                     <div class="col-md-9">
                                         <strong>CvLac:</strong>
                                            
                                         {{$p->CvLac}}
                                     </div>
                                     <div class="col-md-3">
                                            <button class="btn btn-warning btn-sm">v</button>
                                            <button class="btn btn-success btn-sm">v</button><br><br>
                                        </div>
                                    </div>  <div class="row">
                                     <div class="col-md-9">
                                         <strong>GrupLac:</strong>
                                            
                                         {{$p->GrupLac}}
                                     </div>
                                     <div class="col-md-3">
                                            <button class="btn btn-warning btn-sm">v</button>
                                            <button class="btn btn-success btn-sm">v</button><br><br>
                                        </div>
                                    </div>  
                                    <div class="row">
                                            <div class="col-md-9">
                                                <strong>Certificado de impacto:</strong>
                                                   
                                                {{$p->Certificado_impacto}} 
                                            </div>
                                            <div class="col-md-3">
                                                   <button class="btn btn-warning btn-sm">v</button>
                                                   <button class="btn btn-success btn-sm">v</button><br><br>
                                               </div>
                                           </div>  
                            </tr>   
                        @endforeach
                                                
                    </tbody>
                </table>
    </div>
@endsection