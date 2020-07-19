<?php
    include("newFilename.php");
    include("database.php");
    include("compress.php");

    $target_file = newFilename("images/");

    $json = "";
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["editNewsFileToUpload"]["tmp_name"]);
    if($check == false) {
        $json .= "{\"message\":\"File is not an image.\"}";
        $uploadOk = 0;
    }

    // Check file size
    $filesize = $_FILES["editNewsFileToUpload"]["size"];
    if ($filesize > 20000000) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"That file is greater than the 20Mb limit.\"}";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"Your file was not uploaded. (" . basename($_FILES["editNewsFileToUpload"]["name"]) . ")\"}";

        // if everything is ok, try to upload file
    } else {
        if (compress($_FILES["editNewsFileToUpload"]["tmp_name"], "images\\" . $target_file)) {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"The file ". basename( $_FILES["editNewsFileToUpload"]["name"]). " has been uploaded.\"}";
        } else {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"There was an error uploading your file. (" . $target_file . ")\"}";
        }
    }

    if ($uploadOk == "1"){
        //upload was successful, lets write this to the DB
        $uploadOk = "success";
        $sql = "insert into TrackMuse_News (caption, link, source, imagePath, active, ts) values (";
        $sql .= "'" . $_POST["editNewsCaption"] . "', ";
        $sql .= "'" . $_POST["editNewsLink"] . "', ";
        $sql .= "'" . $_POST["editNewsSource"] . "', ";
        $sql .= "'images/" . $target_file . "', ";
        $sql .= "'1', ";
        $sql .= "'" . $sd . "')";
        if ($conn->query($sql) === TRUE) {
            $json .= ",{\"message\":\"" . $_FILES["editNewsFileToUpload"]["name"] . " saved successfully\"}";
        } else {
            $json .= ",{\"message\":\"Error saving " . $_FILES["editNewsFileToUpload"]["name"] . ": " . $conn->error . "\"}";
        }
    }
    else{
        $uploadOk = "failure";
    }

    $json = "{\"status\":\"" . $uploadOk . "\", \"messages\":[" . $json . "]}";
    echo $json;
?>




