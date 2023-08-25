<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>


    <!-- Favicons -->
    <link href="/template/assets/img/favicon.png" rel="icon">
    <link href="/template/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">



    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    @include('partials.navbar')
    <div class="container mt-3">
        @yield('container')
    </div>



<!-- Template Main JS File -->
<script src="/template/assets/js/main.js"></script>
<script src="/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
