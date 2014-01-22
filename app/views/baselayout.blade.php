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
                'mazweb/application',
                'mazweb/core/jquery.mazweb'
            ],
            init: function ($, application) {
                $(document).ready(function () {
                    // Load the main app module to start the app
                    requirejs([app.dir + "/mazweb/js/homepage"]);

                    application.rootPath = "{{ url('/') }}";

                    // init application
                    application.init();

                    application.api.parallax.enable();
                    application.api.navmenu.enable();

                    // Message defaults
                    $.message.setDefaults({
                        container: '#site-message-container',
                        positionElement: '#hd',
                        positionX: 'center',
                        offsetY: 32
                    });
                });
            }
        };
    </script>
</head>
<body>

<div id="site-message-container" class="messages"></div>

<div id="page-container">
    <div id="hd"></div>
</div>

@yield('content')
@yield('scripts')
</body>
</html>