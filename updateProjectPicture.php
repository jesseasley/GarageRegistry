<?php
    include("newFilename.php");
    include("encoding.php");
    include("database.php");
    include("compress.php");

    $json = "";
    $uploadOk = 1;
    //if pictureID = -1, this is a new upload, so add the pic to the server and get the new filename
    if ($_POST["editProjectPictureID"] == "-1"){
        $target_file = newFilename("images/projects/");

        // Check file size
        if ($_FILES["editProjectPictureGetPhoto"]["size"] > 1000000) {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"That file is greater than the 1Mb limit.\"}";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"Your file was not uploaded. (" . basename($_FILES["editProjectPictureGetPhoto"]["name"]) . ")\"}";

        // if everything is ok, try to upload file
        } else {
            if (compress($_FILES["editProjectPictureGetPhoto"]["tmp_name"], "images\\projects\\" . $target_file)) {
                if ($_REQUEST["cover"] == "1"){
                    $sql = "update TrackMuse_UserProjectImages set coverphoto = '0' where projectid = '";
                    $sql .= $_POST["editProjectPictureProjectID"] . "'";
                    $conn->query($sql);
                }
                $sql = "insert into TrackMuse_UserProjectImages (title, description, coverphoto, ";
                $sql .= "ts, active, filename, projectid) values (";
                $sql .= "'" . encode($_POST["editProjectPictureTitle"]) . "', ";
                $sql .= "'" . encode($_POST["editProjectPictureDescription"]) . "', ";
                $sql .= "'" . $_REQUEST["cover"] . "', '";
                $sql .= $sd . "', '" . $_REQUEST["active"] . "', '" . $target_file . "', ";
                $sql .= "'" . $_POST["editProjectPictureProjectID"] . "')";
                echo $sql;
                if ($conn->query($sql) === TRUE) {
                    echo "{\"image\": {\"message\": \"Project picture successfully added.\"}}";
                } else {
                    echo "{\"image\": {\"error\": \"Error adding project picture: " . $conn->error . "\"}}";
                }
            }
        }
    }
    else{
        //pictureID != -1, so just update the attributes
        if ($_REQUEST["cover"] == "1"){
            $sql = "update TrackMuse_UserProjectImages set coverphoto = '0' where projectid = '";
            $sql .= $_POST["editProjectPictureProjectID"] . "'";
            $conn->query($sql);
        }
        $sql = "update TrackMuse_UserProjectImages ";
        $sql .= "set title = '" . encode($_POST["editProjectPictureTitle"]) . "', ";
        $sql .= "description = '" . encode($_POST["editProjectPictureDescription"]) . "', ";
        $sql .= "coverphoto = '" . $_REQUEST["cover"] . "', ";
        $sql .= "ts = '" . $sd . "', ";
        $sql .= "active = '" . $_REQUEST["active"] . "' ";
        $sql .= "where id= '" . $_POST["editProjectPictureID"] . "'";
        if ($conn->query($sql) === TRUE) {
            echo "{\"image\": {\"message\": \"Project picture successfully updated.\"}}";
        } else {
            echo "{\"image\": {\"error\": \"Error updating project picture: " . $conn->error . "\"}}";
        }

    }



    $conn->close();
?>