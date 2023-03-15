<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\ViewGirl.css">
    <title>Girl</title>
</head>
<body>
    <div class="logo">
        <img src=".\photos\default\logo.jpg" alt="">
    </div>
    <div class="banner"></div>
    <div class="search">
    </div>
    <div class="menu">
        @php
            require_once '.\menus\homepage.php';
        @endphp
        <div>
            <ol>
                Origin
                <li>
                    @foreach($origins as $origin)
                        <a href="?origin_id={{ $origin->origin_id }}">{{ $origin->origin_name }}</a>
                        <br>
                    @endforeach
                </li>
            </ol>
        </div>
        <div>
            <a href=".\bill">
                @php
                    if(session()->has('total_item')) {
                        if (session('total_item') == 1) {
                            echo 'Cart: ' . session('total_item') . ' item';
                        } else {
                            echo 'Cart: ' . session('total_item') . ' items';
                        }    
                    }
                @endphp
            </a>
        </div>
        <div>
            <ol>
                @php
                    if (session()->has('account_name')) {
                        echo 'Tài khoản: ' . session('account_name');
                    } else {
                        echo 'Account';
                    }
                @endphp
                <li>
                    @switch(session('level_id'))
                        @case(1)
                            <a href="admin">Admin</a>
                            <br>
                            @break
                        @case(2)
                            <a href="admin">Admin</a>
                            <br>
                            @break
                        @case(3)
                            <a href="admin">Admin</a>
                            <br>    
                            @break
                        @default         
                 @endswitch
                    @if (session()->has('account_name'))
                        <a href="change_password">Change Password</a>
                        <br> 
                        <a href="signout">Signout</a>
                        <br> 
                    @else      
                        <a href="signin">Signin</a>
                        <br>
                        <a href="signup">Signup</a>
                        <br>
                    @endif
                </li>
            </ol>
        </div>
    </div>
    <div class="content">
        @php
            if (session()->has('message')) {
                echo session('message');
                session()->forget('message');
            }
        @endphp
        @foreach ($girls as $girl)
        <div class="girl">
            <div>
                <img src="{{ $girl->girl_avatar }}" alt="">
            </div>
            <div>
                ID: {{ $girl->girl_id }}
                <br>
                {{ $girl->girl_name }}
                <br>
                {{ $girl->origin_name }}
                <br>
                <a href="">Price: {{ $girl->price }} $</a>
                <br>
                <button>
                    <a href=".\add_to_cart?id={{ $girl->girl_id }}">Add to cart</a>
                </button>
            </div>
        </div>
        @endforeach
        <div class="line"></div>
        <div class="photo">
            @foreach ($photos as $photo)
                <div class="item">
                    <a href="http://localhost/haisansach/public{{ $photo->url }}" target="blank">
                        <img src="{{ $photo->url }}" alt="">
                    </a>
                </div>
            @endforeach
            
        </div>
        <div class="page">
            {{ $photos->links() }}
        </div>
    </div>
</body>
</html>