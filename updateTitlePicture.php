<?php
    include("database.php");

//check to see if the user already exists
$sql = "select * from TrackMuse_TitleImages where id= '" . $_POST["id"] . "'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    // update the news
    $sql = "update TrackMuse_TitleImages set ";
    $sql .= "title = '" . $_POST["title"] . "', ";
    $sql .= "location = '" . $_POST["location"] . "', ";
    $sql .= "active = '" . $_POST["active"] . "' ";
    $sql .= "where id = '" . $_POST["id"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "{\"titlePicture\": {\"message\": \"'" . $_POST["title"] . "' successfully updated\"}}";
    } else {
        echo "{\"titlePicture\": {\"error\": \"Error updating title picture: " . $conn->error . "\"}}";
    }
} 
else
{
    $sql = "insert into TrackMuse_TitleImages (filename, title, location, active) values (";
    $sql .= "'" . $_POST["filename"] . "', ";
    $sql .= "'" . $_POST["title"] . "', ";
    $sql .= "'" . $_POST["location"] . "', ";
    $sql .= "'" . $_POST["active"] . "')";

    if ($conn->query($sql) === TRUE) {
        echo "{\"titlePicture\": {\"message\": \"'" . $_POST["title"] . "' successfully inserted\"}}";
    } else {
        echo "{\"titlePicture\": {\"error\": \"Error inserting title picture: " . $conn->error . "\"}}";
    }
}
$conn->close();
?>