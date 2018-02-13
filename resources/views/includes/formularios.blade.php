<div class="form-group">
    <div class="row">
		<div class="col-md-6">
					{!!Form::label('Fecha 1:')!!}
					{!!Form::date('fecha1',null,['class'=>'form-control fecha1','id'=>'fecha1'])!!}
				</div>
				<div class="col-md-6">
					{!!Form::label('N° días hábiles:')!!}
					{!!Form::number('fecha1n',null,['class'=>'form-control'])!!}
				</div>
	</div>
</div>
    	
<div class="form-group">
    <div class="row">
		<div class="col-md-6">
			{!!Form::label('Fecha 2:')!!}
			{!!Form::date('fecha2',null,['class'=>'form-control','id'=>'fecha2'])!!}
		</div>
		<div class="col-md-6">
			{!!Form::label('N° días hábiles:')!!}
			{!!Form::number('fecha2n',null,['class'=>'form-control'])!!}
		</div>
	</div>
</div>

		<div class="form-group">
    		<div class="row">
				<div class="col-md-6">
					{!!Form::label('Fecha 3:')!!}
					{!!Form::date('fecha3',null,['class'=>'form-control','id'=>'fecha3'])!!}
				</div>
				<div class="col-md-6">
					{!!Form::label('N° días hábiles:')!!}
					{!!Form::number('fecha3n',null,['class'=>'form-control'])!!}
				</div>
			</div>
		</div>

		<div class="form-group">
    		<div class="row">
				<div class="col-md-6">
					{!!Form::label('Fecha 4:')!!}
					{!!Form::date('fecha4',null,['class'=>'form-control','id'=>'fecha4'])!!}
				</div>
				<div class="col-md-6">
					{!!Form::label('N° días hábiles:')!!}
					{!!Form::number('fecha4n',null,['class'=>'form-control'])!!}
				</div>
			</div>
		</div>
