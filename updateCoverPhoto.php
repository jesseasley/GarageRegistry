<?php
    include("newFilename.php");
    include("database.php");
    include("compress.php");

    $target_file = newFilename("images/");

    $json = "";
    $uploadOk = 1;

    // Check file size
    if ($_FILES["editCoverPhotoPhoto"]["size"] > 1000000) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"That file is greater than the 1Mb limit.\"}";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"Your photo was not uploaded. (" . $_FILES["trimCoverPhotoFile"] . ")\"}";

    // if everything is ok, try to upload file
    } else {
        if (compress($_FILES["editCoverPhotoPhoto"]["tmp_name"], "images\\" . $target_file)) {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"The photo ". $target_file . " has been uploaded.\"}";

            // update the news
            $sql = "update TrackMuse_Users set ";
            $sql .= "coverphoto = '" . $target_file . "', ";
            $sql .= "ts = '" . $sd . "' ";
            $sql .= "where id = '" . $_POST["editCoverPhotoUserID"] . "'";

            if ($conn->query($sql) === TRUE) {
                $json .= ",{\"message\": {\"message\": \"image successfully updated\"}}";
            } else {
                $json .= ",{\"message\": {\"error\": \"Error updating image: " . $conn->error . "\"}}";
            }
            $conn->close();
        } else {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"There was an error uploading your cover photo. (" . $target_file . ")\"}";
        }
    }

    if ($uploadOk == "1"){
        $uploadOk = "success";
    }
    else
        $uploadOk = "failure";

    $json = "{\"status\":\"" . $uploadOk . "\", \"messages\":[" . $json . "], \"file\": \"" . $target_file . "\"}";
    echo $json;
?>