<?php

function encode($input) {
    //http://ee.hawaii.edu/~tep/EE160/Book/chap4/subsection2.1.1.1.html
    $output = "";
    for ($i = 0; $i < strlen($input); $i++) {
        if (
            ((ord(substr($input, $i, 1)) > 31) && (ord(substr($input, $i, 1)) < 34)) ||
            ((ord(substr($input, $i, 1)) > 34) && (ord(substr($input, $i, 1)) < 39)) ||
            ((ord(substr($input, $i, 1)) > 39) && (ord(substr($input, $i, 1)) < 59)) ||
            ((ord(substr($input, $i, 1)) > 59) && (ord(substr($input, $i, 1)) < 64)) ||
            ((ord(substr($input, $i, 1)) > 64) && (ord(substr($input, $i, 1)) < 92)) ||
            ((ord(substr($input, $i, 1)) > 92) && (ord(substr($input, $i, 1)) < 127)) ||
            (ord(substr($input, $i, 1)) == 9)
        )
            $output .= substr($input, $i, 1);
        if (ord(substr($input, $i, 1)) == 13)
            $output .= "[0" . ord(substr($input, $i, 1)) . "]";
        if (ord(substr($input, $i, 1)) == 34)
            $output .= "[0" . ord(substr($input, $i, 1)) . "]";
        if (ord(substr($input, $i, 1)) == 39)
            $output .= "[0" . ord(substr($input, $i, 1)) . "]";
        if (ord(substr($input, $i, 1)) == 59)
            $output .= "[0" . ord(substr($input, $i, 1)) . "]";
        if (ord(substr($input, $i, 1)) == 92)
            $output .= "[0" . ord(substr($input, $i, 1)) . "]";
    }
    return $output;

}

?>
    