@extends('admin.dashboard')

@section('content')
<div class="container" >
    <div class="container">
        <button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#reclamo">
                Iniciar
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="reclamo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h3>Iniciar Convocatoria</h3>
                    </div>
                    
                    <div class="modal-body">
                            <form action="{{ url("/convocatoria") }}" method="post">
                                {!! csrf_field() !!}
                            <div class="form-row" style="display: flex;justify-content:center">
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Titulo</span>
                            <input id="titulo" type="text" class="form-control" required name="titulo" value="{{old('titulo')}}">                                   
                            </div>
                            </div>
                         
                            <div class="form-row" style="display: flex;justify-content:center">
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('fechainicio') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Fecha de Inicio</span>
                        <input id="fechainicio" type="date" class="form-control" required name="fechainicio" value="{{old('fechainicio')}}">                                   
                        </div>
                            </div>

                            <div class="form-row" style="display: flex;justify-content:center">
                                <div style="margin-bottom: 25px" class="input-group {{ $errors->has('fechafinal') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Fecha Final</span>
                        <input id="fechafinal" type="date" class="form-control" required name="fechafinal" value="{{old('fechafinal')}}">                                   
                        </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer" style="display: flex;justify-content:center">
                    
                              <button type="submit" class="btn btn-success mr-5 ">Aceptar</button>
                              <button type="button"  class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                      
                      
                    </div>
                </form>
                  </div>
                </div>
              </div><br><br>
        </div>
</div>
@endsection