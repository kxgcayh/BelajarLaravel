<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{ asset('material') }}/assets/images/favicon.ico">
    <title>SignUp</title>
    <link href="{{ asset('material') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material') }}/assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('material') }}/assets/js/modernizr.min.js"></script>
</head>

<body>
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        {{-- Content Started Here --}}
        @yield('content')
    </div>
    <script>
        var resizefunc = [];
    </script>
    {{-- jQuery --}}
    <script src="{{ asset('material') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('material') }}/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
    <script src="{{ asset('material') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('material') }}/assets/js/detect.js"></script>
    <script src="{{ asset('material') }}/assets/js/fastclick.js"></script>
    <script src="{{ asset('material') }}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('material') }}/assets/js/jquery.blockUI.js"></script>
    <script src="{{ asset('material') }}/assets/js/waves.js"></script>
    <script src="{{ asset('material') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('material') }}/assets/js/jquery.nicescroll.js"></script>
    <script src="{{ asset('material') }}/assets/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('material') }}/assets/js/jquery.core.js"></script>
    <script src="{{ asset('material') }}/assets/js/jquery.app.js"></script>
</body>

</html>
