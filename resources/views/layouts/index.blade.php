<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ColdxLogistics') }} - @yield('title')</title>
    <meta name="user-id" content="{{ Auth::check() ? Auth::user()->id : '' }}">
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--end::Layout Skins -->
    <!-- <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" /> -->
    <link rel="shortcut icon" href="https://www.coldxpress.com.au/wp-content/uploads/2015/09/c-36x36.png" sizes="32x32">
    <link rel="shortcut icon" href="https://www.coldxpress.com.au/wp-content/uploads/2015/09/c.png" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.coldxpress.com.au/wp-content/uploads/2015/09/c.png">

    <!-- {{ asset('css/skins/aside/dark.css') }} -->

    <!--begin::Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />


    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('plugins/custom/kanban/kanban.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> -->

    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<style>
    .loader {
        /* position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('https://thumbs.gfycat.com/WatchfulSnarlingBettong-max-1mb.gif') 50% 50% no-repeat; */
        margin: 0px;
        display: none;
        padding: 0px;
        position: absolute;
        right: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background-color: #0000003d;
        z-index: 30001;

    }

    #loading {
        position: absolute;
        color: #fff;
        top: 35%;
        left: 45%;
    }

</style>

<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <div class="loader" style="display:none">
        <p id="loading">
            <img src="https://thumbs.gfycat.com/WatchfulSnarlingBettong-max-1mb.gif"><br>
            Please wait! This will may take some time...
        </p>
    </div>
    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="index.html">
                <img alt="Logo" src="{{ asset('../media/logos/logo-light.png') }}" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">


            <!-- begin:: Aside -->
            @include('partials.nav.sidebar')
            <!-- end:: Aside -->

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <!-- begin:: Header -->
                @include('partials.nav.header')
                <!-- end:: Header -->

                <!-- <main class="py-4"> -->
                @yield('content')
                <!-- </main> -->


                <!-- begin:: Footer -->
                @include('partials.nav.footer')
                <!-- end:: Footer -->
            </div>
        </div>
    </div>
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


      //  var audio = new Audio("{{ asset('tone.mp3') }}");
         var audio = new Audio("https://www.seseller.com/tone.mp3");
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('11dc02dab02aa6ac777f', {
            wsHost: window.location.hostname,
 
            forceTLS: false,
            cluster: 'ap2',
     
            authEndpoint: '/broadcasting/auth',
            enableStats: true,
         
           
        });
       
        var userId= document.querySelector("meta[name='user-id']").getAttribute("content");

        var channel = pusher.subscribe('private-App.Models.User.'+userId);
        channel.bind('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(notification) {
         
            var notifications = $('.staff_notifications');
            var existingNotificationHTML = notifications.html();
            var newNotificationHtml = `
        <div class="kt-notification__item" style="cursor:pointer">

        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
            ${notification.message}`;

            newNotificationHtml += `</div>
            <div class="kt-notification__item-time">Now</div>
        </div>
    </div>
        `;
            notifications.html(newNotificationHtml + existingNotificationHTML);
            $('#staff_notification_count').html(notification.count);
            $("#staff_bell").css("color", "#fd397a");
            $('#empty_notification').empty();

            toastr.options = {
                    "closeButton": true
                    , "debug": false
                    , "newestOnTop": false
                    , "progressBar": false
                    , "positionClass": "toast-top-right"
                    , "preventDuplicates": false
                    , "onclick": null
                    , "showDuration": "300"
                    , "hideDuration": "1000"
                    , "timeOut": "5000"
                    , "extendedTimeOut": "1000"
                    , "showEasing": "swing"
                    , "hideEasing": "linear"
                    , "showMethod": "fadeIn"
                    , "hideMethod": "fadeOut"
                };

                toastr.success(notification.message);
                
            audio.play();
        });

        function stopTone() {
            audio.pause();

            audio.currentTime = 0;
        }

    </script>

    <!-- end::Global Config -->
    <!--begin::Global Theme Bundle(used by all pages) -->

    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>

    <!--begin::Page Vendors(used by this page) -->
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>

    <!-- AIzaSyDLnQLrH2SvNYBlKMAy7FnCiViXlGngYeg -->
    <script src="{{ asset('plugins/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>

    <!--end::Page Vendors -->
    <!--begin::Page Vendors(used by this page) -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('js/datatable_crud/initDatatable.js') }}" type="text/javascript"></script>
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-daterangepicker.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/utilities/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>


    <!-- end::Global Config -->



    <!--end::Global Theme Bundle -->

    {{-- <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    --}}

    @yield('scripts')



</body>

</html>
