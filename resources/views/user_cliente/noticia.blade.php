@extends('navbar_user')

@section('content')
   
   
    <h1 class="animate__animated animate__pulse animate__infinite ml-5 mt-4 pt-5" id="inicio" >ULTIMAS NOTICIAS</h1>
     
    @foreach ($noticias as $noticia)
    @include('user_cliente.modal_view')
    
<section class="jumbontron " >
          
    
    </section>
  <section class="ml-5  mt-5 mr-5">
    <div class="row">
        <div class="animate__animated animate__backInLeft col-xs-12 col-lg-6">
            <img src="{{asset('img/'.$noticia->imagen)}}" width="100%" height="350px">
        </div>
        <div class="animate__animated animate__backInRight col-xs-12 col-lg-6">
            <h1 class="text-center">NOTICIA: {{$noticia->titulo}}</h1>
            <span class="font-weigth-bold" style="font-family:Georgia, 'Times New Roman', Times, serif;">fecha de publicacion: {{$noticia->created_at}} </span>
            <div class="mt-3">
                
               <p>{{$noticia->contenido_previo}}</p>
            </div>
            <center><button type="button" class=" btn btn-outline-danger" data-toggle="modal" data-target="#modal-{{$noticia->id}}"><i class="far fa-eye"></i> Ver mas</button></center>
        </div>
    </div>
    
  </section>
@if ($loop->last)
<div class="mx-auto mt-5">
  <center>
  <a href="#inicio"  class=" btn btn-outline-danger "><i class="fas fa-arrow-alt-circle-up"></i> Volver</a>
  </center>
</div>  
@endif
 
@endforeach

    @endsection