<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page-title')</title>

        <meta name="description" content="@yield('meta-description')">
        <meta name="robots" content="noindex, nofollow">

        <!-- Custom Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet'>

        <!-- Libraries CSS -->
        <link href="/css/admin-libraries.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/css/admin.min.css" rel="stylesheet">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body id="page-top">
        @include('templates/_admin-navigation')

        @yield('content')

        <!-- Admin JavaScript Libraries -->
        <script src="/js/admin-libraries.min.js"></script>

        <script>
            // Go Up Plugin
            $(function (){
                jQuery.goup({
                    // How many pixel the button is distant from the edge of the screen
                    locationOffset: 20,
                    // How many pixel the button is distant from the bottom edge of the screen
                    bottomOffset: 20,
                    // The width and height of the button
                    containerSize: 50,
                    // Let you transform a square in a circle
                    containerRadius: 15,
                    // The class name given to the button container
                    containerClass: 'goup-container',
                    // The class name given to the arrow container
                    arrowClass: 'goup-arrow',
                    // Set the button to be always visible
                    alwaysVisible: false,
                    // After how many scrolled down pixels the button must be shown
                    trigger: 500,
                    // The threshold of window width under which the button is permanently hidden
                    hideUnderWidth: 500,
                    entryAnimation: 'fade', // Options: slide, fade
                    // The color of the container
                    containerColor: '#222',
                    // The color of the arrow
                    arrowColor: '#fff',
                    // A text to show on the button mouse hover
                    title: '',
                    // If true the hover title becomes a true text under the button
                    titleAsText: false,
                    // The class name given to the title text
                    titleAsTextClass: 'goup-text',
                    // Set the z-index
                    zIndex: 1
                });
            });

             // Fancybox
            $(document).ready(function() {
                $(".fancybox").fancybox({
                     helpers: {
                        overlay: {
                            locked: false
                        }
                    }
                });
            });

            // Flash Messages
            $('.alert').not('.alert-important').delay(2000).slideUp(300);
            $('#flash-overlay-modal').modal();
        </script>

        @include('admin/flash')

        <!-- Custom Scripts -->
        @yield('custom-scripts')
    </body>
</html>