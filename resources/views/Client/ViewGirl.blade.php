
@php
    require_once '.\menus\cookie.php';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\ViewGirl.css">
    <link rel="stylesheet" href="..\resources\css\menuClient.css">
    <title>Girl</title>
</head>
<body>
    <div class="logo">
        <img src=".\photos\default\logo.jpg" alt="">
    </div>
    <div class="banner"></div>
    <div class="menu">
        @php
            require_once '.\menus\homepage.php';
        @endphp
        <div class="origin" id="origin">
            Origin
        </div>
        <div class="origin-action-hide" id="origin-action">
            @foreach($origins as $origin)
                <a href="./?origin_id={{ $origin->origin_id }}">{{ $origin->origin_name }}</a>
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
        @php
            if (session()->has('message')) {
                echo session('message');
            }
        @endphp
        @foreach ($girls as $girl)
        <div class="girl">
            <div class="avatar">
                <img src="../public/photos/{{ $girl->folder }}/{{ $girl->girl_avatar }}" alt="">
            </div>
            <div class="detail">
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
        </div>
        @endforeach
        <div class="line"></div>
        <div class="photos">
            @foreach ($photos as $photo)
                <div class="item">
                    <img src="../public/photos/{{ $photo->folder }}/{{ $photo->name }}" alt="">
                </div>
            @endforeach     
        </div>
        {{-- <div class="page">
            {{ $photos->links() }}
        </div> --}}
    </div>
    <div class="gallery">
        <div class="close">
            <img src=".\photos\default\close.png" alt="">
        </div>
        <div class="gallery-img">
            <img src="" alt="">
        </div>
        <div class="previous">
            <img src=".\photos\default\previous.png" alt="">
        </div>
        <div class="next">
            <img src=".\photos\default\next.png" alt="">
        </div>
    </div>
    <script src="../resources/js/menuClient.js"></script>
    <script src="../resources/js/viewPhoto.js"></script>
</body>
</html>