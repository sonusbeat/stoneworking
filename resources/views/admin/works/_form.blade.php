<div class="row">
    <div class="col-md-6">
    @if(isset($changeCategory) && $changeCategory)
        <!-- Categoría -->
            <div class="form-group {{ !$errors->has('category_id') ?: 'has-error' }}">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option selected disabled>Seleccione Categoría</option>

                    @foreach($categories as $name => $id)
                        <option value="{{ $id }}"
                                {{ (isset($work) && $work->category_id == $id) ? 'selected' : null }}
                        >{{ $name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="help-block">
                    <b>{{ $errors->first('category_id') }}</b>
                </span>
                @endif
            </div>
    @endif

    <!-- Nombre -->
        <div class="form-group {{ !$errors->has('name') ?: 'has-error' }}">
            <label for="name">Nombre</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ $work->name or old('name') }}">

            @if ($errors->has('name'))
                <span class="help-block">
                    <b>{{ $errors->first('name') }}</b>
                </span>
            @endif
        </div>

        <!-- Enlace Permanente -->
        <div class="form-group {{ !$errors->has('permalink') ?: 'has-error' }}">
            <label for="permalink">Enlace Permanente</label>
            <input class="form-control" id="permalink" type="text" name="permalink" value="{{ $work->permalink or old('permalink') }}">

            @if ($errors->has('permalink'))
                <span class="help-block">
                    <b>{{ $errors->first('permalink') }}</b>
                </span>
            @endif
        </div>
    </div><!-- /.col -->
    <div class="col-md-6">
        <!-- Título -->
        <div class="form-group {{ !$errors->has('meta_title') ?: 'has-error' }}">
            <label for="meta_title">Título SEO</label>

            <input name="meta_title"
                   type="text"
                   class="form-control"
                   id="meta_title"
                   value="{{ $work->meta_title or old('meta_title') }}"
            >

            @if ($errors->has('meta_title'))
                <span class="help-block">
                    <b>{{ $errors->first('meta_title') }}</b>
                </span>
            @endif
        </div>

        <!-- Descripción -->
        <div class="form-group {{ !$errors->has('meta_description') ?: 'has-error' }}">
            <label for="meta_description">Descripción SEO</label>

            <textarea name="meta_description"
                      class="form-control"
                      id="meta_description"
                      type="text"
                      rows="3"
            >{{ $work->meta_description or old('meta_description') }}</textarea>

            @if ($errors->has('meta_description'))
                <span class="help-block">
                    <b>{{ $errors->first('meta_description') }}</b>
                </span>
            @endif
        </div>

        <!-- Robots -->
        <div class="form-group {{ !$errors->has('meta_robots') ?: 'has-error' }}">
            <label for="meta_robots">Robots SEO</label>
            <select name="meta_robots" class="form-control" id="meta_robots">
                <option value="1" selected>Indexar y Seguir</option>
                <option value="noindex, follow"
                        @if ((isset($work) AND $work->meta_robots == 'noindex, follow') OR (old('meta_robots') == 'noindex, follow'))
                        selected
                        @endif
                >No Indexar y Seguir</option>

                <option value="index, nofollow"
                        @if ((isset($work) AND $work->meta_robots == 'index, nofollow') OR (old('index, nofollow') == 'index, nofollow'))
                        selected
                        @endif
                >Indexar y No Seguir</option>
                <option value="noindex, nofollow"
                        @if ((isset($work) AND $work->meta_robots == 'noindex, nofollow') OR (old('noindex, nofollow') == 'noindex, nofollow'))
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

<div class="row">
    <div class="col-md-4">
        @if(isset($work) && $work->image !== 'no-image.jpg')
            <img class="img-responsive img-thumbnail" src="/img/portfolio/{{ $work->image }}-thumbnail.jpg" alt="{{ $work->image_alt }}">
        @endif
    </div><!-- /.col -->
    <div class="col-md-8">
        <h3>Imagen del trabajo realizado</h3>

        <p class="instructions">Por favor seleccione una imagen en formato JPG</p>

        <p class="image-name">
            <b>Nombre de la imagen:</b>&nbsp;{{ $work->image }}.jpg
        </p>

        <input id="image" class="img-thumbnail {{ !$errors->has('image') ? 'input-image' : 'input-image-error' }}" type="file" name="image" value="{{ old('image') }}" class="form-control image-input">
        @if ($errors->has('image'))
            <span class="help-block error">
                <b>{{ $errors->first('image') }}</b>
            </span>
    @endif
        <div class="row">
            <div class="col-md-6">
                <!-- Texto Alternativo de Imagen -->
                <div class="form-group {{ !$errors->has('image_alt') ?: 'has-error' }}">
            <label for="image_alt">Texto Alternativo de la Imagen</label>
            <input class="form-control" id="image_alt" type="text" name="image_alt" value="{{ $work->image_alt or old('image_alt') }}">
            @if ($errors->has('image_alt'))
                <span class="help-block">
                <b>{{ $errors->first('image_alt') }}</b>
            </span>
            @endif
        </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.row -->