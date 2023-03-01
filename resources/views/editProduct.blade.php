<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit Product</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='..\..\resources\css\editProduct.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php
        if (session()->has('flag')) { ?> 
            <p> <?php echo session('flag') ?> </p>
            <?php session()->forget('flag');
        }
    ?>
    <p>Account</p>
    <table>
        <div class="title">
            <div class="start">ID</div>
            <div class="name">Name</div>
            <div class="info">Info</div>
            <div class="avatar">Avatar</div>
            <div class="origin">Origin</div>
        </div>
        <br>
        <span>Before</span>
        <div class="content">
            <div class="start">{{ $value['product_id'] }}</div>
            <div class="name">{{ $value['product_name'] }}</div>
            <div class="info">{{ $value['product_info'] }}</div>
            <div class="avatar">
                <img src="..\{{ $value['product_avatar'] }}" alt="">
            </div>
            <div class="origin">{{ $value['origin_name'] }}</div>
        </div>
        <br><br>
        <span>After</span>
        <div class="form">
            <form method="POST" action="{{ route('admin/update_product', ['product_id' => $value['product_id']]) }}">
                @csrf
                <div class="start">{{ $value['product_id'] }}</div>
                <div class="name">
                    <input type="text" name="product_name" value="{{ $value['product_name'] }}">
                </div>
                <div class="info">
                    <input type="text" name="product_info" value="{{ $value['product_info'] }}">
                </div>
                <div class="avatar">
                    <img src="..\{{ $value['product_avatar'] }}" alt="">
                </div>
                <div class="origin">
                    <select name="origin_id">
                        @foreach($origins as $origin)
                            <option value="{{ $origin['origin_id'] }}">
                                {{ $origin['origin_name'] }}
                            </option>
                        @endforeach    
                    </select>  
                </div>
                <button>Update</button>
            </form>
        </div>
    </table>
</body>
</html>