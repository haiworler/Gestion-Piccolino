<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link href="{{asset('css/bootstraplogin.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('js/bootstraplogin.js')}}"></script>
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>

<body id="app-layout">

    <section class="login-block">
        @yield('content')
    </section>
</body>

</html>