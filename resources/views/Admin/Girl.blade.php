@php
    require_once '.\menus\cookie.php';
    require_once '.\menus\levelStaff.php';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\Girl.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Girl</title>
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
            require_once './menus/user.php';
        @endphp 
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
                        <a href=".\edit_girl?id={{ $girl->girl_id }}">Edit</a> | <a href=".\delete_girl?id={{ $girl->girl_id }}">Delete</a> |
                        @break
                    @case(2)
                        <a href=".\edit_girl?id={{ $girl->girl_id }}">Edit</a> |
                        @break
                    @default
                        
                @endswitch
                <a href=".\add_photo?girl_id={{ $girl->girl_id }}">Add photo</a>
            </div>
            <img src="../public/photos/{{ $girl->folder }}/{{ $girl->girl_avatar }}" alt="">
        </div>
        @endforeach
        <div class="page">
            {{ $girls->links() }}
        </div>
    </div>
    <script src="../resources/js/menuAdmin.js"></script>
</body>
</html>