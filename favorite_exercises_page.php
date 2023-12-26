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
$filteredExercises = $resultExercises;
if (isset($_GET['bodyPart']) && $_GET['bodyPart'] !== 'all') {
    $filteredExercises = array_filter($filteredExercises, function ($exercise) {
        return $exercise->bodyPart === $_GET['bodyPart'];
    });
}

if (isset($_GET['equipment']) && $_GET['equipment'] !== 'all') {
    $filteredExercises = array_filter($filteredExercises, function ($exercise) {
        return $exercise->equipment === $_GET['equipment'];
    });
}

$exercisesPerPage = 30;
$totalExercises = count($filteredExercises);
$totalPages = ceil($totalExercises / $exercisesPerPage);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $exercisesPerPage;
$endIndex = $startIndex + $exercisesPerPage - 1;
$paginatedExercises = array_slice($filteredExercises, $startIndex, $exercisesPerPage);


?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        <?php include 'css/favorite_exercises_design.css' ?>
        /* Add CSS styles for formatting as needed */
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Existing nav links -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exercise_page.php">Browse Exercises</a>
                    </li>
                </ul>

                <!-- Dropdown filters and Apply Filters button -->
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group mr-sm-2">
                        <select class="form-select" id="bodyPartDropdown" name="bodyPart">
                            <option value="all" selected>Select Body Part</option>
                            <?php
                            foreach ($_SESSION['listOfBodyParts'] as $part) {
                                $selected = isset($_GET['bodyPart']) && $_GET['bodyPart'] === $part ? 'selected' : '';
                                echo "<option value='{$part}' {$selected}>{$part}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-group mr-sm-2">
                        <select class="form-select" id="equipmentDropdown" name="equipment">
                            <option value="all" selected>Select Equipment</option>
                            <?php
                            foreach ($_SESSION['listOfEquipments'] as $equipment) {
                                $selected = isset($_GET['equipment']) && $_GET['equipment'] === $equipment ? 'selected' : '';
                                echo "<option value='{$equipment}' {$selected}>{$equipment}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Apply Filters</button>
                </form>
            </div>
        </div>
    </nav>
    <?php foreach ($filteredExercises as $exercise) : ?>
        <div class="container">
            <div class="image">
                <img src="<?php echo $exercise->gifUrl; ?>" alt="">
            </div>
            <div class="description">
                <h2 class="text"><?php echo $exercise->name; ?></h2>
                <h4 class="text">Body Part: <?php echo $exercise->bodyPart; ?></h4>
                <h4 class="text">Equipment: <?php echo $exercise->equipment; ?></h4>
                <!-- <span class='favorite-star' exerciseId='<?php echo $exercise->id; ?>' style='color: yellow;'>&#9734;</span> -->
                <?php echo "<span class = 'favorite-star' style = 'color: yellow;' exerciseId = '{$exercise->id}'>&#9734;</span>"; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const favoriteStars = document.querySelectorAll('.favorite-star');

            favoriteStars.forEach(star => {
                star.addEventListener('click', function(event) {
                    if (event.currentTarget.style.color === 'yellow') {
                        event.currentTarget.style.color = 'white';
                        removeFromFavorites(event.currentTarget.getAttribute('exerciseId'));
                    } else {
                        event.currentTarget.style.color = 'yellow';
                        // addToFavorites(event.currentTarget.getAttribute('exerciseId'));
                    }
                });
            });

            function removeFromFavorites(exerciseId) {
                var username = "<?php echo isset($_SESSION['user']['Username']) ? $_SESSION['user']['Username'] : '' ?>";
                $.ajax({
                    url: "DB/connections/favorite_exercises.php",
                    type: "POST",
                    data: {
                        exerciseId: exerciseId,
                        user: username,
                        flag: 0
                    },
                    success: function(data) {
                        console.log(data);
                        location.reload();
                    }
                });
                console.log(`Exercise ${exerciseId} removed from favorites.`);
            }
        });
    </script>
</body>

</html>