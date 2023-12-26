<?php
require_once 'apis/connections/exerciseDB/exercises.php';
require_once 'apis/connections/exerciseDB/body_part_list.php';
require_once 'apis/connections/exerciseDB/equipment_list.php';
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
include 'DB/connections/fetch_favorite_exercises.php';
$exercises = $_SESSION['listOfExercises'];
$resultExercises = array();

if (!empty($favoriteExercises)) {
    foreach ($exercises as $exercise) {
        foreach ($favoriteExercises as $favExercise) {
            if ($exercise->id == $favExercise['id']) {
                //echo '$exercise->id';
                array_push($resultExercises, $exercise);
            }
        }
    }
} else {
    header("Location: exercise_page.php");
}
