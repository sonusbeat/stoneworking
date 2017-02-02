<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <!-- Nombre -->
        <div class="form-group {{ !$errors->has('name') ?: 'has-error' }}">
            <label for="name">Nombre</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ $category->name or old('name') }}">

            @if ($errors->has('name'))
                <span class="help-block">
                    <b>{{ $errors->first('name') }}</b>
                </span>
            @endif
        </div>

        <!-- Enlace Permanente -->
        <div class="form-group {{ !$errors->has('permalink') ?: 'has-error' }}">
            <label for="permalink">Enlace Permanente</label>
            <input class="form-control" id="permalink" type="text" name="permalink" value="{{ $category->permalink or old('permalink') }}">

            @if ($errors->has('permalink'))
                <span class="help-block">
                    <b>{{ $errors->first('permalink') }}</b>
                </span>
            @endif
        </div>

        <h3>SEO</h3>

        <!-- Título -->
        <div class="form-group {{ !$errors->has('meta_title') ?: 'has-error' }}">
            <label for="meta_title">Título</label>

            <input name="meta_title"
                   type="text"
                   class="form-control"
                   id="meta_title"
                   value="{{ $category->meta_title or old('meta_title') }}"
            >

            @if ($errors->has('meta_title'))
                <span class="help-block">
                    <b>{{ $errors->first('meta_title') }}</b>
                </span>
            @endif
        </div>

        <!-- Descripción -->
        <div class="form-group {{ !$errors->has('meta_description') ?: 'has-error' }}">
            <label for="meta_description">Descripción</label>

            <textarea name="meta_description"
                class="form-control"
                id="meta_description"
                type="text"
                rows="3"
            >{{ $category->meta_description or old('meta_description') }}</textarea>

            @if ($errors->has('meta_description'))
                <span class="help-block">
                    <b>{{ $errors->first('meta_description') }}</b>
                </span>
            @endif
        </div>

        <!-- Robots -->
        <div class="form-group {{ !$errors->has('meta_robots') ?: 'has-error' }}">
            <label for="meta_robots">Robots</label>
            <select name="meta_robots" class="form-control" id="meta_robots">
                <option value="1" selected>Indexar y Seguir</option>
                <option value="noindex, follow"
                @if ((isset($category) AND $category->meta_robots == 'noindex, follow') OR (old('meta_robots') == 'noindex, follow'))
                    selected
                @endif
                >No Indexar y Seguir</option>

                <option value="index, nofollow"
                @if ((isset($category) AND $category->meta_robots == 'index, nofollow') OR (old('index, nofollow') == 'index, nofollow'))
                    selected
                @endif
                >Indexar y No Seguir</option>
                <option value="noindex, nofollow"
                @if ((isset($category) AND $category->meta_robots == 'noindex, nofollow') OR (old('noindex, nofollow') == 'noindex, nofollow'))
                    selected
                @endif
                >No Indexar y No Seguir</option>
            </select>

            @if ($errors->has('meta_robots'))
                <span class="help-block">
                    <b>{{ $errors->first('meta_robots') }}</b>
                </span>
            @endif
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->