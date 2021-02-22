@extends('navbar_user')
<style>
    body{
      font-family:'Titillium Web', sans-serif;
      font-weight: bold;
      
    }
    #dato:hover{
      background-color:gray;
      color: white;
      font-size: 17px;
    }
    #r:hover{
      background-color: orange;
      color: white;
      font-size: 17px;
    }
    #datos{
      display: flex;
      display-direction: row;
      width:100%;
    }
    #datos2{
      width:200%;
    }
    #datos3{
      width:200%;
    }
    @media(max-width: 600px){
      #img{
        width: 100%;
        height: 200px;
        margin-bottom: 10px;
        border-bottom: 0;
      }
      #conte{
        display:flex;
        flex-direction:column;
      }
      #datos{
      display: flex;
      display-direction: row;
      width:100%
      
    }
    #datos2{
      width:50%;
    }
    #datos3{
      width:50%;
    }
    }
  </style>
@section('content') 
   @foreach ($alicuotas as $alicuota)
   <section class="mt-5 ">
    <div class="ml-4 pt-5 " >
      <h1 >Reporte de alicuotas del Usuario: {{$alicuota->name}} {{$alicuota->apellido}}</h1>
      <label class="text-center card h1  p-1" style="border-color: orange;" >ULTIMA ACTUALIZACION - -> {{$alicuota->updated_at}} </label>
    </div>
  <div id="conte" class="row">
    <div class="col-xs-12 col-lg-6 mt-5">
      
      <img id="img" src="img/businessman-3213659_1920.jpg" class="animate__animated animate__fadeInRightBig mx-auto"  width="100%" height="100%"></div>
    
      <div id="datos" class="animate__animated animate__fadeInTopRight col-xs-12 col-lg-6 mt-5 ">
     
      <div id="datos2">    
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >ID VILLA - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >PROPIETARIO - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >CEDULA - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >FECHA INICIO - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >FECHA_FINAL  - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >CUOTAS TOTALES - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >VALOR TOTAL - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >CUOTAS PAGADAS - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >VALOR PAGADO - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >CUOTAS ADEUDADAS - -> </label>
       <label class="text-center card   p-1" style="border-color: orange;" id="r" >VALOR ADEUDADO - -> </label>
     
    </div>
    <div id="datos3">
     

        <label class="text-center card p-1" id="dato">{{$alicuota->residencia_id}}</label>
        <label class="text-center card p-1" id="dato">{{$alicuota->name}} {{$alicuota->apellido}}</label>
        <label class="text-center card p-1" id="dato">{{$alicuota->cedula}}</label>
        <label class="text-center card p-1" id="dato">{{$alicuota->fecha_inicio}}</label>
        <label class="text-center card p-1" id="dato">{{$alicuota->fecha_final}}</label>
        <label class="text-center card p-1" id="dato">{{$alicuota->cuotas_totales}}  mes(es)</label>
        <label class="text-center card p-1" id="dato">$ {{$alicuota->valor_total}}</label>
        <label class="text-center card p-1" id="dato">{{$alicuota->cuotas_pagadas}}  mes(es)</label>
        <label class="text-center card p-1" id="dato">$  {{$alicuota->valor_pagado}}</label>
        <label class="text-center card p-1" id="dato">{{$alicuota->cuotas_adeudadas}}  mes(es)</label>
        <label class="text-center card p-1" id="dato">$  {{$alicuota->valor_adeudado}}</label>

        </div>
     </div>
  </div>
 
   @endforeach
  
@endsection