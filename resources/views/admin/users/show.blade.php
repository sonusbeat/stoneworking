@extends('templates/admin')
@section('page-title', 'Perfil de Usuario')
@section('meta-description', 'Perfil de Usuario')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>

        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                @if($user->image != '')
                    <a id="fancybox" class="fancybox-button magnify" rel="fancybox-button"
                       href="/img/users/{{ $user->image }}-large.jpg"
                       title="{{ $user->name }}"
                    >
                        <img class="img-responsive img-thumbnail"
                             src="/img/users/{{ $user->image }}-medium.jpg"
                             alt="Usuario"
                        >
                    </a>
                @else
                    <img class="img-responsive" src="/images/user.jpg" alt="Usuario">
                @endif
            </div><!-- /.col -->
            <div class="col-md-6">
                <h2>Perfil de Usuario</h2><br>

                <table class="table table-striped">
                    <tr>
                        <th width="200">Nombre</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Nombre de Usuario</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Tipo</th>
                        <td>{{ $user->type == 'admin' ? 'Administrador' : 'Subscriptor' }}</td>
                    </tr>
                    <tr>
                        <th>Activo</th>
                        <td>{{ $user->active ? 'Si' : 'No' }}</td>
                    </tr>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <a class="btn btn-primary" href="{{ route('admin.users.index') }}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div><!-- /.container -->
@endsection

@section('custom-scripts')
    <script>
        $(function() {
            $("#fancybox").fancybox({
                prevEffect		: 'elastic',
                nextEffect		: 'elastic',
                openEffect	: 'elastic',
                closeEffect	: 'elastic',
                closeBtn		: true,
                helpers		: {
                    title	: { type : 'inside' },
                    buttons	: null,
                    overlay : {},
                    title : {
                        // 'float', 'inside', 'outside' or 'over'
                        type : 'over'
                    },
                    thumbs: {
                        height: 50,
                        width: 50,
                    }
                }
            });
        });
    </script>
@endsection