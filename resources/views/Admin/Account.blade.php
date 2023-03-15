@php
    if (session()->has('account_name')) {
        switch (session('level_id')) {
            case (1):
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
    <link rel="stylesheet" href="..\resources\css\Origin.css">
    <title>Account</title>
</head>
<body>
    <div class="h1">Admin</div>
    <div class="search">
        <form action="">
            <input type="text" name="name">
            <button><i>Search</i></button>
        </form>
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
        <div class="title">
            <div>ID</div>
            <div>Name</div>
            <div>Level</div>
            <div>Action</div>
        </div>
        @php
            if (session()->has('message')) {
                echo session('message');
                session()->forget('message');
            }
        @endphp
        <div class="data">
            @foreach ($accounts as $account)
            <div class="each-data">
                <div>{{ $account->account_id }}</div>
                <div>{{ $account->account_name }}</div>
                <div>{{ $account->level_name }}</div>
                <div>
                    <a href=".\edit_account?id={{ $account->account_id }}">Edit</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>