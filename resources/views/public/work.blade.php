@extends('templates/secondary')
@section('page-title', $work->meta_title)
@section('meta-description', $work->meta_description)
@section('meta-robots', $work->meta_robots)

@section('content')
	<div class="container">
		<div class="work">
			<div class="work__image">
				<a href="/img/portfolio/{{ $work->image }}-large.jpg"
				   id="image"
				   title="{{ $work->name }}">
					<img src="/img/portfolio/{{ $work->image }}-medium.jpg" alt="{{ $work->image_alt }}">
				</a>
			</div><!-- /.col -->
			<div class="work__information">
				<h2>{{ $work->name }}</h2>
				<p><small>Material:</small>&nbsp;----</p>
				<div class="description">
					{{ $work->description }}
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->

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
            // Fancybox
            $("#image").fancybox({
                openEffect	: 'elastic',
                closeEffect	: 'elastic',
                fitToView: false,
                helpers		: {
                     title   : { type : 'over' }
                }
            });
        });
	</script>
@endsection