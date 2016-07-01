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
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <span class="list-group-item category btn btn-default" id="category{!! $key !!}" value="{!! $key !!}" style="padding-bottom: 12px;padding-top: 6px;">
              Categor&iacute;a {!! $key+1 !!}
            </span>

          </div><!-- /div .col- -->
        @endforeach

        <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}"><!-- /input token -->

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
      var selectedCategory = $('#'+this.id);
      selectedCategory.addClass('list-group-item-success').fadeIn();
      //console.log(selectedCategory.attr('value'));
      var token = $("#token").val();
      var route = "http://localhost:8000/agregarinteres";
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data: {
          category_id: selectedCategory.attr('value'),
        },
        success:function(){
          console.log('pasó');
        }
      });

      return true;


    });
  });

</script>