<div class="col-sm-8">
	<div class="list-group">
		<div class="list-group-item">	
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Contenido:')!!}
				{!!Form::textarea('status',($feed->status!=null)?$feed->status:null,['class'=>'form-control','placeholder'=>'Ingrese el contenido','rows' => '3'])!!}
			</div>			

		</div>
	</div>
</div>

<div class="col-sm-4">