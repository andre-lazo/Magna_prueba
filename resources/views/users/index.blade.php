@extends('navbar')
 
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 40%;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
        
           body{
             background: url({{asset('img/entrada.jpeg')}}) no-repeat center center  fixed;
               font-family: 'Titillium Web', sans-serif;
               background-size: cover; 
               
           }
       
</style>
@section('content')

<div class="container mb-3 " id="con">
  <h1 class="text-center text-white mb-5 mt-5 pt-5" style="font-family: verdana"><b>USUARIOS REGISTRADOS DE LA CIUDADELA MAGNA</b></h1>
  
 
  <a href="{{route('user.create')}}"><button type="button" class="btn btn-secondary mb-3"><i class="fas fa-user-plus"></i> AGREGAR USUARIO</button></a>

  <form class="form-inline ml-3 " >
    <div class="input-group input-group-sm bg-secondary">
        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar por apellido"
            aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <button class="btn btn-success ml-5" type="submit">
      Buscar
  </button>
    <button class="btn btn-primary ml-2" type="submit" onclick="click()">
      Cargar todo
  </button>
   
</form>

@if ($search ?? '')
<div class="alert alert-primary">
 Los resultados para tu busqueda '{{$search ?? ''}}' son:
   </div>
@endif
</h6>
  <div class="table-wrapper-scroll-y my-custom-scrollbar mb-5 " id="prueba">
    <table class="table table-bordered table-striped mb-0 table-hover">
        <thead class="bg-dark" >
          <tr>
            <th  scope="col" class="text-center">#</th>
            <th  scope="col" class="text-center">Nombre</th>
            <th  scope="col" class="text-center">Email</th>
            <th  scope="col" class="text-center">Codigo Manzana y Villa</th>
            <th  scope="col" class="text-center">Ver</th>
            <th  scope="col" class="text-center">Modificar</th>
            <th  scope="col" class="text-center">Eliminar</th>
         
          </tr>
        </thead>
        <tbody class="bg-secondary">
            @foreach ($users as $user)
            @include('users.modal_delete')
            @if ($user->email!="administrador@gmail.com")
            <tr>
                <th scope="row" class="text-center">{{$user->id}}</th>
                <td class="text-center">{{$user->name    }} {{$user->apellido   }}</td>
                <td class="text-center">{{$user->email   }}</td>
                <td class="text-center">{{$user->residencia_id}}</td>

                <td class="text-center"><a href="{{route('user.show',Crypt::encrypt($user->id))}}" class="btn btn-secondary"><i class="far fa-eye"></i> Ver</a></td>
                <td class="text-center"> <a href="{{ route('user.edit',Crypt::encrypt($user->id)) }}" class="btn btn-primary"><i class="far fa-edit"></i>  Modificar</a></td>
                <td class="text-center"> 
                       
                <button type="button" class="float-right btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$user->id}}"><i class="far fa-trash-alt"></i> Eliminar</button>
                </td>
               
              </tr>    
              @endif
            @endforeach
         
          
        </tbody>
        
      </table>
     
</div>

</div>

@endsection