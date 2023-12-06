<?php
require_once '..\..\models\exercise_model.php';

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: exercisedb.p.rapidapi.com",
        "X-RapidAPI-Key: 8b5b8fc98amsh047fd98391c68f3p1741fajsnb8bdff583af2"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

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
    foreach ($exerciseList as $exercise) {
        echo "Exercise: {$exercise->name}<br>";
        echo "Body Part: {$exercise->bodyPart}<br>";
        echo "Equipment: {$exercise->equipment}<br>";
        echo "Picture: {$exercise->gifUrl}<br>";
        // Add more properties as needed
        echo "<br>";
    }
}
