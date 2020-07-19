<?php
    include("database.php");

    if ($_POST["tbl"] == 'pic'){
        $sql = "update TrackMuse_UserProjectImages set ";
        $sql .= "active = '" . $_POST["active"] . "', ";
        $sql .= "ts = '" . $sd . "' ";
        $sql .= "where id = '" . $_POST["id"] . "'";
    }
    else{
        $sql = "update TrackMuse_UserProjectParts set ";
        $sql .= "active = '" . $_POST["active"] . "', ";
        $sql .= "ts = '" . $sd . "' ";
        $sql .= "where id = '" . $_POST["id"] . "'";
    }
    if ($conn->query($sql) === TRUE) {
        echo "{\"users\": {\"message\": \"image successfully updated\"}}";
    } else {
        echo "{\"users\": {\"error\": \"Error updating user: " . $conn->error . "\"}}";
    }
    $conn->close();
?>