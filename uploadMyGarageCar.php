<?php
    include("newFilename.php");
    include("database.php");
    include("compress.php");

    //$target_dir = "images\\autos\\";
    //$target_file = "images\\autos\\" . basename($_FILES["fileToUpload"]["name"]);
    //$target_file = "images\\autos\\" . newFilename("images/autos/");
    $target_file = newFilename("images/autos/");

    $json = "";
    //$target_file = $target_dir . $_REQUEST["trimFile"];
    $uploadOk = 1;

    // Check file size
    if ($_FILES["fileMyGarageCar"]["size"] > 1000000) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"That file is greater than the 1Mb limit.\"}";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"Your file was not uploaded. (" . basename($_FILES["fileMyGarageCar"]["name"]) . ")\"}";

    // if everything is ok, try to upload file
    } else {
        if (compress($_FILES["fileMyGarageCar"]["tmp_name"], "images\\autos\\" . $target_file)) {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"The file ". $target_file . " has been uploaded.\"}";
        } else {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"There was an error uploading your file. (" . $target_file . ")\"}";
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