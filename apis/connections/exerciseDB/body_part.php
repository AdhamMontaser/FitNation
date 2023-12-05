<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises/bodyPart/chest?limit=10",
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
	echo $response;
}
