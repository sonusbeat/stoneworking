<div class="row">
    <div class="col-md-4 col-md-offset-4">
    @if(isset($image) && $image->name !== 'no-image.jpg')
        <div class="text-center">
            <img src="/img/portfolio/work-images/{{ $image->name }}-medium.jpg"
                 class="img-responsive img-thumbnail"
                 alt="{{ $image->alt }}"
            >
        </div><br>
    @else
        <div>
            <img src="/images/no-image.jpg"
             class="img-responsive img-thumbnail"
             alt="Sin Imagen"
            >
        </div><br>
    @endif
        <div class="form-group">
            <label for="image">Imagen</label>
            <input id="image" class="form-control" type="file" name="image">
        </div>

        <div class="form-group">
            <label for="alt">Texto Alternativo</label>
            <input name="alt"
                   id="alt"
                   class="form-control"
                   type="text"
                   value="{{ $image->alt or old('alt') }}"
            >
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->