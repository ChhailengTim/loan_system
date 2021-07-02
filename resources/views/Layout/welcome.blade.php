<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>😍Lara❤vue😍</title>
    <!-- Font Awesome 5.12 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    {{--Jqerry--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{--Loading Overlay--}}
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    {{--sweetalert2--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container" id="app">
    <ul>
        <li>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{ url('/category') }}">Category</a>
        </li>
    </ul>
    @yield('panel')
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

