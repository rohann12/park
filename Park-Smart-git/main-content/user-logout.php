<?php
    session_start();
    unset($_SESSION['user_details']);
    header('location:login.php');
?>