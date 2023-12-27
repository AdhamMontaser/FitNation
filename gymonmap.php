<?php

$con = new mysqli('localhost', 'root', '', 'fitnation');

$sql = "SELECT latitude, longitude, Gym_Name AS name, picname FROM gym";
$result = $con->query($sql);

$branches = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $branches[] = array(
            "latitude" => floatval($row['latitude']),
            "longitude" => floatval($row['longitude']),
            "name" => $row['name'],
            "picname" => $row['picname'] 
        );
    }
}

header('Content-Type: application/json');
echo json_encode($branches);

$con->close();


?>
