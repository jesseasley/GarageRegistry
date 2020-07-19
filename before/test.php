<?php

    $handle = opendir('.');
    while (false !== ($entry = readdir($handle))) {
        if (!in_array($entry,array(".","..","test.php"))){
            echo $entry;
            compress($entry);
        }
    }
    function compress($source){
        $quality = "70";
        $source_url = $source;
        $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source_url);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source_url);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source_url);

        //imagejpeg($image, $destination_url, $quality);
    
        $width = $info[0];
        $height = $info[1];
        if ($width > 1024){
            $newwidth = 1024;
            $newheight = (1024 / $width) * $height;
        }
        else{
            $newwidth = $width;
            $newheight = $height;
        }
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        //$source = imagecreatefromjpeg($destination_url);
        imagecopyresampled($thumb, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($thumb, $source_url, $quality);
            echo " width: " . $width . " x height: " . $height . "<br>";
    }
?>