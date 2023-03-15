@php
    if (session()->has('account_name')) {
        switch (session('level_id')) {
            case (1):
            break;
            case (2):
            break;
            case (3):
            break;
            default:
                header("Location: signin");
                exit;
        }
    } else {
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
    <link rel="stylesheet" href="..\resources\css\Admin.css">
    <title>Admin</title>
</head>
<body>
    <div class="h1">
        Admin
    </div>
    <div class="menu">
        @php
            require_once '.\menus\homepage.php';
            require_once '.\menus\girl.php';
            require_once '.\menus\origin.php';
            require_once '.\menus\photo.php';
            if(session('level_id') == 1) {
                require_once '.\menus\level.php';
                require_once '.\menus\account.php';
            }
        @endphp 
        <div>
            <ol>
                @php
                    echo 'Account: ' . session('account_name');
                @endphp
                <li>
                    <a href="signout">Signout</a>
                </li>
            </ol>
        </div>   
    </div>
    <div class="content">
        <img src=".\photos\default\1.jpg" alt="">
    </div>
</body>
</html>