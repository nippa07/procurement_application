<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">

    @include('auth.includes.css')
</head>

<body class="bg-default">

    @include('auth.includes.navbar')
    <!-- Main content -->
    <div class="main-content">
        @yield('content')
    </div>

    @include('auth.includes.footer')

    @include('auth.includes.js')
</body>

</html>
