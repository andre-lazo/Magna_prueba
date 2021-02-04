@extends('navbar')

@section('content')
<section class="mt-5 pt-5">
    <h1 class="text-center">
        ADMINISTRACION DE RESERVACIONES
    </h1>
    <div class="container mb-5 mt-5 ">
       
        <form class="form-inline ml-3 " >
            <label class="mr-3">BUCAR POR:</label>
            <div class="input-group input-group-sm bg-secondary">
               
                    <select class="form-control form-control-navbar" name="search" type="searcharia-label="Search" width="50%" style="font-weight: bold;" name="" class="form-control mb-5"  id="">
                        <optio  n value="" style="font-weight: bold;">Piscinas</option>
                        <option value="" style="font-weight: bold;">Salon de Eventos</option>
                        <option value="" style="font-weight: bold;">Cancha 1(cesped)</option>
                        <option value="" style="font-weight: bold;">Cancha 2(multiuso)</option>
                        <option value="" style="font-weight: bold;">Cancha 3(multiuso 2)</option>
            
                    </select>
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
   
    <div class="container">
        <table class="table table-hover table-bordered">
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