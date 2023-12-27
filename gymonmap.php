<?php

$con = new mysqli('localhost', 'root', '', 'fitnation');


$sql = "SELECT latitude, longitude, branch_name AS name FROM branch";
$result = $con->query($sql);

$branches = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $branches[] = array(
            "latitude" => floatval($row['latitude']),
            "longitude" => floatval($row['longitude']),
            "name" => $row['name']
        );
    }
}


header('Content-Type: application/json');
echo json_encode($branches);

$con->close();
