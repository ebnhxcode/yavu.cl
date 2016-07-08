
	<div class="container">

    <!-- Información básica -->
			{{--@include('usuarios.indexPartial.fieldsUserCompletePartial.basicFields')--}}
    <!-- End Información básica -->




    @if (!Auth::user()->check())

      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::hidden('tipo_usuario', 'Usuario')!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::hidden('estado', 'Activo')!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      @endif

		<!-- GESTION DE LAS FOTOS -->
		<div class=''>
		</div><!-- /div .list-group-item -->

	</div><!-- /div .list-group -->
</div><!-- /div .col-md8-sm8-xs12 -->


	@if(Auth::user()->check() or Auth::admin()->check())
		<div class='list-group' >
			<div class='list-group-item list-group-item-success'>
				DATOS DE CONTACTO
			</div><!-- /div .list-group-item .success -->
			<div class='list-group-item'>







				@if (Auth::admin()->check()||Auth::user()->check())
					<div class='form-group has-feedback has-feedback-left'>
						{!!Form::hidden('estado', 'Activo', ['maxlength' => '100'])!!}	
					</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
					@if (Auth::admin()->check())
						<div class='form-group has-feedback has-feedback-left'>
							{!!Form::label('Tipo usuario:')!!}
							{!!Form::select('tipo_usuario', 
								['Usuario' => 'Usuario',
								'Cliente' => 'Cliente'], 
								$selected = null, ['class' => 'form-control',  'maxlength' => '20']) 
							!!}	
						</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
					@endif
				@endif
			</div><!-- /div .list-group-item -->
		</div><!-- /div .list-group -->
	@endif

