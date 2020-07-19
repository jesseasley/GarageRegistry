<?php
    include("database.php");

//check to see if the user already exists
$sql = "select * from TrackMuse_News where id= '" . $_POST["id"] . "'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    // update the news
    $sql = "update TrackMuse_News set ";
    $sql .= "caption = '" . $_POST["caption"] . "', ";
    $sql .= "link = '" . $_POST["link"] . "', ";
    $sql .= "source = '" . $_POST["source"] . "', ";
    $sql .= "active = '" . $_POST["active"] . "', ";
    $sql .= "ts = '" . $sd . "' ";
    $sql .= "where id = '" . $_POST["id"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "{\"news\": {\"message\": \"'" . $_POST["caption"] . "' successfully updated\"}}";
    } else {
        echo "{\"user\": {\"error\": \"Error updating news: " . $conn->error . "\"}}";
    }
} 
else
{
    $sql = "insert into TrackMuse_News (caption, link, source, imagePath, active, ts) values (";
    $sql .= "'" . $_POST["caption"] . "', ";
    $sql .= "'" . $_POST["link"] . "', ";
    $sql .= "'" . $_POST["source"] . "', ";
    $sql .= "'" . $_POST["imagepath"] . "', ";
    $sql .= "'" . $_POST["active"] . "', ";
    $sql .= "'" . $sd . "')";

    if ($conn->query($sql) === TRUE) {
        echo "{\"news\": {\"message\": \"'" . $_POST["caption"] . "' successfully inserted\"}}";
    } else {
        echo "{\"user\": {\"error\": \"Error inserting news: " . $conn->error . "\"}}";
    }
}
$conn->close();
?>