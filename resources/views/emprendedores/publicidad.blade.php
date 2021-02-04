@extends('navbar_user')

@section('content')

    <h1 class="animate__animated animate__jackInTheBox pt-5 text-center">SECCIÓN DE EMPRENDEDORES</h1>
    <center>
         <form class="form-inline ml-3 mb-5  " >
      
      <div class="input-group input-group-sm bg-secondary">
         
              <select class="animate__animated animate__backInDown form-control form-control-navbar" name="search"  >
                <option selected value="RESTAURANTE">RESTAURANTE</option>
            <option selected value="TECNOLOGIA">TECNOLOGÍA</option>
            <option selected value="ARTICULOS DE HOGAR">ARTÍCULOS DEL HOGAR</option>
            <option selected value="MINI MARKET">MINI MARKET</option>
            <option selected value="BISUTERÍA">BISUTERÍA</option>
            <option selected value="ROPA">ROPA</option>
            <option selected value="FARMACEUTICA">FARMACEUTICA</option>
            <option selected value="ENTRETENIMIENTO">ENTRETENIMIENTO</option>
            <option selected value="LIMPIEZA">LIMPIEZA</option>
            <option selected value="FITNEESS">FITNEESS</option>
            <option selected value="DEPORTE">DEPORTE</option>
            <option selected value="LICORERIA">LICORERÍA</option>
            <option selected value="BAZAR">BAZAR</option>
            <option selected value="ARTICULOS DE BELLEZA">ARTICULOS DE BELLEZA</option>
            <option selected value="SERVICIOS">SERVICIOS</option>
            <option selected value="MANO DE OBRA">MANO DE OBRA</option>
            <option selected value="" >Seleccione</option>
          </select>
          <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
              </button>
          </div>
          
      </div>
      <button class="animate__animated animate__fadeInRightBig btn btn-success ml-5" type="submit">
        Buscar
    </button>
      <button class="animate__animated animate__fadeInRightBig btn btn-primary ml-2" type="submit" onclick="click()">
        Cargar todo
    </button>
  </form>
    </center>
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
</div>

    @elseif(sizeof($emprendedores)>0)
    @foreach ($emprendedores as $emprendedor)
    @include('emprendedores.modal_view')
    <div class="animate__animated animate__fadeInBottomLeft col-xs-12 col-lg-4" style="float: right;">
        <div class="card" style="width:100%">
            <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" width="100%" height="300px" class="card-img-top" alt="">
            <div class="card-body">
             <a href="" class="card-title h5 text-dark" style="text-decoration: none;">TITULO: {{$emprendedor->titulo}} </a><br><br>
              <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-{{$emprendedor->id}}"><i class="far fa-eye"> Leer mas</i></a>
             <a target="_blank" href="https://api.whatsapp.com/send?phone=+593{{$emprendedor->telefono}}&text=Hola,%20Quiero%20saber%20mas" class="btn btn-success float-right mr-3"><i class="far fa-envelope"> Escribanos</i></a>
            </div>
          </div>
    </div>
       @endforeach
       @endif
       
       
      
       
       
       
   
@endsection