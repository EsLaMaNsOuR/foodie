<?php
    session_start();
    unset($_SESSION['sess_user_buyer']);
    session_destroy();
    header('Location:index.php');
?>
