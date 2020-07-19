<?php

    $handle = opendir('.');
    while (false !== ($entry = readdir($handle))) {
        if (!in_array($entry,array(".","..","compressfolder.php","index.php"))){
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
        $newwidth = $width;
        $newheight = $height;
        if ($width > 1024){
            $newwidth = 1024;
            $newheight = (1024 / $width) * $height;
        }
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($thumb, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($thumb, $source_url, $quality);
        echo " width: " . $width . "px, height: " . $height . "px";
        if (!($width == $newwidth))
            echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;changing to width: " . $newwidth . "px, height: " . $newheight . "px";
        echo "<br>";
    }
?>