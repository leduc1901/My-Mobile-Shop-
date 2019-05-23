<?php
    session_start();
    foreach($_POST['qty'] as $key=>$value){
        $_SESSION['cart'][$key] = $value;
    }
    header('location:../../index.php?page_layout=cart');

?>