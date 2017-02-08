@extends('templates/admin')
@section('page-title', 'Categorías')
@section('meta-description', 'Lista de categorías')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
    @if(isset($categories) && $categories->count())
        <div class="row">
            <div class="col-md-6">
                <h2>Lista de Categorías</h2>
            </div><!-- /.col -->
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Crear</a><br>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th class="text-center">Trabajos</th>
                        <th class="text-center">Activo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary"
                                   href="{{ route('admin.categories.works.index',$category->permalink) }}"
                                   data-toggle="tooltip"
                                   title="Ver trabajos de {{ $category->name }}"
                                >
                                    <b>{{ $category->works_count }}</b>
                                </a>
                            </td>
                            <td class="text-center">
                                @if($category->active)
                                    {!! update_status('categories', $category->id, 'categoría '.$category->name, true) !!}
                                @else
                                    {!! update_status('categories', $category->id, 'categoría '.$category->name, false) !!}
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info" href="{{ route('admin.categories.show', $category->permalink) }}" data-toggle="tooltip" title="Ver Detalles">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>

                                <a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->permalink) }}" data-toggle="tooltip" title="Editar Categoría">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                {!! delete_resource('categories', $category->id,'Categoría') !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
    @else
        <div class="alert alert-warning">
            <center><b>Aún no hay categorías en esta sección</b></center>
        </div>
        <a class="btn btn-primary btn-lg btn-block"
           href="{{ route('admin.categories.create') }}"
        >Crear</a><br>
    @endif
        <a class="btn btn-primary"
           data-toggle="tooltip" title="Volver al dashboard"
           href="{{ route('admin.config.dashboard') }}"
        >
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection

@section('custom-scripts')
<script>
$(function() {
    // Delete Button Message
    $(document).on("submit", "#delete", function($event) {
        event.preventDefault();
        var self = $(this);
        swal({
                title: "¡ Advertencia !",
                text: "No se podrá recuperar la categoría",
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
                    swal("Cancelado", "La categoría no se eliminó", "error");
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