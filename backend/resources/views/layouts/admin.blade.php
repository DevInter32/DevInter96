  <!DOCTYPE html>
  <html lang="es">

  <head>
    <title>Devinter-admin</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- librerias con CDN
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css"/>
    <script type="text/javascript" src="login/functions.js"></script>-->
  <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
  
  <!-- <link rel="stylesheet" href="{{ asset('css/alertify.css')}}">-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  @yield('extra_header')

  </head>

<body>
  
    <!--<nav class="navbar navbar-expand-lg navbar-dark  bg-light ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand " href="index.html" style="color: blue;">DevInter-Admin</a>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item color-primary " type="button">Action</a>
            <a class="dropdown-item color-primary " type="button">Another action</a>
            <a class="dropdown-item color-primary " type="button">Something else here</a>
          </div>
        </div>
        
    </div>
   
     
  </nav>-->



    <div id="app">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

        @yield('contenido')

    </div>
  


</body>


