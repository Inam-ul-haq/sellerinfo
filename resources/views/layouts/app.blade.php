<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="user-id" content="{{Auth::check() ? Auth::user()->id : ''}}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="description" content="Login page example">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

        <!--end::Fonts -->

        <!--begin::Page Custom Styles(used by this page) -->
        <!-- <link href="{{asset('css/pages/login/login-1.css')}}" rel="stylesheet" type="text/css" /> -->

        <!--end::Page Custom Styles -->
        <link href="{{asset('css/pages/login/login-3.css')}}" rel="stylesheet" type="text/css" />

        <!--begin::Global Theme Styles(used by all pages) -->

        <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="{{asset('css/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <!--end::Layout Skins -->
        <link rel="shortcut icon" href="{{asset('media/logos/favicon.ico')}}" />
    </head>
<body>



        <!-- <main class="py-4"> -->
            @yield('content')
        <!-- </main> -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>

    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{asset('plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/scripts.bundle.js')}}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <!-- <script src="{{asset('public/js/pages/custom/login/login-general.js')}}" type="text/javascript"></script> -->
    <!-- <script src="{{asset('js/pages/custom/login/login-1.js')}}" type="text/javascript"></script> -->

</body>

</body>
</html>
