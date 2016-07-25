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
        <th>Nombre empresa</th>
        <th>Email empresa</th>
      </thead>
      <tbody>
        @foreach($users as $key => $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nombre.' '.$user->nombre}}</td>
            <td>{{$user->email}}</td>
            <td>
              @foreach($user->empresas as $key => $company)

                <b>{{$company->nombre}}</b>{{--<a href="#!" style="float:right;"><small>editar</small></a>--}}
                <br>

              @endforeach
            </td>
            <td>
            @foreach($user->empresas as $key => $company)

                <b>{{$company->email}}</b>{{--<a href="#!" style="float:right;"><small>editar</small></a>--}}
                <br>

            @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!!$users->render()!!}
  </div><!-- /div .list-group-item -->

  <div class="list-group-item">

  </div><!-- /div .list-group-item -->

</section><!-- /section #usersList .list-group -->
<style>
  @-moz-document url-prefix() {
    fieldset { display: table-cell; }
  }
</style>