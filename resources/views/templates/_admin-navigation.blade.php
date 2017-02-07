<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>

             @if(isset($requestUri) && $requestUri === '')
                <a class="navbar-brand page-scroll" href="#page-top">Stone Working</a>
            @endif
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
                <li>
                    <a href="/" target="_blank">
                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                        Ver Sitio
                    </a>
                </li>
                <li>
                    <a href="/admin">
                        <span class="glyphicon glyphicon-dashboard"></span>&nbsp;
                        Tablero
                    </a>
                </li>

                <li>
                    <a href="/admin/logout">
                        <span class="glyphicon glyphicon-log-out"></span>&nbsp;
                        Salir
                    </a>
                </li>
            @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>