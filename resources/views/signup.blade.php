<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\resources\css\signin.css">
    <title>Signin</title>
</head>
<body>
    <div class="login-box">
        <h2>Signup</h2>
        <?php
        if (session()->has('flag')) { ?> 
            <p> <?php echo session('flag') ?> </p>
            <?php session()->forget('flag');
        }
        ?>
        <form method="POST" action="add_account">
            @csrf
            <div class="user-box">
                <input type="text" name="user">
                <label>User</label>
            </div>
            <div class="user-box">
                <input type="password" name="password">
                <label>Passsword</label>
            </div>
            <button type="submit">
                    Signup
            </button>
            <br>
            <p>You do have an account?</p>
            <br>
            <button>
                <a href="{{ route('signin') }}">
                    Signin
                </a>
            </button>
        </form>
      </div>
</body>
</html>