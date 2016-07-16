<div class="panel panel-default">
  <div class="panel-heading"><h4>Mantenedor de categoria</h4></div>
  <div class="panel-body">
    <table class="table">
      <thead>
      <th>Nombre categoria</th>
      <th>Tipo Categoria</th>
      </thead>
      @if(isset($categorias))
        @foreach($categorias as $categoria)
          <tbody>
          <td>{!!$categoria->category!!}</td>
          <td>{!!$categoria->description!!}</td>
          <td>{!!link_to_route('categorias.edit', $title = 'Editar', $parameters = $categoria->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
        @endforeach
      @endif

    </table><!-- /table .table -->
  </div><!-- /div .panel-body -->
</div><!-- /div .panel .panel-default -->