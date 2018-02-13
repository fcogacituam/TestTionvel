@if (!empty($fechas))
<div class="row fechas">
	<div class="col-md-12">
		<h2>Fechas obtenidas</h2>
		<h4>{{ link_to_action('WelcomeController@getJson', $title = 'Ver Json', $parameters = ['fechas'=>$fechas], $attributes = []) }}</h4>
	</div>
	
	@php
			$count=0
	@endphp
	@foreach ($fechas as $fecha)
		@php
			$count++	
		@endphp
			<div class="col-md-6">
				<div class="jumbotron">
					<h1>Fecha {{$count}}</h1>
					<p>Fecha Inicial: <strong>{{$fecha['fecha_inicial']}}</strong></p>
					<p>Días hábiles añadidos: <strong>{{$fecha['dias_habiles']}}</strong></p>
					
					
						<p>Fecha Final: <strong class="finalDate">{{$fecha['fecha_final']}}</strong></p>
					
						@if(!empty($fecha['no_habiles']))
							<a href="#demo{{$count}}" class="details" data-toggle="collapse">Detalles <i class="fas fa-angle-down"></i></a>
							<div class="collapse" id="demo{{$count}}">
								<table class="table table-bordered">
									<thead class="thead-dark">
										<tr>
											<th>Fecha</th>
											<th>Comentario</th>
										</tr>
									</thead>
									<tbody>
										
											
										
									
									@foreach ($fecha['no_habiles'] as $no_habil)
										<tr>
											<td>{{$no_habil['fecha']}} </td>
											<td>{{$no_habil['comentarios']}}</td>
										</tr>
									@endforeach
										
									</tbody>
								</table>
							</div>
						@endif
				</div>
			</div>
		
		
	@endforeach
</div>
@endif
