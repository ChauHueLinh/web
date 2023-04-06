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
    <link rel="stylesheet" href="..\resources\css\Admin.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Admin</title>
</head>
<body>
    <div class="h1">
        <div class="admin">Admin</div>
    </div>
    <div class="menu">
        @php
            require_once './menus/homepage.php';
            require_once './menus/girl.php';
            require_once './menus/origin.php';
            require_once './menus/photo.php';
            if(session('level_id') == 1) {
                require_once './menus/level.php';
                require_once './menus/account.php';
            }
            require_once './menus/bill.php';
            require_once './menus/user.php';
        @endphp 
    </div>
    <div class="content">
        <img src="./photos/default/1.jpg" alt="" id="img">
    </div>
    <script src="../resources/js/menuAdmin.js"></script>
    <script src="../resources/js/imgAdmin.js"></script>
</body>
</html>