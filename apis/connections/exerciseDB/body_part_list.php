<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises/bodyPartList",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: exercisedb.p.rapidapi.com",
        "X-RapidAPI-Key: f21cc5fcb1msh20acb55f4705de6p177a89jsn8c88713d59e3"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $bodyPartData = json_decode($response, true);

    $bodyPartList = [];

    foreach ($bodyPartData as $bodyPartItem) {
        array_push($bodyPartList, $bodyPartItem);
    }
    $_SESSION['listOfBodyParts'] = $bodyPartList;
}
