@extends('templates/admin')
@section('page-title', 'Crear Etiqueta')
@section('meta-description', 'Formulario para crear una etiqueta nuevo')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        <h2><center>Crear Etiqueta Nueva</center></h2>

        <form action="{{ route('admin.tags.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin/tags/_form')

            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <br><button class="btn btn-success btn-lg btn-block" type="submit">Crear</button><br><br>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </form>

        <a class="btn btn-primary" href="{{ route('admin.tags.index') }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection