<div class="user" id="user">
    <?php
        if (session()->has('account_name')) {
            echo 'User: ' . session('account_name');
        } else {
            echo 'Account';
        }
    ?>
</div>
<div class="user-action-hide" id="user-action">
    <?php
    switch(session('level_id')) {
        case 1 ?>
            <a href="admin">Admin</a>
            <br>
            <?php break;
        case 2 ?>
            <a href="admin">Admin</a>
            <br>    
            <?php break;
        case 3 ?>
            <a href="admin">Admin</a>
            <br>
            <?php break;
        default;        
    }
    if (session()->has('account_name')) { ?>
        <a href="change_password">Change Password</a>
        <br> 
        <a href="signout">Signout</a>
        <br> 
    <?php } else { ?>
        <a href="signin">Signin</a>
        <br>
        <a href="signup">Signup</a>
        <br>
    <?php } ?>
</div>