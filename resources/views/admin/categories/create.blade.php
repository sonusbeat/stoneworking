@extends('templates/admin')
@section('page-title', 'Crear Categoría Nueva')
@section('meta-description', 'Formulario para crear una categoría nueva')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        <h2><center>Crear Categoría Nueva</center></h2>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin/categories/_form')

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <br><button class="btn btn-success btn-lg btn-block" type="submit">Crear</button><br><br>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </form>

        <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection