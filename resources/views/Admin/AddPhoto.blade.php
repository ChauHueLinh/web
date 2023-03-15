@php
    if (session()->has('account_name')) {
        switch (session('level_id')) {
            case (1):
            break;
            case (2):
            break;
            case (3):
            break;
            default:
                header("Location: signin");
                exit;
        }
    } else {
        header("location: signin");
        exit;
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\resources\css\AddGirl.css">
    <title>Add Photo</title>
</head>
<body>
    <div class="h1">Admin</div>
    <div class="menu">
        <div>
            <a href=".\">Home Page</a>
        </div>
        <div>
            <ol>
                Girl
                <li>
                    <a href=".\girl">Girl List</a>
                </li>
                <li>
                    <a href=".\add_girl">Add Girl</a>
                </li>
            </ol>
        </div>
        <div>
            <ol>
                Origin
                <li>
                    <a href=".\origin">Origin List</a>
                </li>
                <li>
                    <a href=".\add_origin">Add Origin</a>
                </li>
            </ol>
        </div>
        @if (session('level_id') == 1)
            <div>
                <ol>
                    Level
                    <li>
                        <a href=".\level">Level List</a>
                    </li>
                    <li>
                        <a href=".\add_level">Add Level</a>
                    </li>
                </ol>
            </div>
            <div>
                <ol>
                    Account
                    <li>
                        <a href=".\account">Account List</a>
                    </li>
                </ol>
            </div>
        @endif 
        <div>
            <ol>
                @php
                    echo session('account_name');
                @endphp
                <li>
                    <a href="signout">Signout</a>
                </li>
            </ol>
        </div>   
    </div>
    <div class="content">
        <div class="title">
            Add Photo
            <br>
            @php
            if (session()->has('message')) {
                echo session('message');
                session()->forget('message');
            }
            @endphp
        </div>
        <div class="form">
            <form method="POST" action="{{ route('add_photo_process') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    ID: 
                    @foreach ($girls as $girl)
                        {{ $girl->girl_id }}
                        <input type="hidden" name="girl_id" value="{{ $girl->girl_id }}">
                        <input type="hidden" name="folder" value="{{ $girl->folder }}">
                    @endforeach
                </div>
                <br>
                <div>
                    Name:
                    <br>
                    @foreach ($girls as $girl)
                        {{ $girl->girl_name }}
                        <input type="hidden" name="girl_name" value="{{ $girl->girl_name }}">
                    @endforeach
                </div>
                <br>
                <div>
                    Photo
                    <br>
                    <input type="file" name="photo[]" multiple="multiple">
                </div>
                <br>
                <button type="submit">
                    Add
                </button>
            </form>
        </div>
      </div>
</body>
</html>