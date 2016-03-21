					@foreach($empresas as $empresa)	

				  <div class="container" id="tourpackages-carousel">
				      <div class="row">				        
				        <div class="col-md-6">
				          <div class="thumbnail">
				            <img src="{!!URL::to('images/empresa.png')!!}" alt="">
				              <div class="caption">
				                <h4>{{$empresa->nombre}}</h4>
				            </div>
				            <h4>Descripcion empresa</h4>
				            <h4>Mas info</h4>
				          </div>
				        </div>

				@endforeach