<?php
session_start();
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

require_once 'apis/models/food_model.php';

function getFood($foodName)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://dietagram.p.rapidapi.com/apiFood.php?name=$foodName&lang=pl",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: dietagram.p.rapidapi.com",
            "X-RapidAPI-Key: 4f0685095cmsh09760b696f2c2a0p1dac66jsn533ab08c1848"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $foodData = json_decode($response, true);

        if (isset($foodData['dishes']) && is_array($foodData['dishes'])) {
            $foodList = [];

            foreach ($foodData['dishes'] as $foodItem) {
                $food = new Food(
                    $foodItem['id'],
                    $foodItem['name'],
                    $foodItem['caloric'],
                    $foodItem['fat'],
                    $foodItem['carbon'],
                    $foodItem['protein']
                );
                array_push($foodList, $food);
            }

            return $foodList; // Return the fetched food list
        } else {
            echo "No or invalid data retrieved.";
            return []; // Return an empty array if no data or invalid data
        }
    }
}
