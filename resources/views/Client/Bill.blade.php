
@php
    require_once '.\menus\cookie.php';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\bill.css">
    <link rel="stylesheet" href="..\resources\css\menuClient.css">
    <title>Bill</title>
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
            require_once '.\menus\userClient.php';
        @endphp
    </div>
    <div class="content">
        @foreach ($bills as $bill)
            <div class="item">
                <div class="bills">
                    <div class="bill-id">
                        ID: {{ $bill->bill_id }}
                    </div>
                    <div class="date">
                        Date: {{ $bill->date }}
                    </div>
                    <div class="customer">
                        Khách hàng: {{ $bill->account_name }}
                    </div>
                    <div class="phone-number">
                        Số điện thoại: {{ $bill->phone_number }}
                    </div>
                    <div class="address">
                        Địa chỉ: {{ $bill->address }}
                    </div>
                    <div class="summary">
                        Tổng hóa đơn: {{ $bill->summary }}$
                    </div>
                    <button class="more" type="button">Xem chi tiết</button>
                    <button class="less" type="button">Ẩn chi tiết</button>
                </div>
                <div class="detail-bills">
                    <div class="id">Mã</div>
                    <div class="name">Tên</div>
                    <div class="price">Giá</div>
                    <div class="quantity">Số lượng</div>
                    <div class="total">Thành tiền</div>
                    @foreach ($bill->detail_bills as $detail_bill)
                        <div class="id">{{ $detail_bill->girl_id }}</div>
                        <div class="name">{{ $detail_bill->girl_name }}</div>
                        <div class="price">{{ $detail_bill->price }}$</div>
                        <div class="quantity">{{ $detail_bill->quantity }}</div>
                        <div class="total">{{ $detail_bill->total }}$</div>
                    @endforeach
                </div>
            </div>
            <div class="line"></div>
        @endforeach
    </div>
    <script src="../resources/js/menuClient.js"></script>
    <script src="../resources/js/bill.js"></script>
</body>
</html>