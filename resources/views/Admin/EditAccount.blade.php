
@php
    if (session()->has('account_name')) {
        switch (session('level_id')) {
            case (1):
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
    <link rel="stylesheet" href="..\resources\css\EditGirl.css">
    <title>Edit Account</title>
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
        <div class="title">Edit Account</div>
        <div class="before-after">
            <div>Before</div>
            <div>After</div>
        </div>
        <div class="before">
            <div>
                @foreach ($accounts as $account)
                    ID: {{ $account->account_id }}
                    <br><br>
                    Name
                    <br>
                    {{ $account->account_name }}
                    <br><br>
                    Level
                    <br>
                    {{ $account->level_name }}
                @endforeach
            </div>
        </div>
        <div class="form">
            <form method="POST" action="{{ route('edit_account_process') }}">
                @csrf
                <div>
                    @foreach ($accounts as $account)
                        <input type="hidden" name="account_id" value="{{ $account->account_id }}">
                        ID: {{ $account->account_id }}
                        <br><br>
                        Name
                        <br>
                        {{ $account->account_name }}
                        <br><br>
                        level
                        <br>
                        <select name="level_id">
                            @foreach ($levels as $level)
                                <option value="{{ $level->level_id }}">{{ $level->level_name }}</option>
                            @endforeach
                        </select>
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