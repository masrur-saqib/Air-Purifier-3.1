<?php

$servername = "localhost";

$dbname = "masrursaqib_air_purifier";
$username = "masrursaqib_me";
$password = ";Tv=j4a)detz";

$con = new mysqli($servername, $username, $password, $dbname);
        // Check connection
if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
}
?>