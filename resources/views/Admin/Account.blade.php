@php
    require_once '.\menus\cookie.php';
    require_once '.\menus\levelBoss.php';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\account.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Account</title>
</head>
<body>
    <div class="h1">
        <div class="admin">Admin</div>
    </div>
    <div class="menu">
        <div class="search">
            <form action="">
                <input type="text" name="name">
                <button><i>Search</i></button>
            </form>
        </div>
        @php
            require_once '.\menus\homepage.php';
            require_once '.\menus\girl.php';
            require_once '.\menus\origin.php';
            require_once '.\menus\photo.php';
            if(session('level_id') == 1) {
                require_once '.\menus\level.php';
                require_once '.\menus\account.php';
            }
            require_once './menus/bill.php';
            require_once './menus/user.php';
        @endphp    
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
    <script src="../resources/js/menuAdmin.js"></script>
</body>
</html>