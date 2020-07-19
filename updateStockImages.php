<?php
    include("database.php");

//check to see if the user already exists
$sql = "select * from TrackMuse_StockImages where id= '" . $_GET["id"] . "'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    // update the news
    $sql = "update TrackMuse_StockImages set ";
    $sql .= "active = '" . $_GET["active"] . "', ";
    $sql .= "title = '" . $_GET["title"] . "', ";
    $sql .= "ts = '" . $sd . "' ";
    $sql .= "where id = '" . $_GET["id"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "{\"news\": {\"message\": \"'image successfully updated\"}}";
    } else {
        echo "{\"user\": {\"error\": \"Error updating image: " . $conn->error . "\"}}";
    }
} 
$conn->close();
?>