    
    
    
    <div class="modal fade" id="modal-{{$emprendimiento->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">NUEVA PUBLICACIÓN</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  method="POST" class="mx-auto" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="recipient-name"  class="col-form-label">TITULO:</label>
                  <input readonly maxlength="90" type="text" class="form-control" value="{{$emprendimiento->titulo}} "name="titulo" id="recipient-name">
                  <center><small class="text-center" style="color: red">MAXIMO 90 LETRAS</small></center>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">DESCRIPCION:</label>
                  <textarea readonly maxlength="355" class="form-control" name="descripcion" id="message-text">{{$emprendimiento->descripcion}}</textarea>
                  <center><small class="text-center" style="color: red">MAXIMO 355 LETRAS</small></center>
                </div>
               
            
               @if ($emprendimiento->valor!=NULL)
               <div class="form-group">
                <label for="message-text" class="col-form-label">VALOR:</label>
                <input  type="number" readonly value="{{$emprendimiento->valor}}" class="form-control" name="valor">
              </div>
               @endif
                <div class="form-group">
                  <label for="message-text" class="col-form-label">TELEFONO:</label>
                  <input readonly type="text" readonly  maxlength="10" onkeypress=" return solonum(event)" value="{{$emprendimiento->telefono}}"" class="form-control" name="telefono">
                </div>
                
                <center> @if($emprendimiento->imagen!="")
                  <img src="{{asset('/img_emprendedor/'.$emprendimiento->imagen)}}" alt="{{$emprendimiento->imagen}}" height="200px" width="200px"> 
                  @endif</center>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            
            </div>
          </div>
        </div>
      </div>
      
      
      