<div class="list-group">
  <div class="list-group-item list-group-item-success">
    COMPRA TUS TICKET'S A <span class="label label-warning">$ 100</span>
  </div><!-- /div .list-group-item .success -->
  <div class="list-group-item">
    {!!Form::select('size', [1=>1,5=>5,10=>10,15=>15], null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control'])!!}
    <br>
    <button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-md comprar">Comprar ticket</button>
    <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
    <input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" />
  </div><!-- /div .list-group-item -->
</div> <!-- /list group -->
@if(Auth::admin()->check())
  @include('sorteos.forms.vistaListaAdmin')
@else
  @include('sorteos.forms.vistaListaUsuario', array('sorteos' => $sorteos))
@endif