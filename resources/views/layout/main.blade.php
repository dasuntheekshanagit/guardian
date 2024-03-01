<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/navbars/navbar-1/assets/css/navbar-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />
    <link rel="stylesheet" href={{ asset('assert/css/app.css') }} />
</head>
<body>
    {{-- Navbar 1 - Bootstrap Brain Component --}}
    @include('layout.navbar')
    {{-- End Navbar 1 - Bootstrap Brain Component --}}

    {{-- Main Content --}}
    @yield('content')
    {{-- End Main Content --}}

    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>