<?php
    include("newFilename.php");
    include("database.php");
    include("compress.php");

    //$target_dir = "images\\autos\\";
    $target_file = newFilename("images/autos/");
    //"images\\autos\\" . basename($_FILES["stockFileToUpload"]["name"]);

    $json = "";
    //$target_file = $target_dir . $_REQUEST["trimFile"];
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["stockFileToUpload"]["tmp_name"]);
        if($check == false) {
            $json .= "{\"message\":\"File is not an image.\"}";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["stockFileToUpload"]["size"] > 1000000) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"That file is greater than the 1Mb limit.\"}";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"Your file was not uploaded. (" . basename($_FILES["stockFileToUpload"]["name"]) . ")\"}";

    // if everything is ok, try to upload file
    } else {
        if (compress($_FILES["stockFileToUpload"]["tmp_name"], "images\\autos\\" . $target_file)) {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"The file ". basename( $_FILES["stockFileToUpload"]["name"]). " has been uploaded.\"}";
        } else {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"There was an error uploading your file. (" . $target_file . ")\"}";
        }
    }
//echo  "***" . basename($_FILES["stockFileToUpload"]["name"]) . "***";
    if ($uploadOk == "1"){
        $uploadOk = "success";
        $sql = "insert into TrackMuse_StockImages (filename, title, active, ts) values (";
        $sql .= "'" . $target_file . "', '" . $_POST["stockPhotoTitle"] . "', '1','" . $sd . "')";

        if ($conn->query($sql) === TRUE) {
            $json .= ",{\"message\":\"" . $_FILES["stockFileToUpload"]["name"] . " saved successfully\"}";
        } else {
            $json .= ",{\"message\":\"Error saving " . $_FILES["stockFileToUpload"]["name"] . ": " . $conn->error . "\"}";
        }
    }
    else{
        $uploadOk = "failure";
    }

    $json = "{\"status\":\"" . $uploadOk . "\", \"messages\":[" . $json . "]}";
    echo $json;
?>