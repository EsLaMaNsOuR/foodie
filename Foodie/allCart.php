<?php
    session_start();
   
        if ( !empty($_SESSION['cart'])){
            var_dump( $_SESSION['cart']);
        }
        //array_push($_SESSION['cart'], $_GET['id']);
    
?>
