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
        @stack('scripts')

</body>
</html>