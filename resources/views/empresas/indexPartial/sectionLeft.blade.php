<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          B&uacute;squeda por ciudad y nombre
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">

        {!!Form::open(['action'=>'EmpresaController@BuscarEmpresas', 'method'=>'POST'])!!}

        <span class="softText-descriptions">
          Seleccione la ciudad
        </span>

        {!!Form::select('ciudad',
              ['Región de Arica y Parinacota' =>
                ['Arica' => 'Arica',
                'Putre' => 'Putre'],
              'Región de Tarapacá' =>
                ['Iquique' => 'Iquique',
                'Alto Hospicio' => 'Alto Hospicio',
                'Pica' => 'Pica'],
              'Región de Antofagasta' =>
                ['Antofagasta' => 'Antofagasta',
                'Mejillones' => 'Mejillones',
                'Taltal' => 'Taltal',
                'Calama' => 'Calama',
                'Ollagüe' => 'Ollagüe',
                'San Pedro de Atacama' => 'San Pedro de Atacama',
                'Tocopilla' => 'Tocopilla'],
              'Región de Atacama' =>
                ['Copiapó' => 'Copiapó',
                'Caldera' => 'Caldera',
                'El Salvador' => 'El Salvador',
                'Chañaral' => 'Chañaral',
                'Diego de Almagro' => 'Diego de Almagro',
                'Vallenar' => 'Vallenar',
                'Huasco' => 'Huasco'],
              'Región de Coquimbo' =>
                ['La Serena' => 'La Serena',
                'Coquimbo' => 'Coquimbo',
                'Vicuña' => 'Vicuña',
                'Illapel' => 'Illapel',
                'Los Vilos' => 'Los Vilos',
                'Ovalle' => 'Ovalle',
                'Combarbalá' => 'Combarbalá'],
              'Región de Valparaiso' =>
                ['Valparaiso' => 'Valparaiso',
                'Viña del Mar' => 'Viña del Mar',
                'Casablanca' => 'Casablanca',
                'Concón' => 'Concón',
                'San Felipe' => 'San Felipe',
                'Olmué' => 'Olmué',
                'Villa Alemana' => 'Villa Alemana',
                'Quilpué' => 'Quilpué',
                'Los Andes' => 'Los Andes',
                'La Ligua' => 'La Ligua',
                'Papudo' => 'Papudo',
                'Zapallar' => 'Zapallar',
                'Quillota' => 'Quillota',
                'Calera' => 'Calera',
                'San Antonio' => 'San Antonio',
                'Algarrobo' => 'Algarrobo',
                'Cartagena' => 'Cartagena'],
              'Región Metropolitana' =>
                ['Colina' => 'Colina',
                'Melipilla' => 'Melipilla',
                'San José de Maipo' => 'San José de Maipo',
                'Santiago' => 'Santiago',
                'Cerrillos' => 'Cerrillos',
                'Cerro Navia' => 'Cerro Navia',
                'Conchalí' => 'Conchalí',
                'El Bosque' => 'El Bosque',
                'Estación Central' => 'Estación Central',
                'Huechuraba' => 'Huechuraba',
                'Independencia' => 'Independencia',
                'La Cisterna' => 'La Cisterna',
                'La Florida' => 'La Florida',
                'La Granja' => 'La Granja',
                'La Pintana' => 'La Pintana',
                'La Reina' => 'La Reina',
                'Las Condes' => 'Las Condes',
                'Lo Barnechea' => 'Lo Barnechea',
                'Lo Espejo' => 'Lo Espejo',
                'Lo Prado' => 'Lo Prado',
                'Macul' => 'Macul',
                'Maipú' => 'Maipú',
                'Ñuñoa' => 'Ñuñoa',
                'Pedro Aguirre Cerda' => 'Pedro Aguirre Cerda',
                'Peñalolén' => 'Peñalolén',
                'Providencia' => 'Providencia',
                'Pudahuel' => 'Pudahuel',
                'Quilicura' => 'Quilicura',
                'Quinta Normal' => 'Quinta Normal',
                'Recoleta' => 'Recoleta',
                'Renca' => 'Renca',
                'San Joaquín' => 'San Joaquín',
                'San Miguel' => 'San Miguel',
                'San Ramón' => 'San Ramón',
                'Vitacura' => 'Vitacura'],
              'Región de O Higgins' =>
                ['Rancagua' => 'Rancagua',
                'Rengo' => 'Rengo',
                'San Fernando' => 'San Fernando',
                'Pichilemu' => 'Pichilemu',
                'Santa Cruz' => 'Santa Cruz',
                'San Vicente' => 'San Vicente',
                'Chimbarongo' => 'Chimbarongo'],
              'Región del Maule' =>
                ['Curicó' => 'Curicó',
                'Talca' => 'Talca',
                'Constitución' => 'Constitución',
                'Linares' => 'Linares',
                'Cauquenes' => 'Cauquenes',
                'Maule' => 'Maule',
                'Parral' => 'Parral',
                'Molina' => 'Molina',
                'San Clemente' => 'San Clemente',
                'San Rafael' => 'San Rafael'],
              'Región del Biobío' =>
                ['Chillán' => 'Chillán',
                'Concepción' => 'Concepción',
                'Los Ángeles' => 'Los Ángeles',
                'Talcahuano' => 'Talcahuano',
                'Coronel' => 'Coronel',
                'Chiguayante' => 'Chiguayante',
                'Curanilahue' => 'Curanilahue',
                'Lebu' => 'Lebu',
                'San Rosendo' => 'San Rosendo',
                'Bulnes' => 'Bulnes',
                'Cobquecura' => 'Cobquecura'],
              'Región de la Araucanía' =>
                ['Temuco' => 'Temuco',
                'Angol' => 'Angol',
                'Puerto Saavedra' => 'Puerto Saavedra',
                'Villarrica' => 'Villarrica',
                'Pucón' => 'Pucón',
                'Lonquimay' => 'Lonquimay',
                'Collipulli' => 'Collipulli'],
              'Región de Los Ríos' =>
                ['Valdivia' => 'Valdivia',
                'Panguipulli' => 'Panguipulli',
                'La Unión' => 'La Unión',
                'Río Bueno' => 'Río Bueno',
                'Lago Ranco' => 'Lago Ranco'],
              'Región de Los Lagos' =>
                ['Osorno' => 'Osorno',
                'Puerto Montt' => 'Puerto Montt',
                'Ancud' => 'Ancud',
                'Castro' => 'Castro',
                'Cochamó' => 'Cochamó',
                'Quellón' => 'Quellón',
                'Chaitén' => 'Chaitén',
                'Frutillar' => 'Frutillar',
                'LLanquihue' => 'Llanquihue',
                'Futaleufú' => 'Futaleufú'],
              'Región de Aysén' =>
                ['Melinka' => 'Melinka',
                'Lago Verde' => 'Lago Verde',
                'Puerto Cisnes' => 'Puerto Cisnes',
                'Puerto Aysén' => 'Puerto Aysén',
                'Coyhaique' => 'Coyhaique',
                'Balmaceda' => 'Balmaceda',
                'Puerto Ibañez' => 'Puerto Ibañez',
                'Chile Chico' => 'Chile Chico',
                'Cochrane' => 'Cochrane',
                'Caleta Tortel' => 'Caleta Tortel',
                'Villa O Higgins' => 'Villa O Higgins'],
              'Región de Magallanes y la Antártica' =>
                ['Torres del Paine' => 'Torres del Paine',
                'Puerto Natales' => 'Puerto Natales',
                'Punta Arenas' => 'Punta Arenas',
                'Porvenir' => 'Porvenir',
                'Puerto Williams' => 'Puerto Williams']],
              $selected = null, ['class' => 'form-control', 'required' => 'required'])!!}

        <span class="softText-descriptions">
          Agregue texto de referencia
        </span>

        <div class="input-group input-group-sm">
          {!!Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Buscar empresas', 'aria-describedby' => 'sizing-addon1', 'required'])!!}
          <span class="input-group-addon" id="sizing-addon1">
            <span class="glyphicon glyphicon-search" data-toggle="tooltip" data-placement="right" title="Presiona enter!"></span><!-- /span .glyphicon .glyphicon-search -->
          </span><!-- /span .input-group-addon #sizing-addon1 -->
        </div><!-- /div .input-group .input-group-lg -->

        {!! csrf_field() !!}

        <br><button type="submit" class="btn btn-success" style="width:100%;">Buscar</button>

        {!!Form::close()!!}

      </div>
    </div>
  </div>



  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Resultados por ciudad
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">

        {!!Form::open(['action'=>'EmpresaController@searchCompanyByCity', 'method'=>'POST', 'id' => 'searchCompanyByCity'])!!}

        <span class="softText-descriptions">
          Seleccione la ciudad
        </span>

        {!!Form::select('ciudad',
              ['Región de Arica y Parinacota' =>
                ['Arica' => 'Arica',
                'Putre' => 'Putre'],
              'Región de Tarapacá' =>
                ['Iquique' => 'Iquique',
                'Alto Hospicio' => 'Alto Hospicio',
                'Pica' => 'Pica'],
              'Región de Antofagasta' =>
                ['Antofagasta' => 'Antofagasta',
                'Mejillones' => 'Mejillones',
                'Taltal' => 'Taltal',
                'Calama' => 'Calama',
                'Ollagüe' => 'Ollagüe',
                'San Pedro de Atacama' => 'San Pedro de Atacama',
                'Tocopilla' => 'Tocopilla'],
              'Región de Atacama' =>
                ['Copiapó' => 'Copiapó',
                'Caldera' => 'Caldera',
                'El Salvador' => 'El Salvador',
                'Chañaral' => 'Chañaral',
                'Diego de Almagro' => 'Diego de Almagro',
                'Vallenar' => 'Vallenar',
                'Huasco' => 'Huasco'],
              'Región de Coquimbo' =>
                ['La Serena' => 'La Serena',
                'Coquimbo' => 'Coquimbo',
                'Vicuña' => 'Vicuña',
                'Illapel' => 'Illapel',
                'Los Vilos' => 'Los Vilos',
                'Ovalle' => 'Ovalle',
                'Combarbalá' => 'Combarbalá'],
              'Región de Valparaiso' =>
                ['Valparaiso' => 'Valparaiso',
                'Viña del Mar' => 'Viña del Mar',
                'Casablanca' => 'Casablanca',
                'Concón' => 'Concón',
                'San Felipe' => 'San Felipe',
                'Olmué' => 'Olmué',
                'Villa Alemana' => 'Villa Alemana',
                'Quilpué' => 'Quilpué',
                'Los Andes' => 'Los Andes',
                'La Ligua' => 'La Ligua',
                'Papudo' => 'Papudo',
                'Zapallar' => 'Zapallar',
                'Quillota' => 'Quillota',
                'Calera' => 'Calera',
                'San Antonio' => 'San Antonio',
                'Algarrobo' => 'Algarrobo',
                'Cartagena' => 'Cartagena'],
              'Región Metropolitana' =>
                ['Colina' => 'Colina',
                'Melipilla' => 'Melipilla',
                'San José de Maipo' => 'San José de Maipo',
                'Santiago' => 'Santiago',
                'Cerrillos' => 'Cerrillos',
                'Cerro Navia' => 'Cerro Navia',
                'Conchalí' => 'Conchalí',
                'El Bosque' => 'El Bosque',
                'Estación Central' => 'Estación Central',
                'Huechuraba' => 'Huechuraba',
                'Independencia' => 'Independencia',
                'La Cisterna' => 'La Cisterna',
                'La Florida' => 'La Florida',
                'La Granja' => 'La Granja',
                'La Pintana' => 'La Pintana',
                'La Reina' => 'La Reina',
                'Las Condes' => 'Las Condes',
                'Lo Barnechea' => 'Lo Barnechea',
                'Lo Espejo' => 'Lo Espejo',
                'Lo Prado' => 'Lo Prado',
                'Macul' => 'Macul',
                'Maipú' => 'Maipú',
                'Ñuñoa' => 'Ñuñoa',
                'Pedro Aguirre Cerda' => 'Pedro Aguirre Cerda',
                'Peñalolén' => 'Peñalolén',
                'Providencia' => 'Providencia',
                'Pudahuel' => 'Pudahuel',
                'Quilicura' => 'Quilicura',
                'Quinta Normal' => 'Quinta Normal',
                'Recoleta' => 'Recoleta',
                'Renca' => 'Renca',
                'San Joaquín' => 'San Joaquín',
                'San Miguel' => 'San Miguel',
                'San Ramón' => 'San Ramón',
                'Vitacura' => 'Vitacura'],
              'Región de O Higgins' =>
                ['Rancagua' => 'Rancagua',
                'Rengo' => 'Rengo',
                'San Fernando' => 'San Fernando',
                'Pichilemu' => 'Pichilemu',
                'Santa Cruz' => 'Santa Cruz',
                'San Vicente' => 'San Vicente',
                'Chimbarongo' => 'Chimbarongo'],
              'Región del Maule' =>
                ['Curicó' => 'Curicó',
                'Talca' => 'Talca',
                'Constitución' => 'Constitución',
                'Linares' => 'Linares',
                'Cauquenes' => 'Cauquenes',
                'Maule' => 'Maule',
                'Parral' => 'Parral',
                'Molina' => 'Molina',
                'San Clemente' => 'San Clemente',
                'San Rafael' => 'San Rafael'],
              'Región del Biobío' =>
                ['Chillán' => 'Chillán',
                'Concepción' => 'Concepción',
                'Los Ángeles' => 'Los Ángeles',
                'Talcahuano' => 'Talcahuano',
                'Coronel' => 'Coronel',
                'Chiguayante' => 'Chiguayante',
                'Curanilahue' => 'Curanilahue',
                'Lebu' => 'Lebu',
                'San Rosendo' => 'San Rosendo',
                'Bulnes' => 'Bulnes',
                'Cobquecura' => 'Cobquecura'],
              'Región de la Araucanía' =>
                ['Temuco' => 'Temuco',
                'Angol' => 'Angol',
                'Puerto Saavedra' => 'Puerto Saavedra',
                'Villarrica' => 'Villarrica',
                'Pucón' => 'Pucón',
                'Lonquimay' => 'Lonquimay',
                'Collipulli' => 'Collipulli'],
              'Región de Los Ríos' =>
                ['Valdivia' => 'Valdivia',
                'Panguipulli' => 'Panguipulli',
                'La Unión' => 'La Unión',
                'Río Bueno' => 'Río Bueno',
                'Lago Ranco' => 'Lago Ranco'],
              'Región de Los Lagos' =>
                ['Osorno' => 'Osorno',
                'Puerto Montt' => 'Puerto Montt',
                'Ancud' => 'Ancud',
                'Castro' => 'Castro',
                'Cochamó' => 'Cochamó',
                'Quellón' => 'Quellón',
                'Chaitén' => 'Chaitén',
                'Frutillar' => 'Frutillar',
                'LLanquihue' => 'Llanquihue',
                'Futaleufú' => 'Futaleufú'],
              'Región de Aysén' =>
                ['Melinka' => 'Melinka',
                'Lago Verde' => 'Lago Verde',
                'Puerto Cisnes' => 'Puerto Cisnes',
                'Puerto Aysén' => 'Puerto Aysén',
                'Coyhaique' => 'Coyhaique',
                'Balmaceda' => 'Balmaceda',
                'Puerto Ibañez' => 'Puerto Ibañez',
                'Chile Chico' => 'Chile Chico',
                'Cochrane' => 'Cochrane',
                'Caleta Tortel' => 'Caleta Tortel',
                'Villa O Higgins' => 'Villa O Higgins'],
              'Región de Magallanes y la Antártica' =>
                ['Torres del Paine' => 'Torres del Paine',
                'Puerto Natales' => 'Puerto Natales',
                'Punta Arenas' => 'Punta Arenas',
                'Porvenir' => 'Porvenir',
                'Puerto Williams' => 'Puerto Williams']],
              $selected = null, ['class' => 'form-control', 'required' => 'required'])!!}

        {!! csrf_field() !!}

        {!!Form::close()!!}

        <script>

          $(document).ready(function(){
            $("#CityOnly").on('change', function(){
              $("#searchCompanyByCity").submit();
            });

          });

        </script>

      </div>
    </div>
  </div>
</div>
  {{--
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Resultados por categor&iacute;a
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

        here

      </div>
    </div>
  </div>


--}}

{{--
<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Filtros de b&uacute;squeda
  </div>

  <div class="list-group-item">





  </div>
  <div class="list-group-item">

  </div>
</div>
--}}








@include('miniDashboard.miniDashboard')

<div class="visible-lg visible-md">
  @if(count($bannersRandomLeft)>0)
    @include('listarBanner.listaBanner')
  @endif
</div>














{{--
<div class="list-group">

  <div class="list-group-item list-group-item-success">
    <h5>ÚLTIMOS 10 SORTEOS PENDIENTES / FINALIZADOS
      <span id="resizeCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;">
      </span><!-- /div #resizeCourses -->
    </h5>
  </div><!-- /div .list-group-item .success -->

  <script>
    $('#resizeCourses').click(function(){
      if($(this).attr('name') == 'small'){
        $('#insideCourses').removeClass('wrap');
        $('#insideCourses').addClass('wrap-long-vertical');
        $(this).removeClass('glyphicon-resize-full');
        $(this).addClass('glyphicon-resize-small');
        $(this).attr('name', 'long');
        return true;
      }else{
        $('#insideCourses').removeClass('wrap-long-vertical');
        $('#insideCourses').addClass('wrap');
        $(this).removeClass('glyphicon-resize-small');
        $(this).addClass('glyphicon-resize-full');
        $(this).attr('name', 'small');
        return true;
      }
    });
  </script><!-- /script for accion with #resizeCourses  -->
  <div id="insideCourses" class="list-group-item wrap">
    <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
      <thead>
      <th>Nombre</th>
      <th>Empresa</th>
      <th>Estado</th>
      <th>Accion</th>
      </thead>
      @foreach($sorteos as $sorteo)
        <tbody>
        @if($sorteo->estado_sorteo != 'Pendiente')
          <td>{!! $sorteo->nombre_sorteo !!}</td>
          <td>{!! $sorteo->nombre_empresa !!}</td>
          <td>{!!$sorteo->estado_sorteo!!}</td>
          @if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Pendiente')
            <td><a class="btn btn-primary" href="{!!URL::to('/sorteos/'.$sorteo->id.'/edit')!!}">Editar</a></td>
          @else
            @if($sorteo->estado_sorteo == 'Finalizado')
              <td><a class="btn btn-warning" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
            @elseif($sorteo->estado_sorteo == 'Activo')
              <td><a class="btn btn-success" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
            @else
              <td><a class="btn btn-danger" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
            @endif
          @endif
        @endif
        </tbody>
      @endforeach
    </table>
  </div> <!-- /div #insideCourses .list-group-item .wrap -->
</div><!-- /div .list-group -->
--}}