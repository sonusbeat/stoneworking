<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cubiertas de Marmol, Granito y Onix para Cocinas y Negocios - Stone Working</title>

        <meta name="description" content="Servicio de instalación de Mármol, Granito, Onix, Cuarzo entre otros materiales hermosos para crear espectaculares cubiertas para el hogar o negocios comerciales">
        <meta name="robots" content="index, nofollow">

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Custom Fonts -->
        <!-- <link rel="stylesheet" href="css/fontastic.css"> -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet'>

        <!-- Plugins CSS -->
        <link href="/css/jquery.bxslider.css" rel="stylesheet" />
        <!-- <link href="/css/magnific-popup.css" rel="stylesheet"> -->

        <!-- Theme CSS -->
        <link href="/css/main.min.css" rel="stylesheet">

        <!-- Libraries CSS -->
        <link href="/css/libraries.min.css" rel="stylesheet">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->     
    </head>

    <body id="page-top">

        @include('public/partials/navigation')

        @yield('content')

        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- JavaScript Plugins -->
        <script src="js/libraries.min.js"></script>

        <!-- Custom Scripts -->
        @yield('custom-scripts')

        <!-- Go Up Plugin -->
        <script>
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

                // BX Slider
                $(document).ready(function(){
                  $('.bxslider').bxSlider({
                    mode: 'horizontal',
                    speed: 400,
                    infiniteLoop: true,
                    useCSS: false,
                    easing: 'easeOutBack',
                  });
                });
            });
        </script>
    </body>
</html>