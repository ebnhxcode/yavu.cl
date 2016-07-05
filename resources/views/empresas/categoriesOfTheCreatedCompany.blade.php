{!!Html::script('js/jquery.js')!!}
@extends('layouts.front')
@section('content')

  <div class="jumbotron">
    <div align="center" id="contentSemiMini">


      <h2>¡Solo un paso m&aacute;s!</h2>
      <h4>Asigna como m&aacute;ximo 3 categor&iacute;as tu empresa</h4>

      <div class="row">

        @foreach($categoryList as $key => $category)
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <span class="list-group-item category btn btn-default" id="category{!! $category->id !!}" value="{!! $category->id !!}" style="padding-bottom: 12px;padding-top: 6px;">
              {!! $category->category !!}
            </span>

          </div><!-- /div .col- -->
        @endforeach

        <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}"><!-- /input token -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h6>Permite que todos los usuarios en Yavü puedan encontrarte facilmente</h6>
          <a class="btn btn-success" style="width:100%;" href="/dashboard">Finalizar</a>
        </div><!-- /div .col- -->

      </div><!-- /div .row -->
    </div><!-- /div #contentMini -->
  </div><!-- /div .jumbotron -->

@stop

<script>

  $(document).ready(function(){
    $(".category").click(function(){
      var selectedCategory = $('#'+this.id);
      console.log(selectedCategory.attr('value'));
      selectedCategory.addClass('list-group-item-success').fadeIn().append('<span class="glyphicon glyphicon-ok"></span>').fadeIn();
      //console.log(selectedCategory.attr('value'));
      var token = $("#token").val();
      var route = "http://localhost:8000/agregarcategoria";
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data: {
          category_id: selectedCategory.attr('value'),
          empresa_id: '{!! $empresa->id !!}'
        },
        success:function(res){
          if(res==1)
            selectedCategory.removeClass('list-group-item-success').fadeIn();
        }
      });

      return true;


    });
  });

</script>