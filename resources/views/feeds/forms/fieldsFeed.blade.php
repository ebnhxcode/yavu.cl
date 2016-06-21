	<div>
		<div >
			{!!Form::label('Editar publicacion')!!}
			{!!Form::textarea('status', isset($feed)?($feed->status!=null)?$feed->status:null:'',['class'=>'form-control','placeholder'=>'Ingrese el contenido','rows' => '3'])!!}
		</div>
	</div>
           
