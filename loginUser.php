﻿<?php
    include("database.php");

// get the user
$sql = "select * from TrackMuse_Users where username = '" . $_GET["username"];
$sql .= "' and password  = '" . md5($_GET["password"]) . "' and active='1'";

$res = $conn->query($sql);
if ($res->num_rows > 0) {
  $row = $res->fetch_assoc();
  echo "{\"user\": {\"id\": \"" . $row["id"] . "\", \"email\": \"" . $row["email"] . "\", \"username\": \"" . $row["username"];
  echo "\", \"zipcode\": \"" . $row["zipcode"] . "\", \"password\": \"" . $row["password"];
  echo "\", \"level\": \"" . $row["level"] . "\", \"ts\": \"" . $row["ts"] . "\", \"coverphoto\": \"";
  echo $row["coverphoto"] . "\", \"imagePath\": \"" . $row["imagePath"] . "\"}";

  // get the pictures
  $sql = "select * from TrackMuse_UserImages where TMUserid = '" . $row["id"] . "' and active='1'";
  $res = $conn->query($sql);
  $pics = "";
  if ($res->num_rows > 0) {
    echo ", \"pics\": [";
    while($row = $res->fetch_assoc()) {
      if ($pics > "")
        $pics .= ",";
      $pics .= "{\"filename\": \"" . $row["filename"] . "\", \"project\": \"" . $row["project"] . "\", \"year\": \"" . $row["year"] . "\", \"make\": \"" . $row["make"] . "\", \"model\": \"" . $row["model"] . "\", \"trim\": \"" . $row["trim"] . "\", \"ts\": \"" . $row["ts"] . "\"}";
    }
      echo $pics;
    echo "]";
  } 
  echo "}";
} 
else{
  echo "{\"user\": {\"error\": \"Unable to login.  Invalid email or password\"}}";
}

$conn->close();
?>