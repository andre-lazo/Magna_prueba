<div class="modal fade" data-backdrop="static" id="modal-{{$emprendedor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title text-center" id="exampleModalLabel">DESCRIPCION</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                @if ($emprendedor->valor!=NULL)
                <p class="card-text h5">VALOR:$ {{$emprendedor->valor}}</p>
                @endif
                <p>{{$emprendedor->descripcion}}</p>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
  </div>
