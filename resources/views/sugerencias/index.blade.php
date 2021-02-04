@extends('navbar_user')

@section('content')
@include('sugerencias.modal_create')
@if (!sizeof($sugerencias)>0)
<div class="d-flex flex-wrap justify-content-around  mt-5">
    <div class="animate__animated animate__fadeInBottomLeft card border-primary mt-4 " style="max-width: 18rem">
        <div class="card-header">
        <b>Titulo: Ejemplo de Sugerencia</b>
        </div>
        <div class="card-body text-primary">
           
      
           <img src="{{asset('img/magna.jpeg')}}" width="100%" alt="">
         
        <h5 class="card-title">Fecha de Creacion: <b> 202x-x-x</b></h5>
        <p class="card-text">Contenido de descripcion de la sugerencia</p>
        <p class="card-text">Estado: Estado actual de la sugerencia</p>
    </div>
        <div class="card-footer">
           
    
        </div>
        </div>
</div>
@endif
<div class="d-flex flex-wrap justify-content-around  mt-5">
   
    @foreach ($sugerencias as $sugerencia)
@include('sugerencias.modal_delete')
            <div class="card border-primary mt-4 " style="max-width: 18rem">
                <div class="card-header">
                <b>{{$sugerencia->titulo}}</b>
                </div>
                <div class="card-body text-primary">
                   @if ($sugerencia->imagen!=null)
                   <div>Evidencia Fotografica: </div>
                   <img src="{{asset('img_sugerencia/'.$sugerencia->imagen)}}" width="100%" alt="">
                   
                   @elseif ($sugerencia->imagen==null)
                   <img src="{{asset('img/magna.jpeg')}}" width="100%" alt="">
                   @endif
                <h5 class="card-title">Fecha de Creacion: <b> {{$sugerencia->created_at}}</b></h5>
                <p class="card-text">{{$sugerencia->descripcion}}</p>
                <p class="card-text"><b>Estado: {{$sugerencia->estado}}</b></p>
                @if ($sugerencia->observacion!=null)
                <p class="card-text text-danger"><b>Respuesta de administracion: {{$sugerencia->observacion}}</b></p>
                @endif
            </div>
                <div class="card-footer">
                   
                    <button type="button" class="float-right btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$sugerencia->id}}"><i class="far fa-trash-alt"></i> Eliminar</button>

                </div>
                </div>
      
@endforeach
</div>
@endsection