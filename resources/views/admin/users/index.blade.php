@extends('templates/admin')
@section('page-title', 'Lista de Usuarios')
@section('meta-description', 'Gestor de Usuarios')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>
    @if(isset($users) && $users->count())
        <div class="row">
            <div class="col-md-6">
                <h2>Lista de Usuarios</h2>
            </div><!-- /.col -->
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Crear</a><br>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <table class="table users-list table-striped table-hover">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th class="text-center">Activo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="{{ route('admin.users.show', $user->username) }}"
                                   data-toggle="tooltip" title="Ver Detalles"
                                >
                                @if($user->image != '')
                                    <img class="img-responsive user-image"
                                         class="img-responsive"
                                         src="/img/users/{{ $user->image }}-thumbnail.jpg"
                                         alt="{{ $user->name }}">

                                @else
                                    <img class="img-responsive user-image"
                                         class="img-responsive"
                                         src="/images/user-thumbnail.jpg"
                                         alt="Usuario">
                                @endif
                                </a>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type == 'admin' ? 'Administrador' : 'Subscriptor' }}</td>
                            <td class="text-center">
                                @if($user->active)
                                    {!! update_status('users', $user->id, 'Usuario', true) !!}
                                @else
                                    {!! update_status('users', $user->id, 'Usuario', false) !!}
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info"
                                   href="{{ route('admin.users.show', $user->username) }}"
                                   data-toggle="tooltip" title="Ver Detalles"
                                >
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>

                                <a class="btn btn-warning"
                                   href="{{ route('admin.users.edit', $user->username) }}"
                                   data-toggle="tooltip" title="Editar Usuario"
                                >
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                {!! delete_resource('users',$user,'Usuario') !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
    @else
        <div class="alert alert-warning">
            <center><b>Aún no hay usuarios creados</b></center>
        </div>
        <a class="btn btn-primary btn-lg btn-block"
           href="{{ route('admin.users.create') }}"
        >Crear</a><br>
    @endif
        <a class="btn btn-primary" href="{{ route('admin.config.dashboard') }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection

@section('custom-scripts')
<script>
$(function() {
    $(document).on("submit", "#delete", function($event) {
        event.preventDefault();
        swal({
            title: "¡ Advertencia !",
            text: "No se podrá recuperar el usuario",
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
                $('#delete').submit();
            } else {
                swal("Cancelado", "El usuario no se eliminó", "error");
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