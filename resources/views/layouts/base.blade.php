<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <a href="https://docs.fontawesome.com/" target="_blank">Font Awesome Documentatie</a> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
       <!-- Link to the file hosted on your server, -->
<link rel="stylesheet" href="path-to-the-file/splide.min.css">

<!-- or link to the CDN -->
<link rel="stylesheet" href="url-to-cdn/splide.min.css">
    @vite(['resources/css/app.css'])
    <title>InnoHuis</title>
</head>
<body>
@include('navigation.nav')
    @show
    <main>
      
         @yield('content')
    </main>

    <script src="path-to-the-file/splide.min.js"></script>
    <!-- <script src="resources/js/app.js"></script> -->
    @vite('resources/js/app.js')
</body>
</html>