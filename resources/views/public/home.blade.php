@extends('templates/main')
@section('page-title', 'Cubiertas de Marmol, Granito y Onix para Cocinas y Negocios - Stone Working')

@section('content')
    @include('public/partials/header')  
    @include('public/partials/about')
    @include('public/partials/services')
    @include('public/partials/portfolio')
    @include('public/partials/contact')
    @include('public/partials/quotation')
@endsection

@section('custom-scripts')
<script>
	$(document).ready(function() {
		var size1 = $('#size-1');
		var size2 = $('#size-2');
		var size3 = $('#size-3');
		var instructions2 = $('#instructions-2');

		$('#blueprints').on('click', 'input', function() {
			instructions2.show('slow');

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