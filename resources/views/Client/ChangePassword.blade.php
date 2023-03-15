
@php
    if(empty(session('account_id'))) {
        header("location: signin");
        exit;
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\Signup.css">
    <title>Password</title>
</head>
<body>
    <div class="h1">Change Password</div>
    <div class="content">
        <div class="form">
            <form method="POST" action="{{ route('change_password_process') }}">
                @csrf
                @php
                    if (session()->has('message')) {
                        echo session('message');
                        session()->forget('message');
                    }
                @endphp
                <div>
                    Name:
                    @php
                        echo session('account_name');
                    @endphp
                </div>
                <br>
                <div>
                    Current Password
                    <br>
                    <input type="password" name="current_password">
                </div>
                <br>
                <div>
                    New Password
                    <br>
                    <input type="password" name="new_password">
                </div>
                <br>
                <button type="submit">
                    Update
                </button>
            </form>
        </div>
    </div>
</body>
</html>