@extends('templates/admin')
@section('page-title', 'Etiquetas')
@section('meta-description', 'Lista de etiquetas')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
        @if(isset($tags) && $tags->count())
            <div class="row">
                <div class="col-md-3 col-md-offset-3">
                    <h2>Etiquetas</h2>
                </div><!-- /.col -->
                <div class="col-md-3 text-right">
                    <a class="btn btn-primary" href="{{ route('admin.tags.create') }}">Crear</a>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Enlace Permanente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->permalink }}</td>
                                <td>
                                    <a class="btn btn-warning"
                                       data-toggle="tooltip" title="Editar Etiqueta"
                                       href="{{ route('admin.tags.edit', $tag->permalink) }}"
                                    >
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>

                                    {!! delete_resource('tags', $tag->id, 'Etiqueta', $tag->id) !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->
        @else
            <div class="alert alert-warning alert-important">
                <center><b>Aún no hay etiquetas creadas</b></center>
            </div>
            <a class="btn btn-primary btn-lg btn-block"
               href="{{ route('admin.tags.create') }}"
            >Crear</a><br>
        @endif

        <a class="btn btn-primary"
           data-toggle="tooltip" title="Volver al tablero"
           href="{{ route('admin.config.dashboard') }}"
        >
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection

@section('custom-scripts')
    <script>
        $(function() {
            $(document).on("submit", "#delete", function($event) {
                event.preventDefault();
                var self = $(this);

                swal({
                        title: "¡ Advertencia !",
                        text: "No se podrá recuperar la etiqueta",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                             return self.submit();
                        } else {
                            swal("Cancelado", "La etiqueta no se eliminó", "error");
                        }
                    });
            });

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