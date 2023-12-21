<?php

require_once 'C:\xampp\htdocs\Fit_Nation\apis\models\exercise_model.php';

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises?limit=500",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: exercisedb.p.rapidapi.com",
        "X-RapidAPI-Key: bf613e5f7emsh9285a5f6882b63ap1c3c57jsne9fe66bee477"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);


if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $exerciseData = json_decode($response, true);

    $exerciseList = [];

    foreach ($exerciseData as $exerciseItem) {
        $exercise = new Exercise(
            $exerciseItem['bodyPart'],
            $exerciseItem['equipment'],
            $exerciseItem['gifUrl'],
            $exerciseItem['id'],
            $exerciseItem['name'],
            $exerciseItem['target'],
            $exerciseItem['secondaryMuscles'],
            $exerciseItem['instructions']
        );
        array_push($exerciseList, $exercise);
    }

    session_start();
    $_SESSION['listOfExercises'] = $exerciseList;
}
