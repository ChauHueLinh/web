<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\Signup.css">
    <title>Signup</title>
</head>
<body>
    <div class="h1">Signup</div>
    <div class="content">
        <div class="form">
            <form method="POST" action="{{ route('signup_process') }}">
                @csrf
                @php
                    if (session()->has('message')) {
                        echo session('message');
                    }
                @endphp
                <div>
                    Name
                    <br>
                    <input type="text" name="account_name">
                </div>
                <br>
                <div>
                    Password
                    <br>
                    <input type="password" name="account_password">
                </div>
                <br>
                <button type="submit">
                    Signup
                </button>
                <button type="button">
                    <a href=".\signin">Signin</a>
                </button>
            </form>
        </div>
    </div>
</body>
</html>