<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@@yield('title')</title>
    <link  href="{{ asset('css/inicio.css') }}" >
</head>


<body>
    <!--header-->
    <!--nav-->
        @yield('content')
     
    

</body>
</html>