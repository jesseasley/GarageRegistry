<?php
    include("newFilename.php");
    include("database.php");
    include("compress.php");

    $target_file = newFilename("images/");

    $json = "";
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["titleFileToUpload"]["tmp_name"]);
    if($check == false) {
        $json .= "{\"message\":\"File is not an image.\"}";
        $uploadOk = 0;
    }

    // Check file size
    $filesize = $_FILES["titleFileToUpload"]["size"];
    if ($filesize > 20000000) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"That file is greater than the 20Mb limit.\"}";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"Your file was not uploaded. (" . basename($_FILES["titleFileToUpload"]["name"]) . ")\"}";

        // if everything is ok, try to upload file
    } else {
        //if (move_uploaded_file($_FILES["titleFileToUpload"]["tmp_name"], "images\\" . $target_file)) {
        if (compress($_FILES["titleFileToUpload"]["tmp_name"], "images\\" . $target_file)) {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"The file ". basename( $_FILES["titleFileToUpload"]["name"]). " has been uploaded.\"}";
            
        } else {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"There was an error uploading your file. (" . $target_file . ")\"}";
        }
    }

    if ($uploadOk == "1"){
        //upload was successful, lets write this to the DB
        $uploadOk = "success";
        $sql = "insert into TrackMuse_TitleImages (filename, title, location, active) values (";
        $sql .= "'" . $target_file . "', '" . $_POST["titlePictureTitle"] . "', '";
        $sql .= $_POST["titlePictureLocation"] . "', '1')";
        if ($conn->query($sql) === TRUE) {
            $json .= ",{\"message\":\"" . $_FILES["titleFileToUpload"]["name"] . " saved successfully\"}";
        } else {
            $json .= ",{\"message\":\"Error saving " . $_FILES["titleFileToUpload"]["name"] . ": " . $conn->error . "\"}";
        }
    }
    else{
        $uploadOk = "failure";
    }

    $json = "{\"status\":\"" . $uploadOk . "\", \"messages\":[" . $json . "]}";
    echo $json;
?>




