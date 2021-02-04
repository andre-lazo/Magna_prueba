{!! Form::open(['url' => 'noticia', 'files' => true]) !!}
        {{FORM::token()}}  
<div class="modal fade" data-backdrop="static" id="noticia_nueva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">INGRESO DE NOTICIAS</h5>
         
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">TITULO DE NOTICIA:</label>
              <input required type="text" class="form-control" name="titulo" id="recipient-name">
            
           
             
              <label for="message-text" class="col-form-label">CONTENIDO DE PREVIO:</label><br>
              <center><textarea required  maxlength="350" name="previo" class="form-comtrol" style="width: 100%;" id="" cols="10" rows="5"></textarea>
                <span class="text-danger"> maximo de caracteres permitidos: 350</span>
            </center>
              <br>
              <label for="message-text" class="col-form-label">CONTENIDO COMPLETO:</label><br>
              <center><textarea required  class="form-comtrol" name="completo" style="width: 100%;" id="" cols="30" rows="10"></textarea>
              </center>
              <br><label for="message-text" class="col-form-label">IMAGEN:</label>
              <input required  type="file" class="form-control" name="imagen" id="recipient-name">
              <span class="text-danger"> Formatos admitidos: jpeg,jpg,png</span>

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