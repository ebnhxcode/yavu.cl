<div class="modal fade" id="ModalGanadorSorteo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Sortear al ganador </h4>
      </div><!-- /div .modal-header -->
      <div class="modal-body" id="body-sorteo">
        <div class="row">
          <div style="text-align: center;" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            Premio:
            <div class="thumbnail">
              <img src='{!! isset($sorteo)?($sorteo->imagen_sorteo!='')?'/img/users/'.$sorteo->imagen_sorteo:'https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg':'' !!}' width=100%>
            </div><!-- /div .thumbnail -->
          </div><!-- /div .col-md4-sm12-xs12 -->
          <div style="text-align: center;" class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <h2>
              <span id="Tiempo">¡Empezó el sorteo!</span><!-- /span #Tiempo -->
            </h2>
            <div id="Detalles"></div><!-- /div #Detalles -->
          </div><!-- /div .col-md8-sm12-xs12 -->
        </div><!-- /div .row -->
      </div><!-- /div .modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div><!-- /div .modal-footer -->
    </div><!-- /div .modal-content -->
  </div><!-- /div .modal-dialog -->
</div><!-- /div #ModalGanadorSorteo .modal .fade -->