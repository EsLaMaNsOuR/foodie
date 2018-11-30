<?php
    session_start();
    if ( !$_SESSION['sess_user_buyer']){
        header("Location:signin.php");
    }
    else{
        if ( empty($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }
        array_push($_SESSION['cart'], $_GET['id']);
        //echo toString($_SESSION['cart']);
        echo'<script>
            window.history.back();</script>';
    }
    
?>
