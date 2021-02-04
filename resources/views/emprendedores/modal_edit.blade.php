    
    
    
    <div class="modal fade" id="modal-{{$emprendedor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR PUBLICACIÓN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('emprendedores.update', $emprendedor->id) }}" method="POST" class="mx-auto" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
              <div class="form-group">
                <label for="recipient-name"  class="col-form-label">TITULO:</label>
                <input required maxlength="90" type="text" class="form-control" value="{{$emprendedor->titulo}} "name="titulo" id="recipient-name">
                <center><small class="text-center" style="color: red">MAXIMO 90 LETRAS</small></center>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">DESCRIPCION:</label>
                <textarea required maxlength="355" class="form-control" name="descripcion" id="message-text">{{$emprendedor->descripcion}}</textarea>
                <center><small class="text-center" style="color: red">MAXIMO 355 LETRAS</small></center>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">CATEGORIA:</label>
                <select name="categoria" id="" class="form-control">
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
                <option selected value="{{$emprendedor->categoria}}">{{$emprendedor->categoria}}</option>
              </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">(OPCIONAL)VALOR:</label>
                <input  type="number" value="{{$emprendedor->valor}}" class="form-control" name="valor">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">TELEFONO:</label>
                <input required  type="text"  maxlength="10" onkeypress=" return solonum(event)" value="{{$emprendedor->telefono}}"" class="form-control" name="telefono">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">IMAGEN:</label>
                <input accept="image/*"  type="file" name="imagen" class="form-control">
              </div>
              <center> @if($emprendedor->imagen!="")
                <img src="{{asset('/img_emprendedor/'.$emprendedor->imagen)}}" alt="{{$emprendedor->imagen}}" height="100px" width="100px"> 
                @endif</center>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    
    
    