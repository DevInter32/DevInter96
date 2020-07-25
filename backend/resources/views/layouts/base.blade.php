<html lang="es">

<head>
<title>DevInter</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content=" ">
<!-- <link rel="stylesheet" href="{{ asset('css/Style.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cuerpo.css')}}">
<link rel="stylesheet" href="{{ asset('css/tablet.css')}}">
<link rel="stylesheet" href="{{ asset('css/icomoon.css')}}">
<link rel="stylesheet" href="{{ asset('css/alertify.css')}}"> -->
<link rel="shortcut icon" href="/favicon.ico" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<meta name="shareaholic:site_name" content="Devinter">
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <script src="{{ asset('js/app.js') }}" async defer></script>


@yield('extra_header')


<style>
    .icon{
          font-style: normal;
          font-weight: normal;
          speak: none;
         
          display: inline-block;
          text-decoration: inherit;
          width: 1em;
          margin-right: .2em;
          text-align: center;
          /* opacity: .8; */
         
          /* For safety - reset parent styles, that can break glyph codes*/
          font-variant: normal;
          text-transform: none;
         
          /* fix buttons height, for twitter bootstrap */
          line-height: 1em;
         
          /* Animation center compensation - margins should be symmetric */
          /* remove if not needed */
          margin-left: .2em;
         
          /* you can be more comfortable with increased icons size */
          /* font-size: 120%; */
         
          /* Font smoothing. That was taken from TWBS */
    }


footer{
background: linear-gradient(47deg, rgba(0,0,0,1) 0%, rgba(9,80,126,1) 100%);
}

.footer-top{
padding: 60px 0;
text-align: left;
color:
    #fff;
}
.footer-contact p{
  word-wrap: break-word;
}

.footer-bottom{
  padding: 15px 0 17px 0;

text-align: left;
color:
    #fff;
}



.footer-top a{
  text-decoration: none;
}

.footer-social{
  padding-top: 3px;
text-align: right;
}

.footer-social a{
  font-size: 30px;
  color:#fff;
  text-decoration: none;
  padding: 14px;
}



</style>

</head>

<body>

    <div id='app'>

    <!--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>-->
        <!--@auth-->
            <cabecera-auth-component user_name="{{Auth::user()->name}}"></cabecera-auth-component>
        <!--@else-->
           <!-- <cabecera-component></cabecera-component>-->
           <!--@yield('cabecera')
        @endauth
        @yield('contenido')-->

    </div>

        <footer class="mt-5 ">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 footer-about wow fadeInUp">
                            <!--<img class="logo-footer" src="assets/img/logo.png" alt="logo-footer" data-at2x="assets/img/logo.png">-->
                            <h3 class="logo">MiPaginaWeb</h3>
                            <p>
                                Nos encargamos de ofrecer el mejor servicio de hosting a todos nuestros clientes que nos contratan
                            </p>
                           
                        </div>
                        <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown">
                            <h3>Contacto</h3>
                            <p><i class="fas fa-map-marker-alt"></i> Florida Av Las Palmas</p>
                            <p><i class="fas fa-phone"></i> Telefono: +1 888-888-888</p>
                            <p><i class="fas fa-envelope"></i> Email: <a href="mailto:miemail@email.com">miemail@email.com</a></p>
                            <p><i class="fab fa-skype"></i> Skype: mi_skype</p>
                        </div>
                        <div class="col-md-4 footer-links wow fadeInUp">
                            <div class="row">
                                <div class="col">
                                    <h3 class="text-md-center">Links</h3>
                                </div>
                            </div>
                            <div class="row nav">
                                <div class="col-md-6 mx-auto text-md-center">
                                    <p><a class="scroll-link" href="#" data-id="inicio">Inicio</a></p>
                                    <p><a href="#" data-id="acerca_de">Acerca de</a></p>
                                    <p><a href="#" data-id="servicios">Servicios</a></p>


                                </div>
                                <div class="col-md-6 mx-auto text-md-center">

                                    <p><a href="#" data-id="contacto">Contacto</a></p>
                                    <p><a href="contenido.html">Contenido</a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            &copy;Copyright 2019 - maden by me
                        </div>
                        <div class="col-md-6 footer-social d-flex justify-content-center">
                          <div >
                            <a href="#"><i class="icon-facebook-f"></i></a> 
                            <a href="#"><i class="icon-twitter"></i></a> 
                            <a href="#"><i class="icon-google-plus"></i></a> 
                            <a href="#"><i class="icon-instagram"></i></a> 
                            <a href="#"><i class="icon-pinterest"></i></a>   
                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>

        @stack('scripts')

</body>
</html>