<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
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

// POST current time
date_default_timezone_set('America/Chicago');
$d = new DateTime();
$sd = $d->format('m-d-Y H:i:s');

//check to see if the user already exists
$sql = "select * from TrackMuse_Forum where id= '" . $_POST["id"] . "'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    // update the news
    $sql = "update TrackMuse_Forum set ";
    $sql .= "TMUserID = '" . $_POST["TMUserID"] . "', ";
    $sql .= "parentObject = '" . $_POST["parentObject"] . "', ";
    $sql .= "parentID = '" . $_POST["parentID"] . "', ";
    $sql .= "title = '" . $_POST["title"] . "', ";
    $sql .= "message = '" . $_POST["message"] . "', ";
    $sql .= "projectID = '" . $_POST["projectid"] . "', ";
    $sql .= "active = '" . $_POST["active"] . "', ";
    $sql .= "ts = '" . $sd . "' ";
    $sql .= "where id = '" . $_POST["id"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "{\"news\": {\"message\": \"'" . $_POST["title"] . "' successfully updated\"}}";
    } else {
        echo "{\"user\": {\"error\": \"Error updating forum: " . $conn->error . "\"}}";
    }
} 
else
{
    $sql = "insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, projectID, message, active, ts) values (";
    $sql .= "'" . $_POST["TMUserID"] . "', ";
    $sql .= "'" . $_POST["parentObject"] . "', ";
    $sql .= "'" . $_POST["parentID"] . "', ";
    $sql .= "'" . $_POST["title"] . "', ";
    $sql .= "'" . $_POST["projectid"] . "', ";
    $sql .= "'" . $_POST["message"] . "', ";
    $sql .= "'" . $_POST["active"] . "', ";
    $sql .= "'" . $sd . "')";


    if ($conn->query($sql) === TRUE) {
        echo "{\"news\": {\"message\": \"'" . $_POST["title"] . "' successfully inserted\"}}";
    } else {
        echo "{\"user\": {\"error\": \"Error inserting forum: " . $conn->error . "\"}}";
    }
}
$conn->close();
?>