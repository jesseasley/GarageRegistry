<?php
if ($_SERVER['SERVER_NAME'] == "localhost"){
  $servername = "DESKTOP-PSN6TIK";
  $username = "MyDB1138";
  $password = "HeTaretEC2u!";
  $dbname = "mydb1138";
}
else{
  $servername = "45.40.164.103";
  $username = "MyDB1138";
  $password = "HeTaretEC2u!";
  $dbname = "MyDB1138";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// get current time
date_default_timezone_set('America/Chicago');
$d = new DateTime();
$sd = $d->format('m-d-Y H:i:s');

//check to see if the user already exists
$sql = "insert into TrackMuse_Log (log_date, log_entry) values ('" . $sd . "', '" . $_POST["msg"] . "')";
if ($conn->query($sql) === TRUE) {
    echo "{\"log\": {\"message\": \"Log successfully updated\"}}";
} else {
    echo "{\"log\": {\"error\": \"Error updating log: " . $conn->error . "\"}}";
}
$conn->close();
?>