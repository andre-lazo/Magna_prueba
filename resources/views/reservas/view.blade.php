@extends('navbar')
<style>
           body{
             background: url({{asset('img/entrada.jpeg')}}) no-repeat center center  fixed;
               font-family: 'Titillium Web', sans-serif;
               background-size: cover; 
              
    
    
           }
       
</style>
@section('content')
    <div class=" mx-auto pt-5 ">
<h1 class="text-center text-white " style="font-family: verdana">DATOS DE RESERVACION DEL USUARIO: {{$evento->name." ".$evento->apellido}}</h1>
<div class="row mt-5 mb-5">
<div class="col-xs-12 col-lg-6" >
    <img class="ml-5 pl-5" src="{{asset('img/datos.png')}}" width="70%" height="50%" alt="">
</div>
<div class="col-xs-12 col-lg-6 pt-5 pr-5 ">
    <table class="table table-bordered table-striped table-hover bg-secondary ">
        <thead class="thead-dark">
          <tr>
            <th class="text-center" scope="col">Datos</th>
            <th class="text-center" scope="col">Informacion de la Reservacion</th>
          
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">Nombre</td>
            <td class="text-center">{{$evento->name." ".$evento->apellido}}</td>
          </tr>
          <tr>
            <td class="text-center">Fecha</td>
            <td class="text-center">{{$evento->start}}</td>
          </tr>
          <tr>
            <td class="text-center">Hora</td>
            <td class="text-center">{{$evento->hora}}</td>
          </tr>
          <tr>
            <td class="text-center">Residencia</td>
            <td class="text-center">{{$evento->residencia_id}}</td>
          </tr>
        </tbody>
      </table>
      
     
</div>
</div>
<div class="container " style="max-width: 500px">
    <table class="table table-bordered table-striped table-hover bg-secondary ">
        <thead class="thead-dark">
          <tr>
            <th class="text-center" scope="col">Participantes</th>
            <th class="text-center" scope="col">Parentezco</th>
          
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">{{$evento->visi1}}</td>
            <td class="text-center">{{$evento->pare1}}</td>
          </tr>
           <tr>
            <td class="text-center">{{$evento->visi2}}</td>
            <td class="text-center">{{$evento->pare2}}</td>
          </tr>
 <tr>
            <td class="text-center">{{$evento->visi3}}</td>
            <td class="text-center">{{$evento->pare3}}</td>
          </tr>
 <tr>
            <td class="text-center">{{$evento->visi4}}</td>
            <td class="text-center">{{$evento->pare4}}</td>
          </tr>
 <tr>
            <td class="text-center">{{$evento->visi5}}</td>
            <td class="text-center">{{$evento->pare5}}</td>
          </tr>
 <tr>
            <td class="text-center">{{$evento->visi6}}</td>
            <td class="text-center">{{$evento->pare6}}</td>
          </tr>
 <tr>
            <td class="text-center">{{$evento->visi7}}</td>
            <td class="text-center">{{$evento->pare7}}</td>
          </tr>
          
        </tbody>
      </table>
      
         
</div>
    </div>
@endsection