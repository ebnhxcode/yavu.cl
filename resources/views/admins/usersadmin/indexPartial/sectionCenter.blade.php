<section id="usersList" class="list-group">

  <div class="list-group-item">
    <small>LISTA DE USUARIOS</small>
  </div><!-- /div .list-group-item -->

  <div class="list-group-item table-responsive wrap">

    <table class="table table-condensed table-striped"  style="font-size: 0.7em;">

      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Fecha registro usuario</th>
        <th>Nombre empresa</th>
        <th>Email empresa</th>
        <th>Fecha registro empresa</th>
      </thead>
      <tbody>
        @foreach($users as $key => $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nombre.' '.$user->apellido}}</td>
            <td>{{$user->email}}</td>
            <td>
              <small>{{$user->created_at}}</small>
            </td>
            <td>
              @foreach($user->empresas as $key => $company)
                <b>{{$company->nombre}}<br></b>{{--<a href="#!" style="float:right;"><small>editar</small></a>--}}

              @endforeach
            </td>
            <td>
              @foreach($user->empresas as $key => $company)
                <b>{{$company->email}}<br></b>{{--<a href="#!" style="float:right;"><small>editar</small></a>--}}
              @endforeach
            </td>
            <td>
              @foreach($user->empresas as $key => $company)
                <small>{{$company->created_at}}</small>
              @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div><!-- /div .list-group-item -->

  <div class="list-group-item">
    {!!$users->render()!!}
  </div><!-- /div .list-group-item -->

</section><!-- /section #usersList .list-group -->
<style>
  @-moz-document url-prefix() {
    fieldset { display: table-cell; }
  }
</style>