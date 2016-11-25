@extends('templates/main')
@section('page-title', 'Cubiertas de Marmol, Granito y Onix para Cocinas y Negocios - Stone Working')

@section('content')
    <div class="container" id="quote">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>Solicitud de Cotización</h2>

				<form class="form quote" action="{{ route('process-quote') }}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-md-6">
							<!-- Nombre -->
							<div class="form-group {{ !$errors->has('name') ?: 'has-error' }}">
								<label for="name">Nombre</label>
								<input class="form-control" name="name" id="name" type="text" value="{{ old('name') }}">
								{!! $errors->first('name', '<p class="text-danger">&nbsp;<b>:message</b></p>') !!}
							</div>

							<!-- Celular -->
							<div class="form-group {{ !$errors->has('mobile') ?: 'has-error' }}">
								<label for="mobile">Celular</label>
								<input class="form-control" name="mobile" id="mobile" type="text" value="{{ old('mobile') }}">
								{!! $errors->first('mobile', '<p class="text-danger">&nbsp;<b>:message</b></p>') !!}
							</div>
						</div><!-- /.col -->

						<div class="col-md-6">
							<!-- Correo Electrónico -->
							<div class="form-group {{ !$errors->has('email') ?: 'has-error' }}">
								<label for="email">Correo Electrónico</label>
								<input class="form-control" name="email" id="email" type="text" value="{{ old('email') }}">
								{!! $errors->first('email', '<p class="text-danger">&nbsp;<b>:message</b></p>') !!}
							</div>

							<!-- Foto de Area de Instalación -->
							<div class="form-group {{ !$errors->has('image') ?: 'has-error' }}">
								<label for="image">Foto de Area de Instalación</label>
								<input id="image" name="image" type="file" value="{{ old('image') }}">
								{!! $errors->first('image', '<p class="text-danger">&nbsp;<b>:message</b></p>') !!}
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->

					<h3><center>Medidas de Area de Instalación</center></h3>

					<p class="instructions">¡Seleccione un plano !</i></p>

					<div id="blueprints" class="blueprints">
						<div class="row">
							<div class="col-md-3 text-center">
								<div class="heading">Plano 1</div>
								<a class="fancybox" rel="gallery" href="/img/planos/blueprint-1.jpg" title="Barra Simple">
									<img src="/img/planos/blueprint-1-thumbnail.jpg" alt="Plano Cocina 1">
								</a>
								<input id="blueprint-1" type="radio" value="single" name="blueprint[]" {{ old('blueprint')[0] == 'single' ? 'checked' : null }}>
							</div><!-- /.col -->
							
							<div class="col-md-3 text-center">
								<div class="heading">Plano 2</div>
								<a class="fancybox" rel="gallery" href="/img/planos/blueprint-2.jpg" title="Barra Escuadra">
									<img src="/img/planos/blueprint-2-thumbnail.jpg" alt="Plano Cocina 1">
								</a>
								<input id="blueprint-2" type="radio" value="squared" name="blueprint[]" {{ old('blueprint')[0] == 'squared' ? 'checked' : null }}>
							</div><!-- /.col -->
							
							<div class="col-md-3 text-center">
								<div class="heading">Plano 3</div>
								<a class="fancybox" rel="gallery" href="/img/planos/blueprint-3.jpg" title="Barra U">
									<img src="/img/planos/blueprint-3-thumbnail.jpg" alt="Plano Cocina 1">
								</a>
								<input id="blueprint-3" type="radio" value="u" name="blueprint[]" {{ old('blueprint')[0] == 'u' ? 'checked' : null }}>
							</div><!-- /.col -->
							
							<div class="col-md-3 text-center">
								<div class="heading">Plano 4</div>
								<a class="fancybox" rel="gallery" href="/img/planos/blueprint-4.jpg" title="Barra Doble">
									<img src="/img/planos/blueprint-4-thumbnail.jpg" alt="Plano Cocina 1">
								</a>
								<input id="blueprint-4" type="radio" value="double" name="blueprint[]" {{ old('blueprint')[0] == 'double' ? 'checked' : null }}>								
							</div><!-- /.col -->
						</div><!-- /.row -->
						{!! $errors->first('blueprint', '<p class="text-danger text-center">&nbsp;<b>:message</b></p>') !!}					
					</div><!-- /.blueprints -->

					<p id="instructions-2" class="instructions {{ !$errors->has('image') ?: 'size-1' }}">¡ Escriba las medidas de su area de instalación !</p>
					
					<div class="row">
						<!-- Medida 1 -->
						<div class="col-md-4 size-1">
							<div class="form-group {{ !$errors->has('size-1') ?: 'has-error' }}">
								<label for="size-1">Medida 1</label>
								<input id="size-1" type="text" name="size-1" class="form-control" placeholder="Ejemplo: 1.5m" value="{{ old('size-1') }}">
							</div>
							{!! $errors->first('size-1', '<p class="text-danger">&nbsp;<b>:message</b></p>') !!}
						</div>
						
						<!-- Medida 2 -->
						<div class="col-md-4 size-2">
							<div class="form-group {{ !$errors->has('size-2') ?: 'has-error' }}">
								<label for="size-2">Medida 2</label>
								<input id="size-2" type="text" name="size-2" class="form-control" placeholder="Ejemplo: 1.65m" value="{{ old('size-2') }}">
								{!! $errors->first('size-2', '<p class="text-danger">&nbsp;<b>:message</b></p>') !!}
							</div>
						</div>
						
						<!-- Medida 3 -->
						<div class="col-md-4 size-3">
							<div class="form-group {{ !$errors->has('size-3') ?: 'has-error' }}">
								<label for="size-3">Medida 3</label>
								<input id="size-3" type="text" name="size-3" class="form-control" placeholder="Ejemplo: 1.65m" value="{{ old('size-3') }}">
								{!! $errors->first('size-3', '<p class="text-danger">&nbsp;<b>:message</b></p>') !!}
							</div>
						</div>
					</div><!-- /.row -->

					<!-- Foto de Area de Instalación -->
					<div class="form-group">
						<label for="message">Información Adicional</label>
						<textarea class="form-control" name="message" id="message" rows="10">{{ old('message') }}</textarea>
						{!! $errors->first('message', '<p class="text-danger">&nbsp;<b>:message</b></p>') !!}
					</div>

					<!-- Boton Cotizar -->
					<div class="form-group">
						<input class="btn btn-primary btn-block btn-lg" type="submit" value="Cotizar">
					</div>
				</form>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
@endsection

@section('custom-scripts')
<script>
	$(document).ready(function() {
		var size1 = $('.size-1');
		var size2 = $('.size-2');
		var size3 = $('.size-3');

		$('#blueprints').on('click', 'input', function() {
			if($(this).attr('id') == 'blueprint-1') {
				size1.show('slow');
				size2.hide('slow');
				size3.hide('slow');
			}

			if($(this).attr('id') == 'blueprint-2' || $(this).attr('id') == 'blueprint-4') {
				size1.show('slow');
				size2.show('slow');
				size3.hide('slow');
			}

			if($(this).attr('id') == 'blueprint-3') {
				size1.show('slow');
				size2.show('slow');
				size3.show('slow');
			}
		});
	});
</script>
@endsection