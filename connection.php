<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "4779";
$db_name = "mobile_banking";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$con){
    die("Failed to connect");
}
