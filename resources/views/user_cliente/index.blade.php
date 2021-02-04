@extends('navbar_user')

@section('content')
<section class="pt-5 " >
    <div class="row">
      <div class="col-xs-12 col-lg-6 lead mt-5 pl-5">
        <h1 id="bien" class="animate__animated animate__bounce text-center">BIENVENIDA</h1>
        <p class="animate__animated animate__fadeInTopLeft lead text-justify mt-5" style="font-size: x-large;">
          Bienvenidos al portal web de la urbanización residencial Magna, este conjunto urbanizacional busca conformar un espacio de vivienda organizado con  lugares de convivencia donde prevalezcan la armonía, el respeto, la responsabilidad, el orden, la dignidad y los valores humanos, haciendo de la Urbanización Magna de Villa Club un sitio agradable para vivir.  
        </p>          </div>
      <div class="animate__animated animate__fadeInTopRight col-xs-12 col-lg-6  pr-5">
        <img src="img/magna.jpeg"  width="100%">
      </div>
    </div>
    
  </section>
       <section id="galeria" name="galeria" class="animate__animated animate__fadeInUpBig bg-secondary">
       
        <center>
          <h1 class="mt-5">VISITA NUESTROS LUGARES DE RECREACION</h1>
        
          <div class="row mt-5 container">
          
          <div class="col-xs-12 col-lg-4">
            <p class="h3 mt-3"> CANCHAS</p>
            <img src="img/cancha.jpg" width="100%" height="255px" style="border-radius: 10%;" >
            <p class="h4 mt-3">Horarios de uso:</p>
            <p class="h5" >   Miércoles y Domingo: 09:00 - 18:00</p>
            <p class="h5">    Jueves a Sábado: 14:00 - 20:00 </p>
          </div>

          <div class="col-xs-12 col-lg-4">
            <p class="h3 mt-3"> PISCINA</p>
            <img src="img/pis.jpg" width="100%" style="border-radius: 10%;">
            <p class="h4  mt-3">Horarios de uso:</p>
            <p class="h5" >  Martes a Domingo: 09:00 - 17:00</p>
          </div>
          <div class="col-xs-12 col-lg-4">
            <p class="h3 mt-3"> SALÓN DE EVENTOS</p>
            <img src="img/magna.jpeg" width="100%" >
            <p class="h4  mt-3">Horarios de uso (Todos los días): </p>
            <p class="h5" >  09h00 a 14h00.</p>
            <p class="h5" >  15h00 a 20h00.</p>
            <p class="h5" >  21h00 a 02h00.</p>
          </div>
        </div></center>
       </section>
@endsection
