@extends('navbar_user')

@section('content')
<div class="row" >
    <div class="animate__animated animate__fadeInLeftBig col-xs-12 col-lg-6" >
        <img src="{{asset('img/magna.jpeg')}}" width="100%" alt="">
    </div>
    <div class="animate__animated animate__fadeInDownBig col-xs-12 col-lg-6"> 
      
        <center><h2 class="pt-5">Usuario: {{$user->name}}</h2></center>
        <h1 class="animate__animated animate__fadeInRightBig text-center mb-5 mt-2">FORMULARIO DE ACTULIZACION DE SUS DATOS Y CAMBIO DE CONTRASEÑA</h1>
        
<center><span class="text-danger font-weight-bold">!!AL ACTUALIZAR LA CONTRASEÑA EL SISTEMA LO REDIRIGIRA AL INICIO DE SESION Y DEBERA VOLVER A INICIAR SESION!!</span>
</center> 
    <form action="{{ route('configuracion_cliente.update', $user->id) }}" method="POST" class="mx-auto" enctype="multipart/form-data" style="max-width: 20rem">
        @method('PATCH')
        @csrf
  
          <div class="form-group mt-3">
           <center> <label for="exampleInputEmail1"><i class="far fa-user"></i> NOMBRE</label></center>  
            <input  type="text" class="form-control" value="{{$user->name}}" onkeypress=" return sololetra(event)" name="name" placeholder="ingrese su nombre" readonly>
            <center> <label for="exampleInputEmail1" class="mt-2"><i class="far fa-user"></i> APELLIDO</label></center>
            <input  type="text" class="form-control" value="{{$user->apellido}}" name="apellido" onkeypress=" return sololetra(event)" placeholder="ingrese su nombre"  readonly>

          </div>
         
          <div class="form-group">
           <center> <label fors="email"><i class="far fa-envelope"></i> Email </label></center>
            <input readonly type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="ingrese su email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <center> <label ><i class="fas fa-id-card"></i> Cedula </label></center>
             <input maxlength="10" value="{{$user->cedula}}" onkeypress=" return solonum(event)" type="text" class="form-control" name="cedula" placeholder="ingrese numero de cedula" readonly >
           </div>
           <div class="form-group">
            <center> <label ><i class="fas fa-house-user"></i> Codigo de Residencia </label></center>
             <select name="residencia" disabled class="form-control">
              <option value="{{$user->residencia_id}}">{{$user->residencia_id}}</option>
             
             </select>
           </div>
           <div class="form-group">
           <center> <label for="password"><i class="fas fa-unlock-alt"></i>  Contraseña Antigua</label></center>
            <input type="password" class="form-control" name="passwordA">
          </div>
          <div class="form-group">
           <center> <label for="password"><i class="fas fa-unlock-alt"></i> Nueva Contraseña</label></center>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
          <center>  <label for="password"><i class="fas fa-unlock-alt"></i> Confirme Nueva contraseña</label></center>
            <input type="password" class="form-control" name="password_confirmation">
          </div>
         
          
         
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"> Guardar</i></button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-window-close"> Cancelar</i> </button>
  
        </form>
      
    </div>
</div>

@endsection
<script>
 

  function solonum(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key);
            numero="0123456789.";
            especiales="8-37-38-46";
            teclado_especial=false;
            for (var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;break;
                }
            }
            if(numero.indexOf(teclado)==-1 && !teclado_especial){
              return false;
            }
           
           
        }
        function sololetra(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key).toLowerCase();
            letras = "abcdefghijklmnopqrstuvwxyz ";
            especiales = "8-37-38-46-164";
            teclado_especial=false;
            for (var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;break;
                }
            }
            if(letras.indexOf(teclado)==-1 && !teclado_especial){
                return false;
            }
        }   
</script>