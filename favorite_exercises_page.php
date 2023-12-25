<!DOCTYPE html>
<html>
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
?>

<head>
    <style>
        <?php include 'css/favorite_exercises_design.css' ?>
        /* Add CSS styles for formatting as needed */
    </style>
</head>

<body>
    <?php foreach ($resultExercises as $exercise) : ?>
        <div class="container">
            <div class="image">
                <img src="<?php echo $exercise->gifUrl; ?>" alt="">
            </div>
            <div class="description">
                <h2 class="text"><?php echo $exercise->name; ?></h2>
                <h4 class="text">Body Part: <?php echo $exercise->bodyPart; ?></h4>
                <h4 class="text">Equipment: <?php echo $exercise->equipment; ?></h4>
                <span>&#9734;</span> <!-- Star icon or other action for each exercise -->
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>