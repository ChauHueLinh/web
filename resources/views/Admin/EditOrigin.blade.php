
@php
    require_once '.\menus\cookie.php';
    require_once '.\menus\levelManager.php';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\EditOrigin.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Edit Origin</title>
</head>
<body>
    <div class="h1">Admin</div>
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
            require_once './menus/bill.php';
            require_once './menus/user.php';
        @endphp
    </div>
    <div class="content">
        <div class="title">Edit origin</div>
        <div class="before-after">
            <div>Before</div>
            <div>After</div>
        </div>
        <div class="before">
            <div>
                @foreach ($data as $value)
                        ID: {{ $value->origin_id }}
                        <br><br>
                        Name
                        <br>
                        {{ $value->origin_name }}
                @endforeach
            </div>
        </div>
        <div class="form">
            <form method="POST" action="{{ route('edit_origin_process') }}">
                @csrf
                <div>
                    @foreach ($data as $value)
                        ID: {{ $value->origin_id }}
                        <br><br>
                        Name
                        <br>
                        <input type="text" name="origin_name">
                        <input type="hidden" name="origin_id" value="{{ $value->origin_id }}">
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