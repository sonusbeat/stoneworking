@extends('templates/admin')
@section('page-title', 'Detalles')
@section('meta-description', 'Detalles del recurso')

@section('content')
    <div class="container">
        <h1><center>Stoneworking</center></h1><hr>

        <div class="row">
            <div class="col-md-5">
                @if($work->image == 'no-image.jpg')
                    <img class="img-responsive img-thumbnail" src="/images/{{ $work->image }}" alt="Sin Imagen">
                @else
                    <a href="/img/portfolio/{{ $work->image }}-medium.jpg"
                       id="image"
                       class="magnify-search"
                    >
                        <img src="/img/portfolio/{{ $work->image }}-thumbnail.jpg"
                             class="img-responsive img-thumbnail"
                             alt="{{ $work->image_alt }}"
                        >
                    </a>
                @endif
            </div><!-- /.col -->
            <div class="col-md-7">
                <h2>{{ $work->name }}</h2>
                <div class="work__description">{!! $work->description !!}</div><br>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Categoría:</b>&nbsp;
                            <a href="{{ route('admin.categories.show', $category->permalink) }}">
                                {{ $category->name }}
                            </a>
                        </p>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <p><b>Material:</b>&nbsp;{{ $work->material }}</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-4">
                        <p><b>Creado:</b>&nbsp;{{ $work->created_at->format('d-M-Y') }}</p>
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <p><b>Actualizado:</b>&nbsp;{{ $work->updated_at->format('d-M-Y') }}</p>
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <p><b>Activo:</b>&nbsp;{{ $work->active ? 'Si' : 'No' }}</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><br><!-- /.row -->

        <h3 class="text-center">Imágenes</h3><hr>

        @if($work->images()->count())
            @foreach(array_chunk($work->images->all(), 4) as $row)
                <div class="row">
                    @foreach($row as $work_image)
                        <div class="col-md-3 text-center">
                            <div style="margin-bottom:20px;">
                                <a href="/img/portfolio/work-images/{{ $work_image->name }}-medium.jpg"
                                   id="image"
                                   class="magnify-search"
                                >
                                    <img src="/img/portfolio/work-images/{{ $work_image->name }}-thumbnail.jpg"
                                         class="img-thumbnail img-responsive"
                                         alt="{{ $work_image->name }}"
                                    >
                                </a>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('admin.works.images.edit', [$work->id, $work_image->id]) }}"
                                   class="btn btn-warning"
                                   title="Editar Imagen"
                                   data-toggle="tooltip"
                                >
                                    <spam class="glyphicon glyphicon-pencil"></spam>
                                </a>
                                {!! delete_resource('works.images', [$work->id, $work_image->id], 'Imágen') !!}
                            </div>
                        </div><!-- /.col -->
                    @endforeach
                </div><br><!-- /.row -->
            @endforeach
        @else
            <div style="margin-bottom:30px;">
                <div class="alert alert-warning alert-important">
                    <p class="text-center"><b>Este trabajo no tiene más imagenes</b></p>
                </div>
            </div>
        @endif

        <p><a href="{{ route('admin.works.images.create', $work->id) }}" class="btn btn-primary btn-lg btn-block"><b>Agregar</b></a></p>

        <p>
            <a class="btn btn-primary btn-lg"
               data-toggle="tooltip"
               title="Volver a trabajos de {{ $category->name }}"
               href="{{ route('admin.categories.works.index', $category->permalink) }}">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
        </p>
    </div><!-- /.container -->
@endsection

@section('custom-scripts')
    <script>
        $(function() {
            // Delete Image
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
            // Fancybox
            $("#image").fancybox({
                openEffect	: 'elastic',
                closeEffect	: 'elastic',
                fitToView: true,
                helpers		: {
                    title   : { type : 'over' }
                }
            });
        });
    </script>
@endsection