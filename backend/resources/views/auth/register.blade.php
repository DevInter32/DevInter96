@extends('layouts.base')
@section('cabecera')

    <header>
         <a href="{{route('index.home')}}" ><h1>Dev<b>Inter</b></h1></a>

         <input type='checkbox' id='menu-bar'>

         <label class='icon-menu' for='menu-bar'></label>

         <nav class='menu_dev'> 

             <a href="{{route('index.blog')}}" class='item medio'>Blog</a>

             <a href="{{route('index.contacto')}}" class='item medio' >Contacto</a>
             <a href="{{route('index.login')}}" class='item medio' >Iniciar Sesión</a>
             <a href="#" class="item medio">Registrarse</a>
         </nav>
    </header>
@endsection
@section('contenido')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" name="registration">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" >{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repita contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        
                    <!--texto de error-->




                        <div class="alert alert-danger mensaje_error d-none">
                            <p class="text-center"></p>
                        </div>




                    <!--fin de texto de error-->



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('js/jquery.min.js')}}" ></script>
    <script src="{{asset('js/jquery.validate.js')}}" defer></script>

    <script>
        $(function(){
            $("form[name='registration']").validate({
                rules:{
                    name:"required",
                    email:"required",
                    password:{
                        required:true,
                        minlength:8
                    }
                },
                messages:{
                    name:'Por favor escriba su nombre en el registro',
                    email:"Por favor escriba su email en el registro",
                    password:{
                        required:true,
                        minlength:"Su contraseña debe tener al menos 8 caracteres"
                    }
                },
                submitHandler:function(form){



                    if($("#password").val() == $("#password-confirm").val()){
                         form.submit();
                    }else{  
                        console.log($(".mensaje_error p"));

                            $(".mensaje_error p")[0].innerHTML="las contraseñas no son iguales";
                            $(".mensaje_error").removeClass('d-none');

                        setTimeout(()=>{
                            $(".mensaje_error").addClass('d-none');
                        },2000)
                    }
                   
                }
            })
        })
    </script>

@endpush
