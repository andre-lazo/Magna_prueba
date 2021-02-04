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
<h1 class="text-center text-white " style="font-family: verdana">USUARIO: {{$alicuota->apellido}}</h1>
<div class="row mt-5 mb-5">
<div class="col-xs-12 col-lg-6" >
    <img class="ml-5 pl-5" src="{{asset('img/datos.png')}}" width="70%" height="100%" alt="">
</div>
<div class="col-xs-12 col-lg-6 pt-5 pr-5 ">
    <table class="table table-bordered table-striped table-hover bg-secondary ">
        <thead class="thead-dark">
          <tr>
            <th class="text-center" scope="col">Datos</th>
            <th class="text-center" scope="col">Informacion de Alicuota</th>
          
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">Nombre</td>
            <td class="text-center"> {{$alicuota->name}}</td>
          </tr>
          <tr>
            <td class="text-center">Apellido</td>
            <td class="text-center">{{$alicuota->apellido}}</td>
          </tr>
          <tr>
            <td class="text-center">Cedula</td>
            <td class="text-center">{{$alicuota->cedula}}</td>
          </tr>
          <tr>
            <td class="text-center">Residencia</td>
            <td class="text-center">{{$alicuota->residencia_id}}</td>
          </tr>
          <tr>
            <td class="text-center">Fecha inicio:</td>
            <td class="text-center"> {{$alicuota->fecha_inicio}}</td>
          </tr>
          <tr>
            <td class="text-center">Fecha fin:</td>
            <td class="text-center">{{$alicuota->fecha_final}}</td>
          </tr>
          <tr>
            <td class="text-center">Cuotas totales:</td>
            <td class="text-center">{{$alicuota->cuotas_totales}}</td>
          </tr>
          <tr>
            <td class="text-center">Valor total:</td>
            <td class="text-center">{{$alicuota->valor_total}}</td>
          </tr>
          <tr>
            <td class="text-center">Cuotas pagadas:</td>
            <td class="text-center">{{$alicuota->cuotas_pagadas}}</td>
          </tr>
          <tr>
            <td class="text-center">Valor pagado:</td>
            <td class="text-center">{{$alicuota->valor_pagado}}</td>
          </tr>
          <tr>
            <td class="text-center">Cuotas adeudadas: </td>
            <td class="text-center">{{$alicuota->cuotas_adeudadas}}</td>
          </tr>
          <tr>
            <td class="text-center">Valor Adeudado:</td>
            <td class="text-center">{{$alicuota->valor_adeudado}}</td>
          </tr>
          

        </tbody>
      </table>
      
     
</div>
</div>
    </div>
@endsection