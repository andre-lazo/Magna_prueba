@extends('navbar')
<style>
           body{
             background: url({{asset('img/entrada.jpeg')}}) no-repeat center center  fixed;
               font-family: 'Titillium Web', sans-serif;
               background-size: cover; 
              
    
    
           }
       
</style>
@section('content')
    <div class=" mx-auto pt-5 pb-5">
<h1 class="text-center text-white " style="font-family: verdana">DATOS DEL PERFIL DEL USUARIO: {{$user->name}}</h1>
<div class="row mt-5 mb-5">
<div class="col-xs-12 col-lg-6" >
    <img class="ml-5 pl-5" src="{{asset('img/datos.png')}}" width="70%" height="120%" alt="">
</div>
<div class="col-xs-12 col-lg-6 pt-5 pr-5 ">
    <table class="table table-bordered table-striped table-hover bg-secondary ">
        <thead class="thead-dark">
          <tr>
            <th class="text-center" scope="col">Datos</th>
            <th class="text-center" scope="col">Informacion de Usuario</th>
          
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">Nombre</td>
            <td class="text-center">{{$user->name}}</td>
          </tr>
          <tr>
            <td class="text-center">Apellido</td>
            <td class="text-center">{{$user->apellido}}</td>
          </tr>
          <tr>
            <td class="text-center">Cedula</td>
            <td class="text-center">{{$user->cedula}}</td>
          </tr>
          <tr>
            <td class="text-center">Residencia</td>
            <td class="text-center">{{$user->residencia_id}}</td>
          </tr>
          <tr>
            <td class="text-center">Correo</td>
            <td class="text-center">{{$user->email}}</td>
          </tr>
          
          <tr>
            <td class="text-center">Actualizacion de datos</td>
            <td class="text-center">{{$user->updated_at}}</td>
          </tr>
        </tbody>
      </table>
      
     
</div>
</div>
    </div>
@endsection