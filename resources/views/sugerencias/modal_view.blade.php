


    <div class="modal fade" id="modalview-{{$sugerencia->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SUGERENCIA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('sugerencia.update', $sugerencia->id) }}" method="POST" class="mx-auto" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
              <div class="form-group">
                <label for="recipient-name"  class="col-form-label">TEMA:</label>
                <input readonly maxlength="90" value="{{$sugerencia->titulo}}" type="text" class="form-control" name="titulo" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">DESCRIPCION:</label>
                <textarea readonly maxlength="355" class="form-control" name="descripcion" id="message-text">{{$sugerencia->descripcion}}</textarea>
              </div>
              <div class="form-group">
                @if ($sugerencia->imagen!=null)
                <div>Evidencia Fotografica: </div>
                <center>                <img src="{{asset('img_sugerencia/'.$sugerencia->imagen)}}" width="70%" height="200px" alt="">  
                </center>
                @endif
              </div>
              <div class="form-group">
                <label for="recipient-name"  class="col-form-label">FECHA:</label>
                <input readonly maxlength="90" value="{{$sugerencia->created_at}}" type="text" class="form-control" name="titulo" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name"  class="col-form-label">ESTADO ACTUAL:</label>
               <input readonly class="form-control" type="text" value="{{$sugerencia->estado}}">
              </div>
              <div class="form-group">
                <label for="recipient-name"  class="col-form-label"> CAMBIAR ESTADO:</label>
                <select class="form-control" name="estado" id="">
                      <option selected value="PENDIENTE">PENDIENTE</option>
                  <option selected value="EN ATENCION">EN ATENCION</option>
                  <option selected value="SOLUCIONADO">SOLUCIONADO</option>
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Observacion:</label>
                <textarea  maxlength="300" class="form-control" name="observacion" id="message-text">{{$sugerencia->observacion}}</textarea>
                <center><small class="text-center" style="color: red">MAXIMO 300 LETRAS</small></center>

              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">GUARDAR CAMBIO</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    

    