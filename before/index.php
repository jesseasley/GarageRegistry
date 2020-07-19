<?php

    $cnt = 1;
    $handle = opendir('.');
    echo "<table>";
    while (false !== ($entry = readdir($handle))) {
        if (!in_array($entry,array(".","..","test.php","index.php"))){
            if ($cnt == 1)
                echo "<tr>";
            echo "<td>";
            echo "<img src='" . $entry . "' width='300px' />";
            echo "</td>";
            $cnt += 1;
            if ($cnt == 5){
                echo "</tr><tr>";
                $cnt = 1;
            }
        }
    }
    echo "</table>";
?>