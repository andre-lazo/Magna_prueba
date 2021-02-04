@extends('navbar')

@section('content')

<div class="row" >
    <div class="col-xs-12 col-lg-6 pt-5 mt-5" >
        <img src="{{asset('img/magna.jpeg')}}" width="100%" alt="">
    </div>
    <div class="col-xs-12 col-lg-6"> 
      <div>
        @if($errors->any())
        <div class="alert alert-danger font-weight-bold">
           
            <h4>Errores al Editar Usuario</h4>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
        </div>
      @endif
    </div>
        <center><h2 class="mt-3">Usuario: {{$alicuota->name}}</h2></center>
        <h1 class=" text-center mb-5 mt-2">FORMULARIO DE ACTUALIZACION</h1>
        
 
        <form action="{{ route('alicuota.update', $alicuota->id) }}" method="POST" class="mx-auto" enctype="multipart/form-data" style="max-width: 20rem">
            @method('PATCH')
            @csrf
      
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Residencia:</label>
                <select name="residencia" class="form-control">
                  <option value="{{$alicuota->r}}">{{$alicuota->residencia_id}}</option>
                  @foreach ($residencias as $residencia)
                  <option value="{{$residencia->id}}">{{$residencia->residencia_id}}</option>
                  @endforeach
                </select>
              
             
                <label for="message-text" class="col-form-label">Propietario:</label>
                <select name="propietario" class="form-control">
                  <option value="{{$alicuota->id_usuario}}">{{$alicuota->name}}-{{$alicuota->apellido}}-{{$alicuota->cedula}}</option>
                  @foreach ($usuarios as $usuario)
                  <option value="{{$usuario->id}}">{{$usuario->name}}-{{$usuario->apellido}}-{{$usuario->cedula}}</option>
                  @endforeach
                </select>
                <label for="message-text" class="col-form-label">Fecha inicio:</label>
                <input type="date" value="{{$alicuota->fecha_inicio}}" name="fecha_inicio" readonly="readonly" class="form-control" id="recipient-name">
                <label for="message-text"  class="col-form-label">Fecha fin:</label>
                <input type="date" value="{{$alicuota->fecha_final}}"  name="fecha_fin" class="form-control" id="recipient-name">
                <label for="message-text"  class="col-form-label">Cuotas totales:</label>
                <input readonly type="number" step="any" min="{{$alicuota->cuotas_totales}}" value="{{$alicuota->cuotas_totales}}" name="cuotas_totales" onkeyup="restar1();" onkeypress=" return solonum(event)"  class="form-control" id="cuotas_totales">
                <label for="message-text" class="col-form-label">Valor total:</label>
                <input readonly type="number" step="any" min="{{$alicuota->valor_total}}" value="{{$alicuota->valor_total}}"  name="valor_total" onkeyup="restar2();" onkeypress=" return solonum(event)" class="form-control" id="valor_total">
                <label for="message-text" class="col-form-label">Cuotas pagadas:</label>
                <input type="number" step="any" min="{{$alicuota->cuotas_pagadas}}" value="{{$alicuota->cuotas_pagadas}}" name="cuotas_pagadas" onkeyup="restar1();" onkeypress=" return solonum(event)" onchange="restar1()" class="form-control" id="cuotas_pagadas">
                <label for="message-text" class="col-form-label">Valor pagado:</label>
                <input type="number" step="any" min="{{$alicuota->valor_pagado}}" value="{{$alicuota->valor_pagado}}" name="valor_pagado"  onkeyup="restar2();" onkeypress=" return solonum(event)" onchange="restar2()"  class="form-control" id="valor_pagado">
                <label for="message-text" class="col-form-label">Cuotas adeudadas: </label>
                <input type="number" step="any"" value="{{$alicuota->cuotas_adeudadas}}" name="cuotas_adeudadas" readonly="readonly" id="total"onkeypress=" return solonum(event)"  class="form-control" >
                <label for="message-text" class="col-form-label">Valor Adeudado:</label>
                <input id="total2" type="number" step="any" " value="{{$alicuota->valor_adeudado}}" name="valor_adeudado" readonly="readonly" onkeypress=" return solonum(event)"class="form-control"  >
              </div>
              <button type="button" onclick="aumento()" class="btn btn-success"><i class="fas fa-plus-square"></i> Aumento</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
              <button type="reset" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar </button>
      
            </form>
      
    </div>
</div>

@endsection
<script>
  function restar1() {
    var total = 0;
    var valor=$("#cuotas_totales").val();
    valor = (valor == null || valor == undefined || valor == "") ? 0 : valor;
    total =valor- $("#cuotas_pagadas").val();
    total = (total == null || total == undefined || total == "") ? 0 : total;
    $("#total").val(total);

    
  }
  function restar2() {
    var total = 0;
    var valor=$("#valor_total").val();
    valor = (valor == null || valor == undefined || valor == "") ? 0 : valor;
    total =valor- $("#valor_pagado").val();
    total = (total == null || total == undefined || total == "") ? 0 : total;
    $("#total2").val(total);
  }

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
        function aumento(){
          
          var valor_cuota=parseFloat($("#cuotas_totales").val());
          var valor=parseFloat($("#valor_total").val());
          valor_cuota=valor_cuota+1;
          valor=valor+50;
         
          $("#cuotas_totales").val(valor_cuota);
          $("#valor_total").val(valor);
          this.restar1();
          this.restar2();
          swal("Recordatorio","Recuerde actualizar la Fecha final")
        }
</script>