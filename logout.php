<?php 
    session_start();
    $_SESSION['flag'] = 3;
    header('location: signin.php');
?>