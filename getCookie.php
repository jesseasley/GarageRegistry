<?php
if(!isset($_COOKIE[$_REQUEST["name"]])) {
    echo "";
} else {
    echo $_COOKIE[$_REQUEST["name"]];
}
?>