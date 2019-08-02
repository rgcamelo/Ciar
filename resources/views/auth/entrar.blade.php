@extends('auth.layout')

@section('content')
   <div class="row">
       <div class="col-md-4 col-md-offset-4">
           <div class="panel panel-success">
               <div class="panel-heading">
                 <div style="display: flex;justify-content:center">
                    <img style="width:240px;height:120px" src="/admintle/img/logo.png" alt="">
                 </div>
                    
               </div>
               <div class="panel-body">
               <form method="POST" action="{{route('login')}}">
                {{ method_field('PUT') }}  
                {{ csrf_field() }}
               <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                           <label for="email">Correo</label>
               <input value="{{ old('email')}}" class="form-control" type="email" name="email" placeholder="Ingresar tu correo">
                         {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                       </div>
                       <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <label for="password">Contraseña</label>
                            <input class="form-control" type="password" name="password" placeholder="Contraseña">
                           {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                        <button class="btn btn-success btn-block">Acceder</button>
                   </form>
               </div>
           </div>
       </div>
       </div> 
@endsection