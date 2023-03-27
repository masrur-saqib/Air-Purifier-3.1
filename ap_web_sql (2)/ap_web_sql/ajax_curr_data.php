<?php
$servername = "localhost";

$dbname = "masrursaqib_air_purifier";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM airpurifier
WHERE reading_time = (SELECT MAX(reading_time) FROM airpurifier);";

$result = $conn->query($query);
$data = array();

foreach ($result as $row) {
    $data[] =
        $row;
}
$result->close();
$datajson = json_encode($data[0]);
print $datajson;
