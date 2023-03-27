<?php

$servername = "localhost";

/*
$dbname = "masrursaqib_air_purifier";
$username = "masrursaqib_me";
$password = "masrur123456789";
*/
$dbname = "masrursaqib_air_purifier";
$username = "root";
$password = "";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $humidity = $temperature = $dustlvl = $lpglvl = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = sensor_input($_POST["api_key"]);
    if ($api_key == $api_key_value) {
        $humidity = sensor_input($_POST["humidity"]);
        $temperature = sensor_input($_POST["temperature"]);
        $dustlvl = sensor_input($_POST["dustlvl"]);
        $lpglvl = sensor_input($_POST["lpglvl"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO airpurifier (humidity, temperature, dustlvl, lpglvl)
        VALUES ('" . $humidity . "', '" . $temperature . "', '" . $dustlvl . "', '" . $lpglvl . "')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }
} else {
    echo "No data posted with HTTP POST.";
}

function sensor_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
