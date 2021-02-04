@extends('navbar')
<style>
    body{
        background: url({{asset('img/entrada.jpeg')}}) no-repeat center center  fixed;
          font-family: 'Titillium Web', sans-serif;
          background-size: cover; 
          
      }
       .my-custom-scrollbar {
          position: relative;
          height: 40%;
          overflow: auto;
          }
          .table-wrapper-scroll-y {
          display: block;
          }
</style>
@section('content')
@include('alicuotas.modal_create')
<section class=" pt-5 container pb-3" id="cuerpo">
    <h1 class="text-center mt-3 mb-5 text-white font-weight-bold">ADMINISTRACION DE REGISTRO DE ALICUOTAS</h1>
       <center><a href="" class="btn btn-primary mb-4" data-toggle="modal" data-whatever="@mdo" data-target="#exampleModal2"><i class="fas fa-calendar-plus"></i>  Añadir nuevo Registro</a></center>
    <table class="table table-wrapper-scroll-y table-dark table-hover my-custom-scrollbar ">
        <thead>
          <tr>
            <th scope="col">Manzana y Villa</th>
            <th scope="col">Propietario</th>
            <th scope="col">Cedula</th>
           
            <th scope="col">Cuotas Pagadas</th>
            <th scope="col">Cuotas Adeudadas</th>
            <th scope="col">Ultima Actualizacion</th>
            <th scope="col">Ver</th>
            <th scope="col">Modificar</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($alicuotas as $alicuota)
         
         <tr>
          <td>{{$alicuota->residencia_id}}</td>
          <td>{{$alicuota->name.' '.$alicuota->apellido}}</td>
          <td>{{$alicuota->cedula}}</td>
          
          <td>{{$alicuota->cuotas_pagadas}}</td>
          <td>{{$alicuota->cuotas_adeudadas}}</td>
          <td>{{$alicuota->updated_at}}</td>
          <td class="text-center"><a class="btn btn-secondary" href="{{route('alicuota.show',Crypt::encrypt($alicuota->id))}}"><i class="far fa-eye"></i> Ver</a></td>
          <td ><a class="btn btn-danger"   href="{{route('alicuota.edit',Crypt::encrypt($alicuota->id))}}"><i class="far fa-edit"></i> MODIFICAR</a></td>
        </tr>
       
         @endforeach
        </tbody>
    </table>
   </section>
@endsection
