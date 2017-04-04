@extends('templates/admin')
@section('page-title', 'Subir Imagen')
@section('meta-description', 'Subir imagen al trabajo realizado')

@section('content')
    <div class="container">
        <h1 class="text-center">Stoneworking</h1><hr>
        <h2 class="text-center">Cargar Imagen</h2><br>

        <form action="{{ route('admin.works.images.store', $work->id) }}"
          enctype="multipart/form-data"
          method="post"
        >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin.work-images._form')

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-primary btn-lg"
                       data-toggle="tooltip"
                       title="Volver al trabajo"
                       href="{{ route('admin.categories.works.show', [$category->permalink, $work->permalink]) }}">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div><!-- /.col -->
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </form>
    </div><!-- /.container -->
@endsection