<!DOCTYPE HTML>
<html lang="es">
<head> 
<meta charset="UTF-8" />

<title> SOLICITUD DE RESERVA </title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!--<link rel="stylesheet" href="{{asset('fonts/style.css')}}">-->
    <link rel="stylesheet" href="{{asset('extensiones/font-awesome.min.css')}}">
    <link href="{{asset('extensiones/css2')}}" rel="stylesheet">    
    <script src="{{asset('js/jquery-3.5.1.js')}}" ></script>
    <script src="{{asset('js/bootstrap.min.js')}}" ></script>
 
    
<style type="text/css">
.centrado23{ 
margin-left: 85px;
margin-top: 20px;
font-size: 15px;
font-family:"Arial";
}
.centrado24{ 
margin-left: 82px;
font-size: 15px;
margin-top: 1px;
font-family:"Arial";

}
.centrado25{ 
margin-left: 82px;
margin-right: 82px;
font-size: 14.3px;
margin-top: 1px;
font-family:"Arial";
LINE-HEIGHT:25px;

}
.centrado26{ 

margin-top: 5px;


}
table {
	width: 50%;
	height: 10px;
}
.titulo{
  font-size: 16px;
  
}
</style>

</head>
<body>
<table BORDER=0.5 CELLPADDING=0 CELLSPACING=0  align="center" class="centrado26" >

<tr>
<td class="mt-1" width="120px"> <center><img src="{{asset('img/magna.jpeg')}}" width="100px" height="100px"></center></td>  
<td align="center" width="400px"> <p class="titulo"> SOLICITUD PARA LA AUTORIZACIÓN DEL USO DE ÁREAS COMUNITARIAS (CANCHAS,PARQUES Y PISCINA) DE  MAGNA DE VILLA CLUB, DURANTE <br> EMERGENCIA SANITARIA COVID-19 </p>  </td>
<td width="120px">  <center><b>Código:</b> MAGNA-02-2020   <br>
<b>Fecha:</b> {{$albercas->start}}</center>
 </td>
</tr>

</table>

<br>
        <span class="centrado23">Sres.<br></span>
        <span class="centrado24">ADMINISTRACIÓN<br></span>
        <span class="centrado24" >ETAPA MAGNA <br></span>
        <span class="centrado24">VILLACLUB<br></span>
        <span class="centrado24">Presente.<br><br></span>
       
        <p class="centrado25 text-justify">Yo, <b>{{Auth::user()->name." ".Auth::user()->apellido}}</b>  propietario(a) de la villa asignada con el 
No <b> {{$villa}} </b> de la manzana <b> {{$manzana}} </b> de ésta Urbanización, solicito se digne autorizar el uso de la siguiente área comunitaria <b>{{$locacion}}</b>
para el <b>{{$albercas->start}}</b> en el horario de <b>{{$albercas->hora}}</b> , para la distracción propia y de mi familia.<br><br>  </p>


<p class="centrado25 text-justify">Mis familiares que asistirán con mi supervisión son: <br>
  </p>

  <center><table  BORDER=0.5 CELLPADDING=0 CELLSPACING=0   align="center"  >

<tr>
<td align="center" width="260" height="25"> Nombres y Apellidos  </td>
<td align="center" width="140" height="25">  Parentesco  </td>
</tr>
<tr >
<td align="center" width="260" height="25"> {{$albercas->visi1}} </td>
<td align="center"  width="140" height="25"> {{$albercas->pare1}} </td>
</tr>
<tr >
<td align="center" width="260" height="25"> {{$albercas->visi2}} </td>
<td align="center"  width="140" height="25"> {{$albercas->pare2}} </td>
</tr>
<tr >
<td align="center" width="260" height="25"> {{$albercas->visi3}}  </td>
<td align="center"  width="140" height="25"> {{$albercas->pare3}} </td>
</tr>
<tr >
<td align="center" width="260" height="25"> {{$albercas->visi4}}  </td>
<td align="center"  width="140" height="25"> {{$albercas->pare4}} </td>
</tr>
<tr >
<td align="center" width="260" height="25">  {{$albercas->visi5}} </td>
<td align="center"  width="140" height="25"> {{$albercas->pare5}} </td>
</tr>
<tr >
<td align="center" width="260" height="25">  {{$albercas->visi6}} </td>
<td align="center"  width="140" height="25"> {{$albercas->pare6}} </td>
</tr>
<tr >
<td align="center" width="260" height="25">  {{$albercas->visi7}} </td>
<td align="center"  width="140" height="25"> {{$albercas->pare7}} </td>
</tr>


</table></center>
<p class="centrado25" ><br>Dejo constancia que, me comprometo a respetar y cumplir las normas de bioseguridad y
reglamentos establecidos para su uso y cualquier disposición que establezca el organismo
administrador, con la finalidad de mitigar y evitar contagios del COVID-19.
<br><br> Atentamente. <br><br> <b>Firma:</b> Confirmación Electrónica.<br><b> Nombres: {{$albercas->usuario}} </b><br> <b>Número C.C.: {{$cedula}}</b> </p>





</body>

</html>