@extends('templates/admin')
@section('page-title', 'Crear Trabajo')
@section('meta-description', 'Formulario para crear un trabajo nuevo')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        <h2><center>Crear Trabajo Nuevo</center></h2>

        <form action="{{ route('admin.categories.works.store', $category) }}"
              method="POST"
              enctype="multipart/form-data"
        >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin/works/_form')

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <br><button class="btn btn-success btn-lg btn-block" type="submit">Crear</button><br><br>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </form>

        <a class="btn btn-primary" href="{{ route('admin.categories.works.index', $category->permalink) }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection

@section('custom-scripts')
    <script>
        $("#tag_list").select2({
            placeholder: 'Selecciona una etiqueta'
        });
    </script>
@endsection