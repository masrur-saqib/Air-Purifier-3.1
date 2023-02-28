<?php

$servername = "localhost";

$dbname = "masrursaqib_air_purifier";
$username = "masrursaqib_me";
$password = ";Tv=j4a)detz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$d1 = $_POST["date1"];
$d2 = $_POST["date2"];
$id = $_POST["graphID"];

if ($id == 1) {
    $query = "SELECT    CAST(DATE_FORMAT(reading_time, '%i') AS INT) + 
                    CAST(DATE_FORMAT(reading_time, '%s') AS INT) / 60 AS 'Timestamp', 
                    humidity AS Humidity 
                    FROM airPurifier 
                    WHERE unix_timestamp(reading_time) * 1000 >= $d1 and
                    unix_timestamp(reading_time) * 1000 <= $d2 ORDER BY Timestamp;";
}
if ($id == 2) {
    $query = "SELECT    CAST(DATE_FORMAT(reading_time, '%i') AS INT) + 
                    CAST(DATE_FORMAT(reading_time, '%s') AS INT) / 60 AS 'Timestamp', 
                    temperature AS Temperature 
                    FROM airPurifier 
                    WHERE unix_timestamp(reading_time) * 1000 >= $d1 and
                    unix_timestamp(reading_time) * 1000 <= $d2 ORDER BY Timestamp;";
}
if ($id == 3) {
    $query = "SELECT    CAST(DATE_FORMAT(reading_time, '%i') AS INT) + 
                    CAST(DATE_FORMAT(reading_time, '%s') AS INT) / 60 AS 'Timestamp', 
                    dustlvl AS Dust_Level 
                    FROM airPurifier 
                    WHERE unix_timestamp(reading_time) * 1000 >= $d1 and
                    unix_timestamp(reading_time) * 1000 <= $d2 ORDER BY Timestamp;";
}
if ($id == 4) {
    $query = "SELECT    CAST(DATE_FORMAT(reading_time, '%i') AS INT) + 
                    CAST(DATE_FORMAT(reading_time, '%s') AS INT) / 60 AS 'Timestamp', 
                    lpglvl AS LPG_Level 
                    FROM airPurifier 
                    WHERE unix_timestamp(reading_time) * 1000 >= $d1 and
                    unix_timestamp(reading_time) * 1000 <= $d2 ORDER BY Timestamp;";
}

$result = $conn->query($query);
$data = array();
foreach ($result as $row) {
    $data[] =
        $row;
}
$result->close();
$datajson = json_encode($data);
print $datajson;
