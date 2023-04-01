
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
    <link rel="stylesheet" href="..\resources\css\EditAccount.css">
    <link rel="stylesheet" href="..\resources\css\menuAdmin.css">
    <title>Edit Account</title>
</head>
<body>
    <div class="h1">
        <div class="admin">Admin</div>
    </div>
    <div class="menu">
        @php
            require_once '.\menus\homepage.php';
            require_once '.\menus\girl.php';
            require_once '.\menus\origin.php';
            require_once '.\menus\photo.php';
            if(session('level_id') == 1) {
                require_once '.\menus\level.php';
                require_once '.\menus\account.php';
            }
        @endphp 
        <div class="user" id="user">
            @php
                echo 'User: ' . session('account_name');
            @endphp
        </div>
        <div class="user-action-hide" id="user-action">
            <a href="signout">Signout</a>
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
    <script src="../resources/js/menuAdmin.js"></script>
</body>
</html>