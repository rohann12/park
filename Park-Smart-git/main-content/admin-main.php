<?php
    require_once 'admin-nav.php';
    session_start();
    if(!isset($_SESSION['admin_details'])){
        header('location:login.php');
    }
?>

<div class="main_container">
        
        <div class="container">
            <div class="info">
                    Welcome to the admin dashboard of Park Smart. <br>
                    Navigate by clicking the sections on the left sidebar.
            </div>
            
        </div>
    </div>