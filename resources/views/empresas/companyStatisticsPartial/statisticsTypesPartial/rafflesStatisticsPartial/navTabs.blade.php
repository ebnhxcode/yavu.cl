<!-- Nav tabs -->
<ul class="nav nav-pills nav-stacked" role="tablist">
  <li role="presentation" class="active">
    <a href="#general" aria-controls="home" role="tab" data-toggle="tab">
      <div>
        <small>General</small>
      </div>
    </a>
  </li>

  <li role="presentation">
    <a href="#actives" aria-controls="messages" role="tab" data-toggle="tab">
      <div>
        <small>Activos (<b>{{count($rafflesActive)}}</b>)</small>
      </div>
    </a>
  </li>

  <li role="presentation">
    <a href="#pending" aria-controls="messages" role="tab" data-toggle="tab">
      <div>
        <small>Pendientes (<b>{{count($rafflesPending)}}</b>)</small>
      </div>
    </a>
  </li>

  <li role="presentation">
    <a href="#ended" aria-controls="messages" role="tab" data-toggle="tab">
      <div>
        <small>Finalizados (<b>{{count($rafflesEnded)}}</b>)</small>
      </div>
    </a>
  </li>

  <li role="presentation">
    <a href="#requests" aria-controls="messages" role="tab" data-toggle="tab">
      <div>
        <small>Peticiones (<b>{{count($raffleRaquests)}}</b>)</small>
      </div>
    </a>
  </li>

  {{--
    <li role="presentation">
      <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
        Settings
      </a>
    </li>
  --}}

</ul>