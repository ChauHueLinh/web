<?php
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
?>
