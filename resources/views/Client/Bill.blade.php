
@php
    require_once '.\menus\cookie.php';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\Bill.css">
    <link rel="stylesheet" href="..\resources\css\menuClient.css">
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
        <div class="origin" id="origin">
            Origin
        </div>
        <div class="origin-action-hide" id="origin-action">
            @foreach($origins as $origin)
                <a href="?origin_id={{ $origin->origin_id }}">{{ $origin->origin_name }}</a>
                <br>
            @endforeach
        </div>
        <div class="cart">
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
        <div class="user" id="user">
            @php
                if (session()->has('account_name')) {
                    echo 'User: ' . session('account_name');
                } else {
                    echo 'Account';
                }
            @endphp
        </div>
        <div class="user-action-hide" id="user-action">
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
        </div>
        <div class="new-photo" id="new-photo">
            <img src="" id="img">
        </div>
    </div>
    <div class="content">
        <div class="title">
            <div>ID</div>
            <div>Name</div>
            <div>Avatar</div>
            <div>Quantity</div>
            <div>Price</div>
            <div>Total</div>
        </div>
        @foreach ($cart as $girl)
            <div class="girl">
                <div>{{ $girl['girl_id'] }}</div>
                <div>{{ $girl['girl_name'] }}</div>
                <div>
                    <img src="../public/photos/{{ $girl['folder'] }}/{{ $girl['girl_avatar'] }}" alt="">
                </div>
                <div>
                    <button>
                        <a href=".\remove_from_cart?id={{ $girl['girl_id'] }}">-</a>
                    </button>
                    {{ $girl['quantity'] }}
                    <button>
                        <a href=".\add_to_cart?id={{ $girl['girl_id'] }}">+</a>
                    </button>
                </div>
                <div>{{ $girl['price'] }} $</div>
                <div>{{ $girl['total'] }} $</div>
            </div>
        @endforeach
        <div class="total">
            <div>
                Tổng: {{ $total }} $
                <br>
                <button>Thanh toán</button>
            </div>
        </div>
    </div>
    <script src="../resources/js/menuClient.js"></script>
</body>
</html>