<?php
include "database_configuration.php";
session_start();
$i = 0;
$user_id = $_SESSION['user_details']['user_id'];
$sql = "SELECT * FROM `booking_table` WHERE `user_id`= $user_id";
$run = mysqli_query($conn, $sql);
if (!isset($_SESSION['user_details'])) {
  header('location:login.php');
} else { ?>
  <!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel='stylesheet' href='../CSS/popup-style.css' />
    <link rel='stylesheet' href='../CSS/after-login.css' />
    <link rel='stylesheet' href='../CSS/my-history.css' />
    <title>Park Smart</title>
  </head>

  <body>

    <nav>
      <img src="../Images/new-logo.png">
      <div id="overflow">
        <ul>

          <li><?= $_SESSION['user_details']['full_name'] ?>
            <ul>
              <li><a href="my-history.php">My History</a></li>
              <li><a href="user-logout.php">Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
    <div class="center-main-div">
      <div class="main-div">
        <table>
          <tr>
            <th>S.N</th>
            <th>Date</th>
            <th>Arrival Time</th>
            <th>Departure Time</th>
            <th>Price</th>
          </tr>

          <?php
          while ($result = mysqli_fetch_assoc($run)) {
            $i++; ?>
            <tr>
              <td><?= $i ?></td>
              <td><?= $result['date'] ?></td>
              <td><?= $result['arrival_time'] ?></td>
              <td><?= $result['departure_time'] ?></td>
              <td><?= $result['price'] ?></td>
            </tr>
          <?php } ?>

        </table>
      </div>
    </div>
  <?php } ?>