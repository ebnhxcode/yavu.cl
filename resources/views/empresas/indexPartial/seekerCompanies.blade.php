<div id="seeker" class="row">

  <div id="seekbar" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="list-group">
      <div class="">
        {!!Form::open(['route'=>'search_company_engine', 'method'=>'POST'])!!}
        @if(Auth::admin()->check())
          {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'Buscar sorteo','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
        @elseif(Auth::user()->check())
          <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
          <div align="middle" class="softText-descriptions-middle text-info">
            <h6>BUSCAR POR REFERENCIA</h6>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon1">
              <span class="glyphicon glyphicon-search">
              </span><!-- /span .glyphicon .glyphicon-search -->
            </span><!-- /span .input-group-addon #sizing-addon1 -->
            {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'nombre, marca, etc..','id'=>'empresathumb', 'aria-describedby' => 'sizing-addon1'])!!}
          </div><!-- /div .input-group .input-group-lg -->

          <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
        @endif
        {!!Form::close()!!}
      </div><!-- /div .list-group-item -->
    </div> <!-- /list group -->
  </div><!-- /div col-lg6-md6-sm6-xs12 -->

  <div id="filterCity" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
    {!!Form::open(['action'=>'EmpresaController@searchCompanyByCity', 'method'=>'POST', 'id' => 'searchCompanyByCity'])!!}
    <div align="middle" class="softText-descriptions-middle text-info">
      <h6>BUSCAR POR CIUDAD</h6>
    </div>
    {!!Form::select('ciudad',
          [''=>'Seleccione ciudad...',
          'Región de Arica y Parinacota' =>
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
          $selected = null, ['class' => 'form-control', 'required' => 'required', 'id' => 'CityOnly'])!!}

    {!! csrf_field() !!}

    {!!Form::close()!!}

    <script>

      $(document).ready(function(){
        $("#CityOnly").on('change', function(){
          $("#searchCompanyByCity").submit();
        });

      });

    </script>
  </div><!-- /div col-lg6-md6-sm6-xs12 -->

  <div id="CategoryOnly" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
    {!!Form::open(['action'=>'EmpresaController@searchCompanyByCategory', 'method'=>'POST', 'id' => 'searchCompanyByCategory'])!!}
    <div align="middle" class="softText-descriptions-middle text-info">
      <h6>BUSCAR POR CATEGORÍA</h6>
    </div>
      <select name="category" id="category" class="form-control">
        <option>Seleccione categoría</option>
        @foreach($categories as $key => $category)
          <option value="{{$category->id}}">{{$category->category}}</option>
        @endforeach
      </select>
      {!! csrf_field() !!}

    {!!Form::close()!!}

    <script>

      $(document).ready(function(){
        $("#CategoryOnly").on('change', function(){
          $("#searchCompanyByCategory").submit();
        });

      });

    </script>
  </div><!-- /div col-lg6-md6-sm6-xs12 -->

  <div id="OrderBy" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
    {!!Form::open(['action'=>'EmpresaController@searchCompanyByOrder', 'method'=>'POST', 'id' => 'searchCompanyByOrder'])!!}
    <div align="middle" class="softText-descriptions-middle text-info">
      <h6>ORDENAR POR</h6>
    </div>
    <select name="order" id="order" class="form-control">
      <option>Seleccione orden</option>
      <option value="1">Las más nuevas</option>
    </select>
    {!! csrf_field() !!}

    {!!Form::close()!!}

    <script>

      $(document).ready(function(){
        $("#OrderBy").on('change', function(){
          $("#searchCompanyByOrder").submit();
        });

      });

    </script>
  </div><!-- /div col-lg6-md6-sm6-xs12 -->

</div><!-- .row -->