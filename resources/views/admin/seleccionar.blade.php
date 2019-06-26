@extends('admin.layout')

@section('content')
<div class="container" >
        <div class="container">    
                <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
                    <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Seleccionar</div>
                                <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                            </div>     
                            
                            <div style="padding-top:30px" class="panel-body" >
                                <div class="list-group">
                                    {{ $docente->NombreCompleto}}
                                    <a href="/Docente/{{$docente->id}}/seleccionarproductividad/software" class="list-group-item list-group-item-action">Software</a>
                                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                                  </div>
                                </div>                     
                            </div>  
                </div>
            </div>
</div>
@endsection