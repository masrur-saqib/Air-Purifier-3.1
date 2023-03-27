<?php
$servername = "localhost";

$dbname = "masrursaqib_air_purifier";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT reading_time AS Timestamp, humidity AS Humidity, dustlvl AS Dust_Level, 
lpglvl AS LPG_Level, temperature AS Temperature
 FROM `airpurifier` ORDER BY reading_time DESC LIMIT 15;";

$result = $conn->query($query);
$data = array();

foreach ($result as $row) {
    $data[] =
        $row;
}
$result->close();
$datajson = json_encode($data);
print $datajson;
