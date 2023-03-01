<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\..\resources\css\addPhoto.css">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin/add_photo_process', ['product_id' => $product_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file[]" multiple="multiple">
        <button>Add</button>
    </form>
</body>
</html>