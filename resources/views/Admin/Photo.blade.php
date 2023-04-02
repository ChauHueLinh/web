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
    <link rel="stylesheet" href="..\resources\css\Photo.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Photo</title>
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
        @php
            if (session()->has('message')) {
                echo session('message');
                session()->forget('message');
            }
        @endphp
        <div class="photos">
            @foreach ($photos as $photo)
            <div class="card">
                <div class="detail">
                    <a href="">{{ $photo->girl_name }}</a>
                    <br>
                    <a href=".\delete_photo?id={{ $photo->photo_id }}">Delete</a>
                </div>
                <img src="../public/photos/{{ $photo->folder }}/{{ $photo->name }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
    <div class="gallery">
        <div class="close">
            <img src=".\photos\default\close.png" alt="">
        </div>
        <div class="gallery-img">
            <img src="" alt="">
        </div>
        <div class="previous">
            <img src=".\photos\default\previous.png" alt="">
        </div>
        <div class="next">
            <img src=".\photos\default\next.png" alt="">
        </div>
    </div>
    <script src="../resources/js/menuAdmin.js"></script>
    <script src="../resources/js/viewPhoto.js"></script>
</body>
</html>