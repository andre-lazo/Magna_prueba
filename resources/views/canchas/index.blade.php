@extends('navbar_user')

@section('scripts')
<center><h1 class="animate__animated animate__bounce pt-5">Seccion de Reservacion de la Cancha de Cemento 1</h1></center>

    <link rel="stylesheet" href="{{asset('fullcalendar/core/main.css')}}">
    <link rel="stylesheet" href="{{asset('fullcalendar/daygrid/main.css')}}">
    <link rel="stylesheet" href="{{asset('fullcalendar/list/main.css')}}">
    <link rel="stylesheet" href="{{asset('fullcalendar/timegrid/main.css')}}">


    <script src="{{asset('fullcalendar/core/main.js')}}" defer></script>
    <script src="{{asset('fullcalendar/interaction/main.js')}}" defer></script>
    <script src="{{asset('fullcalendar/daygrid/main.js')}}" defer></script>
    <script src="{{asset('fullcalendar/list/main.js')}}" defer></script>
    <script src="{{asset('fullcalendar/timegrid/main.js')}}" defer></script>
    <script>
       
        var url_show="{{url('/canchas/show')}}"; 
    </script>
    <script src="{{asset('js/calendar.js')}}" defer></script>
 
@endsection

@section('content')


@include('reglas.modal')



<div clas="row">
   
  <div class="animate__animated animate__fadeInRightBig cal">
      <div id="calendar"></div>
  </div>
  <div class="col"></div>
</div>
<div class="animate__animated animate__fadeInRightBig table-wrapper-scroll-y my-custom-scrollbar row container mt-5">
<table class="table table-bordered table-striped mb-0 table-hover">
  <thead class="thead-dark">
    <tr>
      <center><th scope="col ">Usuario</th></center>
      <th scope="col text-center">Horario</th>
      <th scope="col text-center">Fecha</th>
      <th scope="col text-center">Exportar</th>
      <th scope="col text-center">Eliminar</th>

    </tr>
  </thead>
  <tbody>
    @foreach($canchas as $cancha)
    @include('canchas.model_delete')
    <tr>
      <td>{{Auth::user()->name." ".Auth::user()->apellido}}</td>  
      <td>{{$cancha->hora}}</td>
      <td>{{$cancha->start}}</td>
      <td class="text-center"><a href="{{route('canchas.edit',$cancha->id)}}" class="btn btn-success"><i class="far fa-eye"></i>Pdf</a></td>
      <td class="text-center"><button type="button" class=" btn btn-outline-danger" data-toggle="modal" data-target="#modalEliminar-{{$cancha->id}}"><i class="far fa-trash-alt"></i> Eliminar</button></td>


    </tr>
    @endforeach
  </tbody>
</table>
</div>
<!--MODAL-->
<form action="{{route('canchas.create')}}">
  @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Reservacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="row mt-5">
                    <div class="col-sm-6 ml-5">
                    <center><h5 class="mb-5">¿Desea hacer la reservacion en la siguiente fecha?</h5></center>
                    </div>
                    <div class="col-sm-4">
                    <center><input class="form-control" type="text" name="txtFecha" id="txtFecha" readonly></center>
                    </div><br>
        </div>
        <div class="modal-footer">
          <div id="Agregar">
            <button type="submit" id="btnAgregar"  class="btn btn-success">Agregar</button>
          </div>
            <!--<button id='btnModificar' class="btn btn-warning">Modificar</button>-->  
          <div id="Cancelar">
            <button id='btnCancelar' data-dismiss="modal" class="btn btn-primary">Cancelar</button>
          </div>
            
        </div>
      </div>
    </div>
  </div>
  
  
</form>   

@endsection