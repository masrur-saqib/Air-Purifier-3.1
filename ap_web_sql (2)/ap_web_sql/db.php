<?php

$servername = "localhost";

$dbname = "masrursaqib_air_purifier";
$username = "root";
$password = "";

$con = new mysqli($servername, $username, $password, $dbname);
        // Check connection
if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
}
?>