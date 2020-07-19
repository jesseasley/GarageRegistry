<?php
/*
this function compresses an image as the path is passed in the parameter
the image will be replaced, in place, with the compressed version, an original will not be archived.
call with compress("images/source_picture.jpg", "images/target_picture.jpg");
*/
    function compress($source, $target){
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
        imagejpeg($thumb, $target, $quality);
        if ($source != $target)
            unlink($source);
        return 1;
    }
?>