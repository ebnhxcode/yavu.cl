<div class="modal fade" id="ModalGanadorSorteo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Sortear al ganador </h4>
      </div>

      <div class="modal-body" id="body-sorteo">

        <div class="row">

          <div style="text-align: center;" class="col-md-8">
            <h2><span id="Tiempo">¡Empezó el sorteo!</span></h2>
            <div id="Detalles"></div>


          </div>

          <div style="text-align: center;" class="col-md-4">
            Premio:
            @if($sorteo->imagen_sorteo === "")
              <img class="img-responsive-centered" width="40%" src="https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg" alt="" />
            @else
              <img class="img-responsive-centered" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt="" />
            @endif
          </div>

        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>