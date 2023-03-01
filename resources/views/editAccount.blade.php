<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\resources\css\signin.css">
    <title>Edit Account</title>
</head>
<body>
    <div class="login-box">
        <h2>Edit Account</h2>
        <?php
        if (session()->has('flag')) { ?> 
            <p> <?php echo session('flag') ?> </p>
            <?php session()->forget('flag');
        }
        ?>
        <form method="POST" action="{{ route('admin/update_account', ['user' => $user['user']]) }}">
            @csrf
            <div class="user-box">
                <label name="user">{{ $user->user }}</label>
            </div>
            <div class="user-box">
                <select name="level_id">
                    <?php
                    foreach ($title as $value) { ?>
                        <option value="{{ $value->level_id }}">
                            {{ $value->level_name }}
                        </option>
                    <?php }
                    ?>
                </select>
            </div>
            <button>
                Update
            </button>
        </form>
      </div>
</body>
</html>