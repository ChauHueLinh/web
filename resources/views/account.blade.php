<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Account</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='..\..\resources\css\account.css'>
    <script src='main.js'></script>
</head>
<body>
    <p>Accounts</p>
    <div class="search">
        <form action="{{ route('show_query_accounts_search') }}" method="get">
            <input type="text" placeholder="Search" name="q">
        </form>
    </div>
    <?php
        if (session()->has('flag')) { ?> 
            <p> <?php echo session('flag') ?> </p>
            <?php session()->forget('flag');
        }
    ?>
    <table>
        <div class="title">
            <div class="start">ID</div>
            <div class="between">User</div>
            <div class="between">Title</div>
            <div class="between">Created at</div>
            <div class="between">Updated at</div>
            <div class="end">Action</div>
        </div>
        <?php
            foreach($data as $value){ ?>
                <div class="content">
                    <div class="start">{{ $value['account_id'] }}</div>
                    <div class="between">{{ $value['user'] }}</div>
                    <div class="between">{{ $value['level_name'] }}</div>
                    <div class="between">{{ $value['created_at'] }}</div>
                    <div class="between">{{ $value['updated_at'] }}</div>
                    <div class="end">
                        <a href="{{ route('admin/edit_account', ['user' => $value['user']]) }}">Edit</a>
                        <span> | </span>
                        <a href="{{ route('admin/delete_account', ['user' => $value['user']]) }}">Delete</a>
                    </div>
                </div>
            <?php }
        ?>
        </div>
    </table>
</body>
</html>