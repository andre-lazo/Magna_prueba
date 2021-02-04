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
        
          
</style>
@section('content')
<section class="mt-5 pt-5">
    <h1 class="text-center pt-5">
       RESERVACIONES DE PISCINA
    </h1>
    
    <div class="container table-wrapper-scroll-y my-custom-scrollbar mb-5 " id="prueba">
        <table class="table table-bordered table-striped mb-0 table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Usuario</th>
                <th scope="col" class="text-center">Residencia</th>
                <th scope="col" class="text-center">Fecha</th>
                <th scope="col" class="text-center">Hora</th>
                <th scope="col" class="text-center">Ver</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($eventos as $evento)
             <tr>
              <th scope="row" class="text-center">{{$evento->id}}</th>
              <td class="text-center">{{$evento->name." ".$evento->apellido}}</td>
              <td class="text-center">{{$evento->residencia_id}}</td>
              <td class="text-center">{{$evento->start}}</td>
              <td class="text-center">{{$evento->hora}}</td>
              <td class="text-center"><a href="{{route('alberca.show',Crypt::encrypt($evento->id))}}" class="btn btn-secondary"><i class="far fa-eye"></i> Ver</a></td>
            </tr>
             @endforeach
            </tbody>
          </table>
          
          
         
    </div>
</section>
@endsection