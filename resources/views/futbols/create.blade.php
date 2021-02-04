@extends('navbar_user')
<style>
.mover{
  padding-left: 25%;
}
@media screen and (max-width:800px){
  .mover{
    padding-left: 0%;
  }
}
 </style>
<script>
    function cargar(){
       var hora;
        $(document).on('click', '.boton', function(){
               hora=$(this).val();
            $('#txtHora2').val(hora);
        });
    }
</script>
@section('content')
    <div class="row">
      <div class="animate__animated animate__fadeInLeftBig col-lg-6 col-xs-12 pt-5 mt-5">
<img src="{{asset('img/WIN_20200813_23_31_02_Pro.jpg')}}" width="100%" alt="">
      </div>
<div class="col-lg-6 col-xs-12">
  <div class=" ">
    <center><h1 class="animate__animated animate__fadeInLeftBig font-weight-bold pt-5">Horarios ya reservados
    </h1>
    @foreach ($arreglo as $futbol)
    <p class="font-weight-bold">{{$futbol->hora}}</p>
@endforeach</center>
 <h3 class='animate__animated animate__fadeInRightBig text-center mb-2 font-weight-bold pt-5'>HORARIOS-DISPONIBLES CANCHA DE FUTBOL </h3>
             
 <div id="horarios" class="animate__animated animate__fadeInRightBig col-xs-12">
     <center>
    @if(!$hora1) <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 08 am - 09 am"> @endif
    @if (!$hora2)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 09 am - 10 am">@endif
    @if (!$hora3)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 10 am - 11 am"><br><br>@endif
    @if (!$hora4)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 11 am - 12 pm">@endif
    @if (!$hora5)     <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 12 pm - 13 pm">@endif
    @if (!$hora6)     <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 13 pm - 14 pm"><br><br>@endif
    @if (!$hora7)     <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 14 pm - 15 pm">@endif
    @if (!$hora8)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 15 pm - 16 pm">@endif
    @if (!$hora9)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 16 pm - 17 pm">@endif
    @if (!$hora10)    <input type="button"  onclick="cargar()" class="boton btn btn-primary mr-4" value=" 17 pm - 18 pm">@endif
     </center>
 </div>  
    {!! Form::open(['url' => 'futbols']) !!}
{{Form::token()}}
  <div>
       
         
      <div class="animate__animated animate__fadeInTopRight text-center font-weight-bold">
          <label>Hora</label>
          <input readonly type="text" class="form-control" name="hora" id="txtHora2" required>
          <label>Cedula</label>
          <input readonly type="text" class="form-control" name="cedula" id="cedula" value="{{Auth::user()->cedula}}" required>
          <input readonly hidden type="text" class="form-control" name="id" id="id" value="{{Auth::user()->id}}" required>
          <label>Usuario</label>
          <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" value="{{ Auth::user()->name }} {{ Auth::user()->apellido }}" readonly>
      
              <label> Fecha: </label>
              <input class="form-control" type="text" name="txtFecha" value="{{$fecha}}" id="txtFecha" readonly>
 
  
      <div class="mb-5 mt-4">
      <label for="visitantes" class=" control-label">Visitantes</label>
  <div class="mover">
    <div class="row text-center mt-5">
      <div class="col-sm-4 ml-3">
      <label for="visitantes" class=" control-label ">Nombre</label>
      </div>
      <div class="col-sm-4">
      <label for="visitantes" class=" control-label">Parentezco</label>
      </div><br>
      <div class="col-sm-4 ml-3">
        <input type="text" name="visi1" class="form-control" id="visi1" placeholder="Nombre">
      </div>
      <div class="col-sm-4">
        <input type="text" name="parent1" class="form-control" id="parent1" placeholder="Parentezco">
      </div><br><br>
      </div>
      <div class="row">
      <div class="col-sm-4 ml-3">
        <input type="text" name="visi2" class="form-control" id="visi2" placeholder="Nombre">
      </div>
      <div class="col-sm-4">
        <input type="text" name="parent2" class="form-control" id="parent2" placeholder="Parentezco">
      </div><br><br>
      </div>
      <div class="row">
      <div class="col-sm-4 ml-3">
        <input type="text" name="visi3" class="form-control" id="visi3" placeholder="Nombre">
      </div>
      <div class="col-sm-4">
        <input type="text" name="parent3" class="form-control" id="parent3" placeholder="Parentezco">
      </div><br><br>
      </div>
      <div class="row">
      <div class="col-sm-4 ml-3">
        <input type="text" name="visi4" class="form-control" id="visi4" placeholder="Nombre">
      </div>
      <div class="col-sm-4">
        <input type="text" name="parent4" class="form-control" id="parent4" placeholder="Parentezco">
      </div><br><br>
      </div>
      <div class="row">
      <div class="col-sm-4 ml-3">
        <input type="text" name="visi5" class="form-control" id="visi5" placeholder="Nombre">
      </div>
      <div class="col-sm-4">
        <input type="text" name="parent5" class="form-control" id="parent5" placeholder="Parentezco">
      </div><br><br>
      </div>
      <div class="row">
      <div class="col-sm-4 ml-3">
        <input type="text" name="visi6" class="form-control" id="visi6" placeholder="Nombre">
      </div>
      <div class="col-sm-4">
        <input type="text" name="parent6" class="form-control" id="parent6" placeholder="Parentezco">
      </div><br><br>
      </div>
      <div class="row">
      <div class="col-sm-4 ml-3">
        <input type="text" name="visi7" class="form-control" id="visi7" placeholder="Nombre">
      </div>
      <div class="col-sm-4">
        <input type="text" name="parent7" class="form-control" id="parent7" placeholder="Parentezco">
      </div>
      </div>
  </div>
    </div>
      </div>    
        </div>
      
         <center>
          <div class="animate__animated animate__fadeInRightBig">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    
         </center>
</div>
   
   {!! Form::close() !!}
   
 
</div>
</div>
    </div>
  
@endsection