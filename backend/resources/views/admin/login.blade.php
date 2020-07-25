@extends('layouts.admin')

@section('extra_header')
<link rel="stylesheet" href="{{ asset('css/Style.css')}}" />
@endsection

@section('contenido')
  <nav class="navbar navbar-expand-lg navbar-light bg-primary d-flex justify-content-center">
    <a href="#" class="navbar-brand text-white text-center">DevInter-Admin</a>


  </nav>


<div class="row justify-content-center mt-5">
  <div class="col-md-8 col-lg-6">
    <div class="card">
      <div class="card-body">
          @if(session('message'))
            <div class="alert alert-{{session('message')[0]}}">
              <h4 class="alert-heading">{{__("Mensaje Informativo")}}</h4>
              <p>{{session('message')[1]}}</p>
            </div>

          @endif

          <form method="POST" action="{{route('admin.post-login')}}">
              @csrf

              <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">Nombre de admin</label>

                  <div class="col-md-6">
                      <input id="usuario" type="text" class="form-control" name="usuario"  >


                  </div>
              </div>

              <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right" >Contraseña</label>

                  <div class="col-md-6">
                      <input id="password" type="password" class="form-control " name="password" v-model="clave" required autocomplete="current-password">

                  </div>
              </div>



              <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                         Iniciar Sesion
                      </button>

                      
                          <a class="btn btn-link" href="#">
                              Olvidaste tu contraseña?
                          </a>
                      
                  </div>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>




@endsection