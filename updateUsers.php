<?php
    include("database.php");

//check to see if the user already exists
$sql = "select * from TrackMuse_Users where id= '" . $_POST["id"] . "'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    // update the news
    $sql = "update TrackMuse_Users set ";
    $sql .= "username = '" . $_POST["username"] . "', ";
    $sql .= "password = '" . $_POST["password"] . "', ";
    $sql .= "email = '" . $_POST["email"] . "', ";
    $sql .= "zipcode = '" . $_POST["zipcode"] . "', ";
    $sql .= "level = '" . $_POST["level"] . "', ";
    $sql .= "active = '" . $_POST["active"] . "', ";
    $sql .= "ts = '" . $sd . "' ";
    $sql .= "where id = '" . $_POST["id"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "{\"users\": {\"message\": \"'" . $_POST["username"] . "' successfully updated\"}}";
    } else {
        echo "{\"users\": {\"error\": \"Error updating user: " . $conn->error . "\"}}";
    }
} 
else
{
    $sql = "insert into trackmuse_users (username, password, email, zipcode, level, active, ts) values (";
    $sql .= "'" . $_POST["username"] . "', ";
    $sql .= "'" . $_POST["password"] . "', ";
    $sql .= "'" . $_POST["email"] . "', ";
    $sql .= "'" . $_POST["zipcode"] . "', ";
    $sql .= "'" . $_POST["level"] . "', ";
    $sql .= "'" . $_POST["active"] . "', ";
    $sql .= "'" . $sd . "')";

    if ($conn->query($sql) === TRUE) {
        echo "{\"users\": {\"message\": \"'" . $_POST["username"] . "' successfully added\"}}";
    } else {
        echo "{\"users\": {\"error\": \"Error inserting user: " . $conn->error . "\"}}";
    }
}
$conn->close();
?>