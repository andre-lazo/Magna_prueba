<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN MG</title>
    <link rel="shortcut icon" href="{{asset('img/magna.jpeg')}}" type="image/jpeg">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.js')}}" ></script>
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('fonts/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/fontawesome-free/css/all.css')}}">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <script src="{{asset('css/bootstrap.min.js')}}" ></script>
    <script src="{{asset('js/sweetalert.min.js')}}" ></script>
    <script src="{{asset('js/validaciones.js')}}" ></script>

   
 <style>
   .flotar{
     margin-left:50%;
   }
   @media screen and (max-width:800px){
    .flotar{
      margin-left: 0px;
    }
   }
   .content{
     margin-top: 120px;
   }
 </style>
 
</head>
<body>
  <div class="container-fluid ">
   <nav  class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top ">
     <a class="navbar-brand" href="{{route('user.index')}}"><img src="{{asset('img/magna.jpeg')}}" class="mr-2" style="height: 30px; width: 30px; border-radius: 50%;" alt="">MAGNA</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
   
     <div class="collapse navbar-collapse" id="navbarColor01">
       <ul class="navbar-nav mr-auto">
        
         <li class="nav-item active ml-3">
           <a class="nav-link" href="{{route('user.index')}}">Administracion de Usuarios</a>
         </li>
         <li class="nav-item active ml-3">
           <a class="nav-link" href="{{route('noticia.index')}}">Noticias</a>
         </li>
         <li class="nav-item active ml-3">
           <a class="nav-link" href="{{route('alicuota.index')}}">Alicuotas</a>
         </li>
         <li class="nav-item active ml-3">
          <a class="nav-link" href="{{route('sugerencia.index')}}">Sugerencias</a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="{{route('emprendedor.index')}}">Emprendimientos</a>
        </li>
         <li class="nav-item dropdown ml-3">
          <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reservas</a>
          <div class="dropdown-menu  bg-dark "> 
          <a class="dropdown-item" href="{{route('alberca.index')}}"><i class="fas fa-swimmer"></i>  Piscinas</a>
            <a class="dropdown-item  " href="{{route('evento.index')}}"><i class="fas fa-gift"></i> Salon de eventos</a>
            <a class="dropdown-item  " href="{{route('cancha1.index')}}"><i class="fas fa-futbol"></i> Canchas de  Cemento 1</a>
            <a class="dropdown-item  " href="{{route('cancha2.index')}}"><i class="fas fa-futbol"></i> Canchas de  Cemento 2</a>
            <a class="dropdown-item  " href="{{route('campo.index')}}"><i class="fas fa-futbol"></i> Canchas de Cesped</a>
          </div>
        </li>
       
         <li class="flotar nav-item dropdown  active">
           <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->email}}</a>
           <div class="dropdown-menu bg-dark"> 
             <a class=" ml-4 text-white" href="{{route('user.show',Crypt::encrypt(Auth::user()->id))}}"><i class="fas fa-user"> </i> Perfil</a>
             <form class="nav-link" method="POST" action="{{ route('logout') }}">
               @csrf
   
               <x-jet-responsive-nav-link class="text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                           this.closest('form').submit();">
                                           <i class="fas fa-sign-out-alt"></i>  {{ __('Cerrar Sesion') }}
               </x-jet-responsive-nav-link>
           </form>
           </div>
         </li>
       </ul>
      
     </div>
    
   </nav>
  </div>
  
     <section class="content mt-5">
     @yield('content')
     </section>
     
    
       <footer class="lead bg-dark text-white mt-5 p-5" width="100%" >
        
        <center>
        Correo electrónico: aso.magnavillaclub@gmail.com <br> 
        Teléfono administración Magna:‎ +593 4-275-3351. <br>
        Teléfono Garita Magna: +593 4-275-3361. <br>
        Celular Garita Magna: +593 99 989 6250.  
      </center>
      </footer>
      @include('sweet::alert')

      <script>
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      </script>
</body>
</html>