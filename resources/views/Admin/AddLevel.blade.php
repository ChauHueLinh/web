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
    <link rel="stylesheet" href="..\resources\css\addLevel.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Add Level</title>
</head>
<body>
    <div class="h1">
        <div class="admin">Admin</div>
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
            require_once './menus/user.php';
        @endphp    
    </div>
    <div class="content">
        <div class="title">
            Add Level
            <br>
            @php
            if (session()->has('message')) {
                echo session('message');
                session()->forget('message');
            }
            @endphp
        </div>
        <div class="form">
            <form method="POST" action="{{ route('add_level_process') }}">
                @csrf
                <div>
                    Name
                    <br>
                    <input type="text" name="level_name">
                </div>
                <br>
                <button type="submit">
                    Add
                </button>
            </form>
        </div>
      </div>
      <script src="../resources/js/menuAdmin.js"></script>
</body>
</html>