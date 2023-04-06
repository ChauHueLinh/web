
@php
    require_once '.\menus\cookie.php';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\cart.css">
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
        @php
            require_once '.\menus\cart.php';
            require_once '.\menus\billClient.php';
            require_once '.\menus\userClient.php';
        @endphp
    </div>
    <div class="content">
        <div class="client-infomation">
            <form method="POST" action="{{ route('cart_process') }}">
                @csrf
                <div class="name">
                    @php
                        echo 'Name: ' . session('account_name');
                    @endphp
                </div>
                <br>
                <div class="address">
                    Address
                    <br>
                    <input type="text" name="address">
                </div>
                <br>
                <div class="phone-number">
                    Phone number
                    <br>
                    <input type="number" name="phone_number">
                </div>
                <br>
                <button type="submit">
                    Thanh toán
                </button>
                <br>
                <button class="back-to-cart" type="button">
                    Quay lại giỏ hàng
                </button>
            </form>
        </div>
        <div class="cart-bill">
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
                        <button class="minus">
                            <a href=".\remove_from_cart?id={{ $girl['girl_id'] }}">-</a>
                        </button>
                        {{ $girl['quantity'] }}
                        <button class="plus">
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
                    <button class="buy" type="button">
                        Mua hàng   
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="../resources/js/menuClient.js"></script>
    <script src="../resources/js/cart.js"></script>
</body>
</html>