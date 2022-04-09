<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authorization | Pandoraliving CMS</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first" style="margin-bottom: 10px">
            <img src="{{ asset('img/logo.png') }}" id="icon" alt="Company logo" />
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" id="login" class="fadeIn second" required name="email" placeholder="Login">
            <input type="text" id="password" class="fadeIn third" required name="password" placeholder="Password">
            <input type="submit" class="fadeIn fourth" value="Log in">
        </form>
    </div>
</div>
</body>
</html>
