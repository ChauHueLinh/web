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
    <link rel="stylesheet" href="..\resources\css\AddGirl.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Add Girl</title>
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
        <div class="title">
            Add Girl
            <br>
            @php
            if (session()->has('message')) {
                echo session('message');
                session()->forget('message');
            }
            @endphp
        </div>
        <div class="form">
            <form method="POST" action="{{ route('add_girl_process') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    Name
                    <br>
                    <input type="text" name="girl_name">
                </div>
                <br>
                <div>
                    Infomation
                    <br>
                    <input type="text" name="girl_info">
                </div>
                <br>
                <div>
                    Avatar
                    <br>
                    <input type="file" name="girl_avatar">
                </div>
                <br>
                <div>
                    Price
                    <br>
                    <input type="number" name="price">
                </div>
                <br>
                <div>
                    Origin
                    <br>
                    <select name="origin_id">
                        @foreach ($origins as $origin)
                            <option value="{{ $origin->origin_id }}">{{ $origin->origin_name }}</option>
                        @endforeach
                    </select>
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