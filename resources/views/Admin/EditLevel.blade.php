
@php
    require_once '.\menus\cookie.php';
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
    <link rel="stylesheet" href="..\resources\css\EditLevel.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Edit level</title>
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
        <div class="title">Edit level</div>
        <div class="before-after">
            <div>Before</div>
            <div>After</div>
        </div>
        <div class="before">
            <div>
                @foreach ($levels as $level)
                        ID: {{ $level->level_id }}
                        <br><br>
                        Name
                        <br>
                        {{ $level->level_name }}
                @endforeach
            </div>
        </div>
        <div class="form">
            <form method="POST" action="{{ route('edit_level_process') }}">
                @csrf
                <div>
                    @foreach ($levels as $level)
                        ID: {{ $level->level_id }}
                        <br><br>
                        Name
                        <br>
                        <input type="text" name="level_name">
                        <input type="hidden" name="level_id" value="{{ $level->level_id }}">
                    @endforeach
                </div>
                <br><br>
                <button type="submit">
                    Update
                </button>
            </form>
        </div>
    </div>
    <script src="../resources/js/menuAdmin.js"></script>
</body>
</html>