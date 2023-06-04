<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JDIH APP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap/css/bootstrap.min.css">
    <style>
      body {
        background-image: url("{{ asset('assets/images/bg_app.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center bottom;
        min-height: 100vh;
      }
    </style>
</head>
<body>

  <!-- Bottom Navbar -->
  @include('mobile.layouts.nav')


  <article class="container py-5 ">
    @yield('content')
  </article>
  
  <script src="{{ asset('') }}vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>