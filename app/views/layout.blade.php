<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta name="description" content="@yield('description','magazine website')">
    <meta name="keywords" content="@yield('keywords','magazine')">
    <meta name="viewport" content="width=device-width">
    <title>@yield('title','Mazweb Page')</title>
    <link href="{{ url('assets/css/frontend.css') }}" media="all" rel="stylesheet" type="text/css"/>
    @yield('styles')
    <script data-main="assets/js/main" src="{{ url('../bower_components/requirejs/require.js') }}"></script>
    <script type="text/javascript">
        var app = {
            dir: '../bower_components',
            deps: [
                '$',
                'mazweb/application'
            ],
            init: function ($, application) {
                $(document).ready(function () {
                    // Load the main app module to start the app
                    requirejs([app.dir + "/mazweb/js/homepage"]);

                    // init application
                    application.init();

                    application.api.parallax.enable();
                    application.api.navmenu.enable();
                });
            }
        };
    </script>
</head>
<body>
<a class="btn btn-primary btn-lg toggle" href="#" id="menu-toggle"><i class="fa fa-bars"></i></a>
<div id="sidebar-wrapper" class="">
    <ul class="sidebar-nav">
        <a class="btn btn-default btn-lg pull-right toggle" href="#" id="menu-close"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand"><a href="http://startbootstrap.com">Start Bootstrap</a></li>
        <li><a href="#top">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</div>

@yield('content')
@yield('scripts')
</body>
</html>