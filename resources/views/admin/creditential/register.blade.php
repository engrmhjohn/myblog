<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAsset') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('adminAsset') }}/css/login_css.css">
</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form class="register" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="text" class="login__input" name="name" placeholder="Full Name">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="email" class="login__input" name="email" placeholder="Email">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" name="password" placeholder="Password">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <button class="button login__submit">
                    <span class="button__text">Register Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
            <div class="social-login">
                <hr>
                <a href="{{ route('login') }}" class="btn btn-outline-success text-white">or Log In</a>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>
<script src="{{ asset('adminAsset') }}/js/bootstrap.bundle.min.js"></script>
</body>
</html>
