@extends('templates/admin')
@section('page-title', 'Detalles')
@section('meta-description', 'Detalles del recurso')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        <h2>Detalles</h2>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th width="200">Nombre</th>
                        <td>{{ $work->name }}</td>
                    </tr>
                    <tr>
                        <th>Enlace Permanente</th>
                        <td>{{ $work->permalink }}</td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">Imagen</th>
                        <td>
                            @if($work->image == 'no-image.jpg')
                                <img class="img-responsive" src="/images/{{ $work->image }}" alt="Sin Imagen" width="300">
                            @else
                                <img class="img-responsive" src="/img/portfolio/{{ $work->image }}-thumbnail.jpg" alt="{{ $work->image_alt }}" width="300">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Etiquetas</th>
                        <td>
                        @foreach($work->tags as $index => $tag)
                            @if($work->tags()->count() -1 == $index)
                                {{ $tag->name }}
                            @else
                                {{ $tag->name }},
                            @endif
                        @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Activo</th>
                        <td>{{ $work->active ? 'Si' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th>Título Seo</th>
                        <td>{{ $work->meta_title }}</td>
                    </tr>
                    <tr>
                        <th>Descripción Seo</th>
                        <td>{{ $work->meta_description }}</td>
                    </tr>
                    <tr>
                        <th>Robots</th>
                        <td>
                            <?php
                            switch ($work->meta_robots) :
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
                        <td>{{ $work->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Modificación</th>
                        <td>{{ $work->updated_at }}</td>
                    </tr>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <a class="btn btn-primary"
           data-toggle="tooltip"
           title="Volver a trabajos de {{ $category->name }}"
           href="{{ route('admin.categories.works.index', $category->permalink) }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection

@section('custom-scripts')
<script>
    $(function() {
        // Tooltip
        $('[data-toggle="tooltip"]').tooltip({
            placement: 'top',
            delay: {
                show: 100,
                hide: 200
            }
        });
    });
</script>
@endsection