<?php
include "database_configuration.php";
$success_msg = "";
$i = 1;
session_start();
$sql1 = 'SELECT * FROM `slots` WHERE `slot_name` LIKE "a%"';
$sql2 = 'SELECT * FROM `slots` WHERE `slot_name` LIKE "b%"';
$sql3 = 'SELECT * FROM `slots` WHERE `slot_name` LIKE "c%"';
$sql4 = 'SELECT * FROM `slots` WHERE `slot_name` LIKE "d%"';
$sql5 = 'SELECT * FROM `slots` WHERE `slot_name` LIKE "e%"';
$sql6 = 'SELECT * FROM `slots` WHERE `slot_name` LIKE "f%"';
$run1 = mysqli_query($conn,$sql1);
$run2 = mysqli_query($conn,$sql2);
$run3 = mysqli_query($conn,$sql3);
$run4 = mysqli_query($conn,$sql4);
$run5 = mysqli_query($conn,$sql5);
$run6 = mysqli_query($conn,$sql6);
if (!isset($_SESSION['user_details'])) {
    header('location:login.php');
}

else{

}?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
    <link rel='stylesheet' href='../CSS/popup-style.css'/>
    <link rel='stylesheet' href='../CSS/after-login.css' />
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
        <div class="bike-row">
          <div class="text">Bike</div>
          <?php
            while($row1=$run1->fetch_assoc()){
              if($row1['slot_status']==0){?>
                  <div class="bike" id="<?=$row1['slot_id']?>"><?=$row1['slot_name']?></div>
              <?php }
                else{?>
                  <div class="bike-booked" id="<?=$row1['slot_id']?>"><?=$row1['slot_name']?></div>
                <?php }
            }?>
        </div>
        <div class="road"></div>
        <div class="bike-row">
        <div class="text">Bike</div>
          <?php
            while($row2=$run2->fetch_assoc()){
              if($row2['slot_status']==0){?>
                  <div class="bike" id="<?=$row2['slot_id']?>"><?=$row2['slot_name']?></div>
              <?php }
                else{?>
                  <div class="bike-booked" id="<?=$row2['slot_id']?>"><?=$row2['slot_name']?></div>
                <?php }
            }?>
        </div>
        <div class="road"></div>
        <div class="bike-row">
        <div class="text">Bike</div>
          <?php
            while($row3=$run3->fetch_assoc()){
              if($row3['slot_status']==0){?>
                  <div class="bike" id="<?=$row3['slot_id']?>"><?=$row3['slot_name']?></div>
              <?php }
                else{?>
                  <div class="bike-booked" id="<?=$row3['slot_id']?>"><?=$row3['slot_name']?></div>
                <?php }
            }?>
        </div>
        <div class="road"></div>
        <div class="bike-row">
        <div class="text">Bike</div>          
          <?php
            while($row4=$run4->fetch_assoc()){
              if($row4['slot_status']==0){?>
                  <div class="bike" id="<?=$row4['slot_id']?>"><?=$row4['slot_name']?></div>
              <?php }
                else{?>
                  <div class="bike-booked" id="<?=$row4['slot_id']?>"><?=$row4['slot_name']?></div>
                <?php }
            }?>
        </div>
        <div class="road"></div>
        <div class="car-row">
        <div class="text">Car</div>
          <?php
            while($row5=$run5->fetch_assoc()){
              if($row5['slot_status']==0){?>
                  <div class="car" id="<?=$row5['slot_id']?>"><?=$row5['slot_name']?></div>
              <?php }
                else{?>
                  <div class="car-booked" id="<?=$row5['slot_id']?>"><?=$row5['slot_name']?></div>
                <?php }
            }?>
        </div>
        <div class="road"></div>
        <div class="car-row">
        <div class="text">Car</div>
          <?php
            while($row6=$run6->fetch_assoc()){
              if($row6['slot_status']==0){?>
                  <div class="car" id="<?=$row6['slot_id']?>"><?=$row6['slot_name']?></div>
              <?php }
                else{?>
                  <div class="car-booked" id="<?=$row6['slot_id']?>"><?=$row6['slot_name']?></div>
                <?php }
            }?>
        </div>
      </div>
      <script src="../Script/script.js"></script>
<?php include "popup-form.php"?>
    <!-- <div id="form">
      <form id="popup-form" action="" method="POST">
        <input type="hidden" id="selected_slot" name="selected_slot" value="">
        
        <label for="vehicle_no">Vehicle No.</label>
        <input type="number" name="vehicle_no" id="vehicle_no" required>
        <label for="arrival_time">Arrival Time</label>
        <input type="time" name="arrival_time" id="arrival_time" required>
        <label for="departure_time">Departure Time</label>
        <input type="time" name="departure_time" id="departure_time" required>
        <span class="success_msg"><?=$success_msg?></span>
        <input type="submit" value="Book Now"></input>
        <button class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
    </div>
       
      
</div>
  </body>
  
  <style>
    #form{
      display:none;     
      
    }
    
  </style>

  </html>
<?php
// session_start();
// include "database_configuration.php";
//     if($_POST){
//         $date = date("Y-m-d");
//         $slot_id = $_REQUEST['selected_slot'];
//         $full_name = $_SESSION['user_details']['full_name'];
//         $user_id = $_SESSION['user_details']['user_id'];
//         $vehicle_num = $_REQUEST['vehicle_no'];
//         $arrival_time = $_REQUEST['arrival_time'];
//         $departure_time = $_REQUEST['departure_time'];
//         $sql = "INSERT INTO `booking_table` (`slot_id`,`user_id`,`full_name`,`vehicle_no`,`date`,`arrival_time`,`departure_time`) 
//                 VALUES ($slot_id,$user_id,'$full_name','$vehicle_num','$date','$arrival_time','$departure_time');";
//         $sql2 = "UPDATE `slots` SET `slot_status` = 1 where `slot_id` = $slot_id";
//         $result = mysqli_query($conn,$sql);
//         $result2 = mysqli_query($conn,$sql2);
//         if($result!= false){
//           $success_msg = "Booked Successfully";
//           header('location:bill-report.php');
//         }
//       }
// ?> -->