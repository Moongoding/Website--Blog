<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KMM Blog| {{ $title }}</title>

    <!-- Favicons -->
    <link href="/template/assets/img/favicon.png" rel="icon">
    <link href="/template/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="/template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    {{-- <link href="/css/dashboard.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    @include('partials.navbar')

    <div class="container mt-3">
        @yield('container')
    </div>
    <script src="/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/style.js"></script>
</body>



























</html>
