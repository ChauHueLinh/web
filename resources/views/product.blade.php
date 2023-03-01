<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Product</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='..\..\resources\css\product.css'>
    <script src='main.js'></script>
</head>
<body>
    <p>Product</p>
    <div class="search">
        <form action="{{ route('show_query_products_search') }}" method="get">
            <input type="text" placeholder="Search" name="q">
        </form>
    </div>
    <?php
        if (session()->has('flag')) { ?> 
            <p> <?php echo session('flag') ?> </p>
            <?php session()->forget('flag');
        }
    ?>
    <button type="button">
        <a href="{{ route('admin/add_product') }}">Add Product</a>
    </button>
    <table>
        <div class="title">
            <div class="start">ID</div>
            <div class="between">Name</div>
            <div class="between">Info</div>
            <div class="between">Avatar</div>
            <div class="between">Origin</div>
            <div class="between">Created at</div>
            <div class="between">Updated at</div>
            <div class="end">Action</div>
        </div>
        <?php
            foreach($data as $value){ ?>
                <div class="content">
                    <div class="start">{{ $value['product_id'] }}</div>
                    <div class="between">{{ $value['product_name'] }}</div>
                    <div class="between">
                        <a href="{{ $value['product_info'] }}" target="blank">{{ $value['product_info'] }}</a>
                    </div>
                    <div class="between">
                        <img src="..\{{ $value['product_avatar'] }}" alt="">
                    </div>
                    <div class="between">{{ $value['origin_name'] }}</div>
                    <div class="between">{{ $value['created_at'] }}</div>
                    <div class="between">{{ $value['updated_at'] }}</div>
                    <div class="end">
                        <a href="{{ route('admin/edit_product', ['product_id' => $value['product_id']]) }}">Edit</a>
                        <span> | </span>
                        <a href="{{ route('admin/addPhoto_product', ['product_id' => $value['product_id']]) }}">Add Photo</a>
                        <span> | </span>
                        <a href="{{ route('admin/delete_product', ['product_id' => $value['product_id']]) }}">Delete</a>
                    </div>
                </div>
            <?php }
        ?>
        </div>
    </table>
</body>
</html>