<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mobil Rental Mania</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap Documentation Template For Software Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="{{ url('assets/fontawesome/js/all.min.js') }}"></script>

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/theme.css">

</head>

<body>

    @yield('content')

    <!-- Javascript -->
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/plugins/smoothscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/highlight-custom.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplelightbox/simple-lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/gumshoe/gumshoe.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/js/docs.js') }}"></script>

</body>

</html>
