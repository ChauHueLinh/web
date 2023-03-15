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
    <link rel="stylesheet" href="..\resources\css\Girl.css">
    <title>Girl</title>
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
        @php
            if (session()->has('message')) {
                echo session('message');
                session()->forget('message');
            }
        @endphp
        @foreach ($girls as $girl)
        <div class="card">
            <div>
                <a href="">ID: {{ $girl->girl_id }}</a>
                <br>
                <a href="">{{ $girl->girl_name }}</a>
                <br>
                <a href="">{{ $girl->origin_name }}</a>
                <br>
                <a href="">Price: {{ $girl->price }} $</a>
                <br>
                <a href="{{ $girl->girl_info }}" target="blank">{{ $girl->girl_info }}</a>
                <br>
                @switch(session('level_id'))
                    @case(1)
                        <a href=".\edit_girl?id={{ $girl->girl_id }}">Edit</a> | <a href=".\delete_girl?id={{ $girl->girl_id }}">Delete</a>
                        @break
                    @case(2)
                        <a href=".\edit_girl?id={{ $girl->girl_id }}">Edit</a>
                        @break
                    @default
                        
                @endswitch
                <a href=".\add_photo?girl_id={{ $girl->girl_id }}">Add photo</a>
            </div>
            <img src="{{ $girl->girl_avatar }}" alt="">
        </div>
        @endforeach
        <div class="page">
            {{ $girls->links() }}
        </div>
    </div>
</body>
</html>