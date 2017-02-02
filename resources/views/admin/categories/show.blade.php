@extends('templates/admin')
@section('page-title', 'Detalles')
@section('meta-description', 'Detalles de la categoria')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        <h2>Detalles de la categoría</h2>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th width="200">Nombre</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th>Enlace Permanente</th>
                        <td>{{ $category->permalink }}</td>
                    </tr>
                    <tr>
                        <th>Activo</th>
                        <td>{{ $category->active ? 'Si' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th>Título Seo</th>
                        <td>{{ $category->meta_title }}</td>
                    </tr>
                    <tr>
                        <th>Descripción Seo</th>
                        <td>{{ $category->meta_description }}</td>
                    </tr>
                    <tr>
                        <th>Robots</th>
                        <td>
                            <?php
                            switch ($category->meta_robots) :
                                case 'index, follow':
                                    echo 'Indexar y Seguir';
                                    break;
                                case 'index, nofollow':
                                    echo 'Indexar y No seguir';
                                    break;
                                case 'noindex, follow':
                                    echo 'No indexar y Seguir';
                                    break;
                                case 'noindex, nofollow':
                                    echo 'No indexar y No seguir';
                                    break;
                                default:
                                    echo 'Indexar y Seguir';
                                    break;
                            endswitch;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha de Creación</th>
                        <td>{{ $category->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Modificación</th>
                        <td>{{ $category->updated_at }}</td>
                    </tr>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection