
@php
    if (session()->has('account_name')) {
        switch (session('level_id')) {
            case (1):
            break;
            case (2):
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
    <link rel="stylesheet" href="..\resources\css\EditGirl.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Edit Girl</title>
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
        <div class="title">Edit Girl</div>
        <div class="before-after">
            <div>Before</div>
            <div>After</div>
        </div>
        <div class="before">
            <div>
                @foreach ($girls as $girl)
                    ID: {{ $girl->girl_id }}
                    <br><br>
                    Name
                    <br>
                    {{ $girl->girl_name }}
                    <br><br>
                    Infomation
                    <br>
                    {{ $girl->girl_info }}
                    <br><br>
                    girl_avatar
                    <br>
                    <img src="{{ $girl->girl_avatar }}" alt="">
                    <br><br>
                    Origin
                    <br>
                    {{ $girl->origin_name }}
                @endforeach
            </div>
        </div>
        <div class="form">
            <form method="POST" action="{{ route('edit_girl_process') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    @foreach ($girls as $girl)
                        <input type="hidden" name="girl_id" value="{{ $girl->girl_id }}">
                        ID: {{ $girl->girl_id }}
                        <br><br>
                        Name
                        <br>
                        <input type="text" name="girl_name">
                        <br><br>
                        Infomation
                        <br>
                        <input type="text" name="girl_info">
                        <br><br>
                        girl_avatar
                        <br>
                        <input type="file" name="girl_avatar">
                        <br><br>
                        Origin
                        <br>
                        <select name="origin_id">
                            @foreach ($origins as $origin)
                                <option value="{{ $origin->origin_id }}">{{ $origin->origin_name }}</option>
                            @endforeach
                        </select>
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