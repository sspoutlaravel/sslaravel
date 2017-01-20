<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ShopingSpout - Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('backend/bootstrap/css/bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('backend/bootstrap/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap/js/respond.min.js') }}"></script>
    <![endif]-->
    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('backend/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- wrapper start -->
<div class="wrapper">

    <!-- print each section having name content start -->
        @yield('content')
    <!-- print each section having name content end -->

</div>
<!-- wrapper end -->

<!-- footer scripts start -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/bootstrap/js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<!-- footer scripts end -->
<!-- end of html page with body & html -->
</body>
</html>