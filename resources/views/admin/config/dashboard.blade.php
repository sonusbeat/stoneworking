@extends('templates/admin')
@section('page-title', 'Dashboard')
@section('meta-description', 'Configuración del Sistema')

@section('content')
<div class="container">
    <h1><center>Stoneworking</center></h1><hr>
    <h2><center>Dashboard</center></h2>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="list-group">
                <a href="{{ route('admin.users.index') }}"
                   class="list-group-item">Usuarios
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="list-group-item">Categorías
                </a>

                <a href="#"
                   class="list-group-item">Trabajos Realizados
                </a>

                <a href="{{ route('admin.tags.index') }}"
                   class="list-group-item">Etiquetas
                </a>
            </div>
        </div><!-- /.col -->
    </div>
</div><!-- /.container -->
@endsection