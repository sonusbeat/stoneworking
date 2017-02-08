@extends('templates/admin')
@section('page-title', 'Trabajos Realizados')
@section('meta-description', 'Lista de trabajos realizados')

@section('content')
<div class="container">
    <h1><center>Stoneworking</center></h1><hr>
    @if(isset($works) && $works->count())
    <div class="row">
        <div class="col-md-6">
            <h2>Trabajos Realizados de {{ $category->name }}</h2>
        </div><!-- /.col -->
        <div class="col-md-6 text-right">
            <a class="btn btn-primary"
               href="{{ route('admin.categories.works.create', $category->permalink) }}"
            >Crear</a>
        </div><!-- /.col -->
    </div><!-- /.row -->

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
                            <a class="btn btn-info"
                               data-toggle="tooltip" title="Ver Detalles"
                               href="{{ route('admin.categories.works.show',[
                                $category->permalink,
                                $work->permalink
                               ]) }}"
                            >
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a class="btn btn-warning"
                               data-toggle="tooltip" title="Editar Trabajo"
                               href="{{ route('admin.categories.works.edit', [
                                $category->permalink,
                                $work->permalink
                               ]) }}"
                            >
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>

                            {!! delete_resource('categories.works',[$category, $work], 'Trabajo') !!}
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
        <a class="btn btn-primary btn-lg btn-block"
           href="{{ route('admin.categories.works.create', $category->permalink) }}"
        >Crear</a><br>
    @endif()
    <a class="btn btn-primary"
        data-toggle="tooltip" title="Volver a lista de categorías"
        href="{{ route('admin.categories.index') }}"
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