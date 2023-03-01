<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='..\resources\css\admin.css'>
    <script src='main.js'></script>
</head>
<body>
    <p>Admin</p>
    <div class="menu">
        <?php
            if(session('level_id') == 1){ ?>
                <div>
                    <a href="{{ route('admin/accounts') }}">Accounts</a>
                </div>
            <?php }
        ?>
        <div>
            <a href="{{ route('admin/products') }}">Products</a>
        </div>
    </div>
</body>
</html>