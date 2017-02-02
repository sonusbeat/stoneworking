@extends('templates/admin')
@section('page-title', 'Editar Categoría')
@section('meta-description', 'Formulario para editar una categoría existente')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        <h2><center>Editar Categoría</center></h2>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            @include('admin/categories/_form')

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <br><button class="btn btn-success btn-lg btn-block" type="submit">Actualizar</button><br><br>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </form>

        <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection