<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <!-- Nombre -->
        <div class="form-group {{ !$errors->has('name') ?: 'has-error' }}">
            <label for="name">Nombre</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ $tag->name or old('name') }}">

            @if ($errors->has('name'))
                <span class="help-block">
                    <b>{{ $errors->first('name') }}</b>
                </span>
            @endif
        </div>

        <!-- Enlace Permanente -->
        <div class="form-group {{ !$errors->has('permalink') ?: 'has-error' }}">
            <label for="permalink">Enlace Permanente</label>
            <input class="form-control" id="permalink" type="text" name="permalink"
                   value="{{ $tag->permalink or old('permalink') }}">

            @if ($errors->has('permalink'))
                <span class="help-block">
                    <b>{{ $errors->first('permalink') }}</b>
                </span>
            @endif
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->