<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\..\resources\css\addProduct.css">
    <title>Add Product</title>
</head>
<body>
    <div class="form">
        <h1>Product</h2>
        <?php
        if (session()->has('flag')) { ?> 
            <p> <?php echo session('flag') ?> </p>
            <?php session()->forget('flag');
        }
        ?>
        <form method="POST" action="{{ route('admin/add_product_process') }}">
            @csrf
            <div>
                Name
                <br>
                <input type="text" name="product_name">
            </div>
            <br><br>
            <div>
                Infomation
                <br>
                <input type="text" name="product_info">
            </div>
            <br><br>
            <div>
                Origin
                <br>
                <select name="origin_id">
                    @foreach($data as $value)
                        <option value="{{ $value['origin_id'] }}">{{ $value['origin_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <br><br>
            <button type="submit">
                Add
            </button>
        </form>
      </div>
</body>
</html>