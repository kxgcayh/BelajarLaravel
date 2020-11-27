<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{ asset('material')}}/assets/images/favicon.ico">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('material')}}/plugins/morris/morris.css" rel="stylesheet">
    <link href="{{ asset('custom/bootstrap4')}}/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('material')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('material')}}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
    {{-- DataTables --}}
    <link href="{{ asset('material')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('material')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('material')}}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('material')}}/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('material')}}/assets/js/modernizr.min.js"></script>
    @stack('top-script')
</head>

<body class="fixed-left">
    <div id="wrapper">
        @topBar @leftSideBar
        <div class="content-page">
            {{-- Start content --}}
            <div class="content">
                <div class="container-fluid">
                    {{-- Page-Title --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">
                                @yield('page-title')
                            </h4>
                            @yield('breadCrumb')
                        </div>
                    </div>
                    {{-- Content Start Here --}}
                    @yield('content')
                </div>
            </div>
            @footer
        </div>
    </div>
    @footerScript
</body>

</html>
