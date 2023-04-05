<?php
if(session()->has('total_item')) {
    if (session('total_item') == 1) {
        echo 'Cart: ' . session('total_item') . ' item';
    } else if (session('total_item') > 1) {
        echo 'Cart: ' . session('total_item') . ' items';
    } else {
        
    } 
}
?>