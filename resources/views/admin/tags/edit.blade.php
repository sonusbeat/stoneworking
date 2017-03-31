@extends('templates/admin')
@section('page-title', 'Editar Etiqueta')
@section('meta-description', 'Formulario para editar una etiqueta')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        <h2><center>Editar Trabajo Realizado</center></h2>

        <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            @include('admin/tags/_form')

            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <br><button class="btn btn-success btn-lg btn-block" type="submit">Actualizar</button><br><br>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </form>

        <a class="btn btn-primary"
           href="{{ route('admin.tags.index') }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection