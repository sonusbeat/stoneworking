@extends('templates/admin')
@section('page-title', 'Editar Usuario')
@section('meta-description', 'Formulario para editar un usuario existente')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        <h2><center>Editar Usuario</center></h2>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            @include('admin/users/_form')

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <br><button class="btn btn-success btn-lg btn-block" type="submit">Actualizar</button><br><br>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </form>

        <a class="btn btn-primary" href="{{ route('admin.users.index') }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection