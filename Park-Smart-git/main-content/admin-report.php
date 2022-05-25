<?php
include "database_configuration.php";
session_start();
if (!isset($_SESSION['admin_details'])) {
    header('location:login.php');
}
$query = "SELECT * from `booking_table`";
$query_result = mysqli_query($conn, $query);
$i = 1;
?>
<div class="main_container">
    <?php require_once 'admin-nav.php'; ?>
    <div class="container">
        <div class="info">

        <table>
            <tr>
                <th>S No.</th>
                <th>Full Name</th>
                <th>Vehicle No.</th>
                <th>Date</th>
                <th>Arrival Time</th>
                <th>Departure Time</th>
                <th>Price</th>

            </tr>
            <?php

            while ($query_row = mysqli_fetch_array($query_result)) {

            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $query_row['full_name'];     ?>
                    <td><?php echo $query_row['vehicle_no'];    ?>
                    <td><?php echo $query_row['date'];          ?>
                    <td><?php echo $query_row['arrival_time'];  ?>
                    <td><?php echo $query_row['departure_time']; ?>
                    <td><?php echo $query_row['price'];         ?>
                </tr>
            <?php
                $i++;
            }

            $conn->close();

            ?>
        </table>

    </div>
    
</div>