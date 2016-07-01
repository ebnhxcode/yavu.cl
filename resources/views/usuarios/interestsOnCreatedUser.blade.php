{!!Html::script('js/jquery.js')!!}
@extends('layouts.front')
@section('content')

  <div class="jumbotron">
    <div align="center" id="contentSemiMini">


        <h2>¡Solo un paso m&aacute;s!</h2>
        <h3>¿Que intereses tienes?</h3>

        <div class="softText-descriptions">
          Selecciona <strong>todo</strong> lo que te pueda atraer
        </div>

      <div class="row">

        @foreach($n as $key => $nn)
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">

            <span class="category btn list-group-item" id="category{!! $key !!}">
              Categor&iacute;a {!! $key+1 !!}
            </span>

          </div><!-- /div .col- -->
        @endforeach



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h6>Te Queremos dar una mejor experiencia en Yavü</h6>
        </div><!-- /div .col- -->

      </div><!-- /div .row -->
    </div><!-- /div #contentMini -->
  </div><!-- /div .jumbotron -->

@stop

<script>

  $(document).ready(function(){
    $(".category").click(function(){
      $('#'+this.id).addClass('list-group-item-success').fadeIn();

      //console.log(this.addClass(this.id,'list-group-item-success'));
    });
  });

</script>