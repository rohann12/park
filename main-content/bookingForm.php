<?php
session_start();
$msg = "";
if (!isset($_SESSION['user_details'])) {
  header('location:login.php');
} else { } ?>
<?php
include "database_configuration.php";
    $id = $_GET['id'];
    $_SESSION['slot_id'] = $id;
    $slot_type = $_GET['class'];
    $query = "SELECT `cost` from `price` where vehicle_class='$slot_type'";
    $runquery = mysqli_query($conn,$query);
    $ratequery = mysqli_fetch_assoc($runquery);
    $rate = $ratequery['cost'];
    // $payment_request_id = "PRID-". rand(1,1000000);
if ($_POST) {
  
  $query3 = "SELECT `slot_name` from `slots` where `slot_id`=$id";
    $run_query3 = mysqli_query($conn,$query3);
    $result3 = mysqli_fetch_assoc($run_query3);
    $slot_name = $result3['slot_name'];
    $_SESSION['slot_name'] = $slot_name;
  $price = $_POST['price'];
  $_SESSION['price'] = $price; 
  $date = date("Y-m-d");
  $_SESSION['date'] = $date; 
  $listing = "SELECT * from `booking_table` where `slot_id`= $id AND `date`='$date' AND `cancel_status`=0";
    $listing_run = mysqli_query($conn,$listing);
  $i=0;
  while($listing_row = mysqli_fetch_assoc($listing_run)){
                    $arr[$i] = $listing_row['arrival_time'];
                    $arr2[$i] = $listing_row['departure_time'];
                    $i++;

  }
  if(isset($arr)){
    $length = count($arr);
    // echo $length;
  }
  else{
    $length = 0;
  }
  $date = date("Y-m-d");
  $full_name = $_SESSION['user_details']['full_name'];
  $user_id = $_SESSION['user_details']['user_id'];
  $vehicle_num = $_REQUEST['vehicle_no'];
  $_SESSION['vehicle_num'] = $vehicle_num;
  $arrival_time = $_REQUEST['arrival_time'];
  $_SESSION['arrival_time'] = $arrival_time;
  $departure_time = $_REQUEST['departure_time'];
  $_SESSION['departure_time'] = $departure_time;
  // echo $arrival_time;
  // echo $departure_time;
  $isvalid = true;
  if($length>0){
  for($i=0;$i<$length;$i++)
  {
    if($arrival_time>=$arr[$i] && $arrival_time<=$arr2[$i]){
      $msg = "The time you entered is already booked by others.";
      $isvalid = false;
    }
 
    if($departure_time>=$arr[$i] && $departure_time<=$arr2[$i]){
      $msg = "The time you entered is already booked by others.";
      $isvalid = false;
    }
    else{
      $isvalid = true;
    }
  }
}
else{
  $isvalid = true;
}
if(strlen($vehicle_num)!=4){
  $msg = "Vehicle number should be of length 4";
  $isvalid = false;
}

if($vehicle_num>9999){
  $msg = "Invalid vehicle number";
  $isvalid = false;
}

  if($price==NULL){
    $msg = "Please calculate the price first";
    $isvalid = false;
  }
  
  if($isvalid == true){


      // $sql = "INSERT INTO `booking_table` (`slot_id`,`slot_name`,`user_id`,`full_name`,`vehicle_no`,`date`,`arrival_time`,`departure_time`,`price`,`payment_request_id`) 
      // VALUES ($id,'$slot_name',$user_id,'$full_name','$vehicle_num','$date','$arrival_time','$departure_time','$price','$payment_request_id');";
      // $result = mysqli_query($conn, $sql);
// if (mysqli_query($conn, $sql)) {

// $msg = "Booked Successfully";
header("location:http://localhost/Park-Smart/main-content/booking_method.php");
// header('location:bill-report.php');
// }
// else{
//   $msg = "Couldn't book the space.";
// }
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel='stylesheet' href='../CSS/popup-style.css' />
  <link rel='stylesheet' href='../CSS/after-login.css' />
  <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
  <script src="../Script/script.js"></script>
  <script src="../Script/bookingValidation.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Book Space</title>
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
  <div id="content">
  <div id="form">
    <!-- <form id="popup-form" action="http://uat.esewa.com.np/epay/main" method="post"> -->
      <form id="popup-form" action="" method="post">
      <input type="hidden" id="selected_slot" name="selected_slot" value="<?= $id ?>" >
      <label for="rate">Rate (Per 30 minutes)</label>
      <input type="number" id="rate" name="rate" id="rate" value="<?= $rate ?>" readonly>
      <label for="vehicle_no">Vehicle No.</label>
      <input type="number" name="vehicle_no" id="vehicle_no" required>
      <label for="arrival_time">Arrival Time</label>
      <input type="time" name="arrival_time" id="arrival_time" required>
      <label for="departure_time">Departure Time</label>
      <input type="time" name="departure_time" id="departure_time" required>
      <label for="price">Price</label>
      <input type="number" name="price" id="price" placeholder="Click on ''Calculate Price'' to find price" value="" readonly>
      <span class="msg"><?= $msg ?></span>
      <!-- <input value="<?= $price ?>" name="tAmt" type="hidden">
      <input value="<?= $price ?>" name="amt" type="hidden">
      <input value="0" name="txAmt" type="hidden">
      <input value="0" name="psc" type="hidden">
      <input value="0" name="pdc" type="hidden">
      <input value="EPAYTEST" name="scd" type="hidden">
      <input value="<?= $payment_request_id ?>" name="pid" type="hidden">
      <input value="http://localhost/park-smart/main-content/success_page.php?q=su" type="hidden" name="su">
      <input value="http://park-smart/main-content/failure-page.php?q=fu" type="hidden" name="fu"> -->
      <button type="button"onclick="validation();">Calculate Price</button>
      <button type="submit">Book Now</button>
      <button type="button"class="btn cancel" onclick="closeForm()">Close</button>
     
    </form>
  </div>
  <div id="listing">
        <table>
          <caption>Booking Listing of the selected slot</caption>
            <tr>
              <th>S.N</th>
              <th>Arrival Time</th>
              <th>Departure Time</th>
            </tr>
            <?php $i=1; $date = date("Y-m-d");?>
            
            <?php $listing = "SELECT * from `booking_table` where `slot_id`= $id AND `date` ='$date'";
            $listing_run = mysqli_query($conn,$listing); 
            while($listing_row = mysqli_fetch_assoc($listing_run)){ ?>
              <tr>
                <td><?php echo $i; $i++;?></td>
                <td><?php echo $listing_row['arrival_time']; ?></td>
                <td><?php echo $listing_row['departure_time']; ?></td>
              </tr>

            <?php } ?>

        </table>
        <p>Please book on the time other than this listing</p>
  </div>
  </div>
</body>
</html>