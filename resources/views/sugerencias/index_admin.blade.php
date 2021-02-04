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

<section class=" pt-5 container pb-3" id="cuerpo">
    <h1 class="text-center mt-3 mb-5 text-white font-weight-bold">ADMINISTRACION DE SUGERENCIAS</h1>

    <form class="form-inline ml-3 mb-5 " >
      
      <div class="input-group input-group-sm bg-secondary">
          <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar por nombre"
              aria-label="Search">
          <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
              </button>
          </div>
          
      </div>
      <button class="btn btn-primary ml-5" type="submit">
        Cargar todo
    </button>
  </form>
    <div class="table-wrapper-scroll-y my-custom-scrollbar mb-5 " id="prueba">
        <table class="table table-bordered table-striped mb-0 table-hover">
            <thead class="bg-dark" >
              <tr>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Residencia</th>
                <th scope="col">Tema</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Ver</th>
             
              </tr>
            </thead>
            <tbody class="bg-secondary">
                @foreach ($sugerencias as $sugerencia)
                @include('sugerencias.modal_view')
                @if ($sugerencia->estado!="SOLUCIONADO")
                <tr>
                  <td>{{$sugerencia->cedula}}</td>
                  <td>{{$sugerencia->name." ".$sugerencia->apellido}}</td>
                  <td>{{$sugerencia->residencia_id}}</td>
                  <td>{{$sugerencia->titulo}}</td>
                  <td>{{$sugerencia->updated_at}}</td>
                  <td>{{$sugerencia->estado}}</td>
                  <td class="text-center">
                   <a href="" class="btn btn-secondary mb-4" data-toggle="modal" data-whatever="@mdo" data-target="#modalview-{{$sugerencia->id}}"><i class="fas fa-eye"></i>  Ver</a>
                 </td>
                </tr>   
                @endif
                @endforeach
             
              
            </tbody>
            
          </table>
    </div>
    <form class="form-inline ml-3 mb-5 " >
      
      <div class="input-group input-group-sm bg-secondary">
          <input class="form-control form-control-navbar" name="search2" type="search" placeholder="Buscar por nombre"
              aria-label="Search">
          <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
              </button>
          </div>
          
      </div>
      <button class="btn btn-primary ml-5" type="submit">
        Cargar todo
    </button>
  </form>
    <div class="table-wrapper-scroll-y my-custom-scrollbar mb-5 " id="prueba">
        <table class="table table-bordered table-striped mb-0 table-hover">
            <thead class="bg-dark" >
              <tr>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Residencia</th>
                <th scope="col">Tema</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Ver</th>
             
              </tr>
            </thead>
            <tbody class="bg-secondary">
                @foreach ($sugerencias2 as $sugerencia)
                @include('sugerencias.modal_view')
                @if ($sugerencia->estado=="SOLUCIONADO")
                <tr>
                  <td>{{$sugerencia->cedula}}</td>
                  <td>{{$sugerencia->name." ".$sugerencia->apellido}}</td>
                  <td>{{$sugerencia->residencia_id}}</td>
                  <td>{{$sugerencia->titulo}}</td>
                  <td>{{$sugerencia->updated_at}}</td>
                  <td>{{$sugerencia->estado}}</td>
                  <td class="text-center">
                   <a href="" class="btn btn-secondary mb-4" data-toggle="modal" data-whatever="@mdo" data-target="#modalview-{{$sugerencia->id}}"><i class="fas fa-eye"></i>  Ver</a>
                 </td>
                </tr>   
                @endif
                @endforeach
             
              
            </tbody>
            
          </table>
    </div>
  
   </section>
@endsection
