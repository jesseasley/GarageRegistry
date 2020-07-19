<?php
    include("encoding.php");
    include("database.php");

    //check to see if the image exists
    if ($_POST["id"] == "-1"){
        $sql = "insert into TrackMuse_UserProjects ";
        $sql .= "(TMUserID, name, description, year, make, model, trim, builtBy, active, ts) values (";
        $sql .= $_POST["TMUserID"] . ", ";
        $sql .= "'" . encode($_POST["name"]) . "', ";
        $sql .= "'" . encode($_POST["description"]) . "', ";
        $sql .= "'" . encode($_POST["year"]) . "', ";
        $sql .= "'" . encode($_POST["make"]) . "', ";
        $sql .= "'" . encode($_POST["model"]) . "', ";
        $sql .= "'" . encode($_POST["trim"]) . "', ";
        $sql .= "'" . encode($_POST["builtBy"]) . "', ";
        $sql .= "'1', '" . $sd . "')";
    }
    else{
        if ($_POST["active"] == "0"){
            $sql = "update TrackMuse_UserProjectImages set active = '0' where projectid = '" . $_POST["id"] . "'";
            $conn->query($sql);
            $sql = "update TrackMuse_UserProjectParts set active = '0' where projectid = '" . $_POST["id"] . "'";
            $conn->query($sql);
        }
        $sql = "update TrackMuse_UserProjects ";
        $sql .= "set TMUserID = '" . $_POST["TMUserID"] . "', ";
        $sql .= "name = '" . encode($_POST["name"]) . "', ";
        $sql .= "description = '" . encode($_POST["description"]) . "', ";
        $sql .= "year = '" . encode($_POST["year"]) . "', ";
        $sql .= "make = '" . encode($_POST["make"]) . "', ";
        $sql .= "model = '" . encode($_POST["model"]) . "', ";
        $sql .= "trim = '" . encode($_POST["trim"]) . "', ";
        $sql .= "builtBy = '" . encode($_POST["builtBy"]) . "', ";
        $sql .= "ts = '" . $sd . "', ";
        $sql .= "active = '" . $_POST["active"] . "' ";
        $sql .= "where id= '" . $_POST["id"] . "'";
    }
    if ($conn->query($sql) === TRUE) {
        if ($_POST["id"] == "-1"){
            $sql = "select max(id) MaxID from TrackMuse_UserProjects;";
            $rs = $conn->query($sql);
            $row = $rs->fetch_assoc();
            echo "({'newID': '" . $row["MaxID"] . "'})";
        }
        else
            echo "{\"image\": {\"message\": \"Project successfully updated\"}}";
    } else {
        echo "{\"image\": {\"error\": \"Error updating project: " . $conn->error . "\"}}";
    }
    $conn->close();
?>