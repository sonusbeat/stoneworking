<div class="row">
    <div class="col-md-4 col-md-offset-2">
        <!-- Nombre -->
        <div class="form-group {{ !$errors->has('name') ?: 'has-error' }}">
            <label for="name">Nombre</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ $user->name or old('name') }}">

            @if ($errors->has('name'))
                <span class="help-block">
                    <b>{{ $errors->first('name') }}</b>
                </span>
            @endif
        </div>

        <!-- Nombre de usuario -->
        <div class="form-group {{ !$errors->has('username') ?: 'has-error' }}">
            <label for="username">Nombre de usuario</label>
            <input class="form-control" id="username" type="text" name="username" value="{{ $user->username or old('username') }}">

            @if ($errors->has('username'))
                <span class="help-block">
                    <b>{{ $errors->first('username') }}</b>
                </span>
            @endif
        </div>
        
        <!-- Correo Electrónico -->
        <div class="form-group {{ !$errors->has('email') ?: 'has-error' }}">
            <label for="email">Correo Electrónico</label>
            <input class="form-control" id="email" type="email" name="email" value="{{ $user->email or old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <b>{{ $errors->first('email') }}</b>
                </span>
            @endif
        </div>
    </div><!-- /.col -->
    <div class="col-md-4">
        <!-- Contraseña -->
        <div class="form-group {{ !$errors->has('password') ?: 'has-error' }}">
            <label for="password">Contraseña</label>
            <input class="form-control" id="password" type="password" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <b>{{ $errors->first('password') }}</b>
                </span>
            @endif
        </div>

        <!-- Repite Contraseña -->
        <div class="form-group {{ !$errors->has('password_confirmation') ?: 'has-error' }}">
            <label for="password_confirmation">Repite Contraseña</label>
            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <b>{{ $errors->first('password_confirmation') }}</b>
                </span>
            @endif
        </div>

        <!-- Tipo de Usuario -->
        <div class="form-group {{ !$errors->has('type') ?: 'has-error' }}">
            <label for="type">Tipo de Usuario</label>

            <select name="type" id="type" class="form-control">
                <option disabled selected>Seleccione el tipo de usuario</option>

                <option value="admin"
                @if(isset($user) && $user->type == 'admin' || old('type') == 'admin')
                    selected
                @endif
                >Administrador</option>

                <option value="subscriptor"
                @if(isset($user) && $user->type == 'subscriptor' || old('type') == 'subscriptor')
                    selected
                @endif
                >Subscriptor</option>
            </select>

            @if ($errors->has('type'))
                <span class="help-block">
                    <b>{{ $errors->first('type') }}</b>
                </span>
            @endif
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <!-- Imagen -->
        <div class="form-group {{ !$errors->has('image') ?: 'has-error' }}">
            <label for="image">Imagen</label>
            <input class="form-control" id="image" type="file" name="image" value="{{ old('image') }}">

            @if ($errors->has('image'))
                <span class="help-block">
                    <b>{{ $errors->first('image') }}</b>
                </span>
            @endif
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->