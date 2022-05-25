<?php
include "database_configuration.php";
$sql = "SELECT cost from price where vehicle_class='bike'";
$result = mysqli_query($conn, $sql);
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $price = $row['cost'];
    echo $price;
  }
}

?>