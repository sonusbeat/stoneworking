@if(session('message'))
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div id="alert" role="alert" class="alert alert-success alert-dismissible text-center {{ session('message_important') ? 'alert-important' : null }}">
            @if(session('message_important'))
                <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            @endif
            <strong>{{ session('message') }}</strong>
        </div><!-- /.alert -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endif