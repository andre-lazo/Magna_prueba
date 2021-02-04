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
    <h1 class="text-center mt-3 mb-5 text-white font-weight-bold">ADMINISTRACION DE EMPRENDIMIENTOS</h1>
    <center>
      <form class="form-inline ml-3 mb-5  " >
   
   <div class="input-group input-group-sm bg-secondary">
      
           <select class="form-control form-control-navbar" name="search"  >
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
   <button class="btn btn-success ml-5" type="submit">
     Buscar
 </button>
   <button class="btn btn-primary ml-2" type="submit" onclick="click()">
     Cargar todo
 </button>
</form>
 </center>
    <div class="table-wrapper-scroll-y my-custom-scrollbar mb-5 " id="prueba">
        <table class="table table-bordered table-striped mb-0 table-hover">
            <thead class="bg-dark" >
              <tr>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Residencia</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tema</th>
                <th scope="col">Fecha</th>
                <th scope="col">Revisar</th>
                <th scope="col">Eliminar</th>

               
               
             
              </tr>
            </thead>
            <tbody class="bg-secondary">
                @foreach ($emprendimientos as $emprendimiento)
                @include('emprendedores.modal_view_admin')
                @include('emprendedores.modal_delete_admin')
                <tr>
                 <td>{{$emprendimiento->cedula}}</td>
                 <td>{{$emprendimiento->name}}</td>
                 <td>{{$emprendimiento->residencia_id}}</td>
                 <td>{{$emprendimiento->categoria}}</td>
                 <td>{{$emprendimiento->titulo}}</td>
                 <td>{{$emprendimiento->updated_at}}</td>
                 <td class="text-center">
                  <a href="" class="btn btn-secondary mb-4" data-toggle="modal" data-whatever="@mdo" data-target="#modal-{{$emprendimiento->id}}"><i class="fas fa-eye"></i>  Revisar</a>
                </td>
                <td class="text-center">
                  <a href="" class="btn btn-danger mb-4" data-toggle="modal" data-whatever="@mdo" data-target="#modaldelete-{{$emprendimiento->id}}"><i class="fas fa-trash-alt"></i>  Eliminar</a>
                </td>
               </tr>   
                @endforeach
             
              
            </tbody>
            
          </table>
         
    </div>
    
   </section>
@endsection
