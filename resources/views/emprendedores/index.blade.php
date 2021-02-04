@extends('navbar_user')

@section('content')
<h1 class="animate__animated animate__backInRight text-center pt-5">EMPIEZA TU EMPRENDIMIENTO YA!!!</h1>

@include('emprendedores.modal_create')
    <div class="d-flex flex-wrap justify-content-around  mt-5">
   
       @if (!sizeof($emprendedores)>0)
       <div class="animate__animated animate__fadeInBottomLeft col-xs-12 col-lg-4" style="float: right;">
        <div class="card" style="width:100%">
            <img src="{{asset('img/magna.jpeg')}}" width="100%" class="card-img-top" alt="">
            <div class="card-body">
             <a href="" class="card-title h5 text-dark" style="text-decoration: none;">TITULO: EJEMPLO DE PUBLICACION </a>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-danger float-right"><i class="far fa-trash-alt"></i> Eliminar</a>
              <a href="#" class="btn btn-primary float-right mr-3"><i class="far fa-edit"></i> Editar</a>
            </div>
          </div>
    </div>
    @elseif(sizeof($emprendedores)>0)
    @foreach ($emprendedores as $emprendedor)
    @include('emprendedores.modal_edit')
    @include('emprendedores.modal_delete')
    <div class="animate__animated animate__fadeInBottomLeft col-xs-12 col-lg-4" style="float: right;">
        <div class="card" style="width:100%">
            <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
            <div class="card-body">
             <a href="" class="card-title h5 text-dark" style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a>
              <p class="card-text">{{$emprendedor->descripcion}}</p>
              <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#modaldelete-{{$emprendedor->id}}"><i class="far fa-trash-alt"></i> Eliminar</a>
              <a href="#" class="btn btn-primary float-right mr-3" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-edit" ></i> Editar</a>
            </div>
          </div>
    </div>
       @endforeach
       @endif
       
       
       
    </div>
@endsection