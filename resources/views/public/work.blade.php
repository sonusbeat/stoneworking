@extends('templates/secondary')
@section('page-title', $work->meta_title)
@section('meta-description', $work->meta_description)
@section('meta-robots', $work->meta_robots)

@section('content')
	<div class="container">
		<div class="work">
			<div class="work__image">
				<a href="/img/portfolio/{{ $work->image }}-large.jpg"
				   class="fancybox-button magnify-search"
				   rel="fancybox-button"
				   title="{{ $work->name }}">
					<img src="/img/portfolio/{{ $work->image }}-medium.jpg" alt="{{ $work->image_alt }}">
				</a>
			</div><!-- /.work -->
			<div class="work__information">
				<h2>{{ $work->name }}</h2>

				<div class="data">
					<p><b>Material:</b>&nbsp;<spam>{{ $work->material }}</spam></p>

					<p><b>Categoría:</b>&nbsp;<spam>{{ $work->category_name }}</spam></p>
				</div><!-- /.data -->

				<div class="description">
					{{ $work->description }}
				</div><br>

				@if($work->tags()->count())
					<div class="tags">
						<p class="tags__subtitle">Etiquetas</p>
						@foreach($work->tags as $tag)
							<a href="#">{{ $tag->name }}</a>
						@endforeach
					</div><!-- /.tags -->
				@endif
			</div><!-- /.col -->
		</div><br><!-- /.row -->

		@if($work->images()->count())
			<h3 class="text-center">Galería de Imágenes</h3><hr>
			@foreach(array_chunk($work->images->all(), 4) as $row)
				<div class="row">
					@foreach($row as $work_image)
						<div class="col-md-3 text-center">
							<div style="margin-bottom:20px;">
								<a href="/img/portfolio/work-images/{{ $work_image->name }}-medium.jpg"
								   class="fancybox-button magnify-search"
								   rel="fancybox-button"
								   title="{{ $work->image_alt }}"
								>
									<img src="/img/portfolio/work-images/{{ $work_image->name }}-thumbnail.jpg"
										 class="img-thumbnail img-responsive"
										 alt="{{ $work_image->name }}"
									>
								</a>
							</div>
						</div><!-- /.col -->
					@endforeach
				</div><br><!-- /.row -->
			@endforeach
		@endif

		{{--
		<h3>Comentarios</h3>

		<p>Modulo de Disqus va aqui</p>
		--}}

		<div class="text-left" style="margin-top: 20px;">
			<a class="btn btn-primary" href="{{ route('public.category.works', $work->category_permalink) }}">
				<span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Volver
			</a>
		</div>

	</div><!-- /.container -->
@endsection

@section('custom-scripts')
	<script>
        $(function() {
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