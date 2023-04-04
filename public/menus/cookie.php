<?php
    if (isset($_COOKIE['remember']) && empty(session('account_name'))) {
        header('location:cookie');
        exit;
    }
?>