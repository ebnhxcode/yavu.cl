<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
            <div class="form-group has-feedback has-feedback-left">
                {!!Form::label('Nombre categoría:')!!}
                {!!Form::select('ciudad', 
                    ['Tarapacá' => 'Tarapacá',
                    'Parinacota' => 'Parinacota',
                    'Arica' => 'Arica',
                    'Antofagasta' => 'Antofagasta',
                    'Atacama' => 'Atacama',
                    'La Serena' => 'La Serena', 
                    'Coquimbo' => 'Coquimbo', 
                    'Valparaiso' => 'Valparaiso',
                    'Aconcagua' => 'Aconcagua',
                    'Región Metropolitana' => 'Región Metropolitana',
                    'O Higgins' => 'O Higgins',
                    'Curicó' => 'Curicó',
                    'Talca' => 'Talca',
                    'Linares' => 'Linares',
                    'Maule' => 'Maule',
                    'Ñuble' => 'Ñuble',
                    'Concepción' => 'Concepción',
                    'Arauco' => 'Arauco',
                    'Biobío' => 'Biobío',   
                    'Malleco' => 'Malleco',
                    'Cautín' => 'Cautín',
                    'Araucanía' => 'Araucanía',
                    'Los Ríos' => 'Los Ríos',
                    'Valdivia' => 'Valdivia',
                    'Osorno' => 'Osorno',
                    'Los Lagos' => 'Los Lagos',
                    'Llanquihue' => 'Llanquihue',   
                    'Chiloé' => 'Chiloé',   
                    'Aysen' => 'Aysen', 
                    'Magallanes' => 'Magallanes',   
                    'otra' => 'otras...'], 
                    $selected = null, ['class' => 'form-control', 'maxlength' => '100']) 
                !!} 
            </div> 
            <div class="form-group has-feedback has-feedback-left">
                {!!Form::label('Hash tags de tu empresa:')!!}
                {!!Form::text('hash_categoria',null,['class'=>'form-control','placeholder'=>''])!!}
            </div> 
        </div>
	</div>
</div>

<div class="col-sm-4">

