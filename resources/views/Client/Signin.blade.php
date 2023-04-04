
@php
    require_once '.\menus\cookie.php';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\Signin.css">
    <title>Signin</title>
</head>
<body>
    <div class="h1">Signin</div>
    <div class="content">
        <div class="form">
            <form method="POST" action="{{ route('signin_process') }}">
                @csrf
                @php
                    if (session()->has('message')) {
                        echo session('message');
                    }
                @endphp
                <div class="name">
                    Name
                    <br>
                    <input type="text" name="account_name">
                </div>
                <br>
                <div class="password">
                    Password
                    <br>
                    <input type="password" name="account_password">
                </div>
                <br>
                <div class="remember">
                    Ghi nhớ đăng nhập
                    <input type="checkbox" name="remember">
                </div>
                <br>
                <button type="submit">
                    Signin
                </button>
                <button type="button">
                    <a href=".\signup">Signup</a>
                </button>
            </form>
        </div>
    </div>
</body>
</html>