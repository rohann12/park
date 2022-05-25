<?php
include "database_configuration.php";
session_start();
if (!isset($_SESSION['admin_details'])) {
    header('location:login.php');
}
$query = "SELECT * from `user_details`";
$query_result = mysqli_query($conn, $query);
$i = 1;
?>
<div class="main_container">
    <?php require_once "admin-nav.php"; ?>

    <div class="container">
        <div class="info">
            <table>
                <tr>
                    <th>S No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Is Admin</th>

                </tr>
                <?php

                while ($query_row = mysqli_fetch_array($query_result)) {

                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $query_row['full_name'];
                            ?></td>
                        <td><?php echo $query_row['email'];
                            ?></td>
                        <td><?php echo $query_row['contact'];
                            ?></td>
                        <td><?php if ($query_row['is_admin'] == 1) {
                                echo 'True';
                            } else {
                                echo 'False';
                            }
                            ?></td>


                    </tr>
                <?php
                    $i++;
                }

                $conn->close();

                ?>
            </table>
    </div>

</div>