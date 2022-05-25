<?php
include 'database_configuration.php';
$sql= "SELECT * from booking_table";
$result=mysqli_query($conn,$sql);

$sql2 = "UPDATE `slots` SET `slot_status` = 0 where `slot_id` = $slot_id";
?>