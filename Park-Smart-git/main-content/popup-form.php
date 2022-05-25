


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel='stylesheet' href='../CSS/popup-style.css' />
  <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Book Space</title>
</head>

<body>
  <div id="form">
    <form id="popup-form" action="" method="POST" onsubmit="event.preventDefault();validation();diff()">
      <input type="" id="selected_slot" name="selected_slot" value="">
      <input type="" id="selected_slot_class" name="selected_slot_class" value="">
      <input type="" id="price" name="price" id="price" value="<?php echo $price  ?>">

      <label for="vehicle_no">Vehicle No.</label>
      <input type="number" name="vehicle_no" id="vehicle_no" required>
      <label for="arrival_time">Arrival Time</label>
      <input type="time" name="arrival_time" id="arrival_time" required>
      <label for="departure_time">Departure Time</label>
      <input type="time" name="departure_time" id="departure_time" required>
      <span class="success_msg"><?= $success_msg ?></span>
      <input type="submit" value="Book Now"></input>
      <button class="btn cancel" onclick="closeForm()">Close</button>
      <button onclick="diff()">fuck</button><br>
    </form>
  </div>
  </div>
  <p id="diff"></p>

  </div>
</body>
<script src="../Script/script.js"></script>
<script>
  function validation() {
    var arrivalTime = document.getElementById("arrival_time").value;
    var departureTime = document.getElementById("departure_time").value;
    isValidate = true;
    // alert(arrivalTime);
    // alert(departureTime);
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    m = checkTime(m);
    let s = h + ":" + m;
    alert("current time" + s);

    if (arrivalTime <= s) {
      alert("Time invalid");
      isValidate = false;
    }


  }

  function checkTime(i) {
    if (i < 10) {
      i = "0" + i
    }; // add zero in front of numbers < 10
    return i;
  }

  function diff() {
    var start = document.getElementById("arrival_time").value;
    var end = document.getElementById("departure_time").value;
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();

    var minutes = Math.floor(diff / 1000 / 60);

    alert("difference in arrival and departure" + minutes);
    document.getElementById("diff").innerHTML = minutes;

    if (minutes <= 30) {
      alert("time too short");
    }

  }
</script>

<style>
  #form {
    display: none;

  }
</style>

</html>
<?php
// session_start();
include "database_configuration.php";
if ($_POST) {
  $date = date("Y-m-d");
  $slot_id = $_REQUEST['selected_slot'];
  //to get slot name
  $selected_slot_class = $_REQUEST['selected_slot_class'];
  $full_name = $_SESSION['user_details']['full_name'];
  $user_id = $_SESSION['user_details']['user_id'];
  $vehicle_num = $_REQUEST['vehicle_no'];
  $arrival_time = $_REQUEST['arrival_time'];
  $departure_time = $_REQUEST['departure_time'];
  $sql = "INSERT INTO `booking_table` (`slot_id`,`user_id`,`full_name`,`vehicle_no`,`date`,`arrival_time`,`departure_time`) 
                VALUES ($slot_id,$user_id,'$full_name','$vehicle_num','$date','$arrival_time','$departure_time');";
  $sql2 = "UPDATE `slots` SET `slot_status` = 1 where `slot_id` = $slot_id";
  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn, $sql2);
  if ($result != false) {
    $success_msg = "Booked Successfully";
    header('location:bill-report.php');
  }
  
}

//for price 
$sql3 = "SELECT cost from `price` where`vehicle_class`=$selected_slot_class";
$result3 = mysqli_query($conn, $sql3);
if ($result3) {
  while ($row = mysqli_fetch_assoc($result)) {
    $price = $row['cost'];
    echo $price;
  }
}


?>

</html>