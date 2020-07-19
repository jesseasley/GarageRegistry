<?php
setcookie($_POST["name"], $_POST["value"], time() + (86400 * 30), "/"); // 86400 = 1 day
if(!isset($_COOKIE[$_POST["name"]])) {
    echo "";
} else {
    echo $_COOKIE[$_POST["name"]];
}
?>