@extends('templates/secondary')
@section('page-title', 'Trabajos Realizados')
@section('meta-description')
Galería de imagenes de trabajos realizados con cubiertas de Marmol, Granito, Cuarzo y Onix
@endsection

@section('content')
	<div class="container categories">

		<h2><center>Ultimos Trabajos Realizados</center></h2><br>

		@foreach($categories as $category)
			<div class="row category">
				<h3>Cubiertas para {{ $category->name }}</h3><br>

				@foreach($category->works->chunk(4) as $row)
					<div class="row">
						@foreach($row as $work)
							<div class="col-md-3">
								<a href="/img/portfolio/{{ $work->image }}-medium.jpg"
								   class="fancybox-button magnify"
								   rel="fancybox-button"
								   title="{{ $work->name }}">
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

				<div class="text-right">
					<a class="btn btn-primary"
					   href="{{ route('public.category.works', $category->permalink) }}"
					>
						Ver más cubiertas para {{ $category->name }}
					</a>
				</div>
			</div><!-- /.row -->
		@endforeach
	</div><!-- /.container -->
@endsection

@section('custom-scripts')
<script>
	$(function() {
	    // Fancybox
		$(".fancybox-button").fancybox({
			prevEffect  : 'elastic',
			nextEffect  : 'elastic',
			openEffect	: 'elastic',
			closeEffect	: 'elastic',
			closeBtn	: true,
			helpers		: {
				title	: { type : 'inside' },
				buttons	: { position: 'bottom' },
				overlay : {},
				title   : {
					// 'float', 'inside', 'outside' or 'over'
					type : 'over'
				},
				thumbs: false
			}
		});
	});
</script>
@endsection