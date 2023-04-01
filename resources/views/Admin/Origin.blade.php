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
    <link rel="stylesheet" href="..\resources\css\Origin.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Origin</title>
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
        @endphp 
        <div class="user" id="user">
            @php
                echo 'User: ' . session('account_name');
            @endphp
        </div>
        <div class="user-action-hide" id="user-action">
            <a href="signout">Signout</a>
        </div>   
    </div>
    <div class="content">
        <div class="title">
            <div>ID</div>
            <div>Name</div>
            <div>Action</div>
        </div>
        @php
            if (session()->has('message')) {
                echo session('message');
                session()->forget('message');
            }
        @endphp
        <div class="data">
            @foreach ($data as $value)
            <div class="each-data">
                <div>{{ $value->origin_id }}</div>
                <div>{{ $value->origin_name }}</div>
                <div>
                    @switch(session('level_id'))
                        @case(1)
                        <a href=".\edit_origin?id={{ $value->origin_id }}">Edit</a> | <a href=".\delete_origin?id={{ $value->origin_id }}">Delete</a>
                            @break
                        @case(2)
                        <a href=".\edit_origin?id={{ $value->origin_id }}">Edit</a>
                            @break
                    @default
                        
                    @endswitch
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="../resources/js/menuAdmin.js"></script>
</body>
</html>