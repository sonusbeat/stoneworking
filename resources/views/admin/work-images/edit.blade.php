@extends('templates/admin')
@section('page-title', 'Detalles')
@section('meta-description', 'Detalles del recurso')

@section('content')
    <div class="container">
        <h1 class="text-center">Stoneworking</h1><hr>
        <h2 class="text-center">Editar Imagen</h2><br>

        <form action="{{ route('admin.works.images.update', [$work->id,$image->id]) }}"
              enctype="multipart/form-data"
              method="post"
        >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

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
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </form>
    </div><!-- /.container -->
@endsection