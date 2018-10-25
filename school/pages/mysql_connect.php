<?php
$link = mysqli_connect("localhost", "root", "", "schools2");
if(!$link) { exit("Can not connect database"); }
mysqli_set_charset($link, "utf8");
?>