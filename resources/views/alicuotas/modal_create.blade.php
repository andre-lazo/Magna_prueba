
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



<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-danger text-white">
    <h5 class="modal-title" id="exampleModalLabel">NUEVO REGISTRO</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    
    {!! Form::open(['url' => '/alicuota']) !!}
    
    {{ Form::token() }}
    
      <div class="form-group">
        <label for="recipient-name" class="col-form-label">Residencia:</label>
        <select name="residencia" class="form-control">
          @foreach ($residencias as $residencia)
          <option value="{{$residencia->id}}">{{$residencia->residencia_id}}</option>
          @endforeach
        </select>
        <label for="message-text" class="col-form-label">Propietario:</label>
        <select name="propietario" class="form-control">
          @foreach ($usuarios as $usuario)
          <option value="{{$usuario->id}}">{{$usuario->name}}-{{$usuario->apellido}}-{{$usuario->cedula}}</option>
          @endforeach
        </select>
        <label for="message-text" class="col-form-label">Fecha inicio:</label>
        <input required type="date" name="fecha_inicio"  class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Fecha fin:</label>
        <input required type="date"  name="fecha_fin" class="form-control" id="recipient-name">
        <label for="message-text" class="col-form-label">Cuotas totales:</label>
        <input required type="text" name="cuotas_totales"  onkeyup="restar1();" onkeypress=" return solonum(event)" class="form-control" id="cuotas_totales">
        <label for="message-text" class="col-form-label">Valor total:</label>
        <input required type="text" name="valor_total" onkeypress=" return solonum(event)"  onkeyup="restar2();" class="form-control" id="valor_total">
        <label for="message-text" class="col-form-label">Cuotas pagadas:</label>
        <input required type="text" name="cuotas_pagadas"  onkeyup="restar1();" onkeypress=" return solonum(event)" class="form-control" id="cuotas_pagadas">
        <label for="message-text" class="col-form-label">Valor pagado:</label>
        <input required type="text" name="valor_pagado" onkeypress=" return solonum(event)"  onkeyup="restar2();" class="form-control" id="valor_pagado">
        <label  for="message-text" class="col-form-label">Cuotas adeudadas:</label>
        <input required id="total" type="text" name="cuotas_adeudadas" onkeypress=" return solonum(event)" class="form-control">
        <label for="message-text" class="col-form-label">Valor Adeudado:</label>
        <input required id="total2" type="text" name="valor_adeudado" onkeypress=" return solonum(event)" class="form-control" >
      </div>
    
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-danger">Guardar</button>
    </div>
    </div>
    </div>
    </div>
    {!! Form::close() !!}