<?php

include 'database_configuration.php';
$slot_id =$_GET['id'];
$sql2 = "UPDATE `slots` SET `slot_status` = 0 where `slot_id` = $slot_id";
$result2 = mysqli_query($conn, $sql2);
echo $slot_id;
?>