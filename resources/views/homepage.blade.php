<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>2 chan bank</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='..\resources\css\homepage.css'>
    <script src='main.js'></script>
</head>
<body>
    <div class="logo_search_account">
        <div class="logo">
            <img src="..\photos\logo.jpg">
        </div>
        <div class="search">
            <form action="search" method="get">
                <input type="text" placeholder="Search" name="q">
            </form>
        </div>
        <div class="account">
            <?php 
                if(session()->has('user')){ ?>
                    <p><?php echo 'User: ' . session('user') ?></p>
                    <?php
                        if(session('level_id') <= 2){ ?>
                            <a href="{{ route('admin') }}">Admin</a>
                        <?php } 
                    ?>
                    <a href="{{ route('logout') }}">Logout</a>
                <?php } else { ?>
                    <a href="{{ route('signin') }}">Đăng nhập</a>
                <?php } 
            ?>
        </div>
    </div>
    <div class="content">
        <div class="menu">
            <div>
                Homepage
            </div>
            <div>
                Vietnam
            </div>
            <div>
                China
            </div>
            <div>
                Korea
            </div>
            <div>
                US-UK
            </div>
            <div>
                Unknow
            </div>
        </div>
        <div class="product">
            <?php
            if (session()->has('flag')) {
                echo session('flag');
                session()->forget('flag');
            }
            foreach($products as $product){ ?>
            <div>
                ID: <?php echo $product->product_id ?>
                <img src="<?php echo $product->product_avatar ?>">  
                <?php echo $product->product_name ?>
                <br>
                <?php echo $product->origin_name ?>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>