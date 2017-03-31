@extends('templates/admin')
@section('page-title', 'Trabajos Realizados')
@section('meta-description', 'Lista de trabajos realizados')

@section('content')
<div class="container">
    <h1><center>Stoneworking</center></h1><hr>
    @if(isset($works) && $works->count())
        <h2><center>Ultimos 20 Trabajos Realizados</center></h2>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="text-center">Categoría</th>
                            <th class="text-center">Activo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($works as $work)
                        <tr>
                            <td>{{ $work->name }}</td>
                            <td class="text-center">
                                {{ $work->category->name }}
                            </td>
                            <td class="text-center">
                                @if($work->active)
                                    {!! update_status('works', $work->id, 'Trabajo', true) !!}
                                @else
                                    {!! update_status('works', $work->id, 'Trabajo', false) !!}
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-warning"
                                   data-toggle="tooltip" title="Editar Trabajo"
                                   href="{{ route('admin.categories.works.edit', [$work->category->permalink, $work->permalink]) }}"
                                >
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                {!! delete_resource('categories.works',[$work->category->id, $work->id], 'Trabajo') !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
    @else
        <div class="alert alert-warning">
            <center><b>Aún no hay trabajos realizados en esta categoría</b></center>
        </div>
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
                        text: "No se podrá recuperar el trabajo",
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
                            self.submit();
                        } else {
                            swal("Cancelado", "El trabajo no se eliminó", "error");
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