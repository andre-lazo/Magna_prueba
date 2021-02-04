<div class="container pt-5">
    <button type="button" class="animate__animated animate__fadeInRightBig btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-folder-plus"></i> Añadir Sugerencia</button>
    </div>
    
    
    {!! Form::open(['url'=> 'sugerencias', 'files' => true]) !!}
    
    {{ Form::token() }}
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVA SUGERENCIA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name"  class="col-form-label">TITULO:</label>
                <input required maxlength="90" type="text" class="form-control" name="titulo" id="recipient-name">
                <center><small class="text-center" style="color: red">MAXIMO 90 LETRAS</small></center>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">DESCRIPCION:</label>
                <textarea required maxlength="355" class="form-control" name="descripcion" id="message-text"></textarea>
                <center><small class="text-center" style="color: red">MAXIMO 355 LETRAS</small></center>
              </div>
              <div class="form-group">
                  <label for="">(OPCIONAL)</label>
                <label for="message-text" class="col-form-label">IMAGEN:</label>
                <input type="file" name="imagen" class="form-control">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">GUARDAR SUGERENCIA</button>
          </div>
        </div>
      </div>
    </div>
    
    {!! Form::close() !!}
    