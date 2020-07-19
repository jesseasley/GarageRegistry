<?php
date_default_timezone_set('America/Chicago');
$d = new DateTime();
$sd = $d->format('m-d-Y H:i:s');
echo $sd;

?>