@extends('templates/secondary')
@section('page-title', 'Trabajos Realizados')
@section('meta-description')
Galería de imagenes de trabajos realizados con cubiertas de Marmol, Granito, Cuarzo y Onix
@endsection

@section('content')
	<div class="container">

		<h2><center>Trabajos Realizados</center></h2><br>


		<div class="row">
			<h3>{{ $category->name }}</h3><br>
				@foreach($category->works->chunk(4) as $row)
					<div class="row">
					@foreach($row as $work)
						<div class="col-md-3">
							<a href="{{ route('public.work', $work->permalink) }}" title="{{ $work->name }}">
								<center>
									<img src="/img/portfolio/{{ $work->image }}-thumbnail.jpg"
										 class="img-responsive img-thumbnail"
										 alt="{{ $work->image_alt }}"
									>
								</center>
							</a>
							<h4 class="text-center">
								{!! '<a href="'.$work->permalink.'">'.$work->name.'</a>' !!}
							</h4>
						</div><!-- /.col -->
					@endforeach
					</div><!-- /.row -->
			@endforeach
		</div><!-- /.row -->

		<div class="text-left">
			<a class="btn btn-primary"
			   href="{{ route('public.categories') }}"
			>
				<span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Volver
			</a>
		</div>
	</div><!-- /.container -->
@endsection