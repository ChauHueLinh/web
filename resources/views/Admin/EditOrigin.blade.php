
@php
    if (session()->has('account_name')) {
        switch (session('level_id')) {
            case (1):
            break;
            case (2):
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
    <link rel="stylesheet" href="..\resources\css\EditOrigin.css">
    <title>Edit Origin</title>
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
        <div class="title">Edit origin</div>
        <div class="before-after">
            <div>Before</div>
            <div>After</div>
        </div>
        <div class="before">
            <div>
                @foreach ($data as $value)
                        ID: {{ $value->origin_id }}
                        <br><br>
                        Name
                        <br>
                        {{ $value->origin_name }}
                @endforeach
            </div>
        </div>
        <div class="form">
            <form method="POST" action="{{ route('edit_origin_process') }}">
                @csrf
                <div>
                    @foreach ($data as $value)
                        ID: {{ $value->origin_id }}
                        <br><br>
                        Name
                        <br>
                        <input type="text" name="origin_name">
                        <input type="hidden" name="origin_id" value="{{ $value->origin_id }}">
                    @endforeach
                </div>
                <br><br>
                <button type="submit">
                    Update
                </button>
            </form>
        </div>
    </div>
</body>
</html>