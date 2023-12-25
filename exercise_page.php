<?php
require_once 'apis/connections/exerciseDB/exercises.php';
require_once 'apis/connections/exerciseDB/body_part_list.php';
require_once 'apis/connections/exerciseDB/equipment_list.php';

// Filter logic
$filteredExercises = $_SESSION['listOfExercises']; // Initially, display all exercises
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

<!DOCTYPE html>
<html>

<head>
  <script>
    window.addEventListener('scroll', function() {
      var scrollPosition = window.innerHeight + window.scrollY;
      var totalHeight = document.body.offsetHeight;

      // Adjust the threshold as needed to trigger the pagination bar
      var threshold = 50;

      if (totalHeight - scrollPosition < threshold) {
        document.querySelector('.pagination-container').style.display = 'block';
      } else {
        document.querySelector('.pagination-container').style.display = 'none';
      }
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      const favoriteStars = document.querySelectorAll('.favorite-star');

      favoriteStars.forEach(star => {
        star.addEventListener('click', function(event) {
          const exerciseId = event.currentTarget.getAttribute('exerciseId');
          const user = event.currentTarget.getAttribute('data-user');

          if (event.currentTarget.classList.contains('yellow')) {
            event.currentTarget.classList.remove('yellow');
            removeFromFavorites(exerciseId, user); // Calling a function to handle removal
          } else {
            event.currentTarget.classList.add('yellow');
            addToFavorites(exerciseId, user); // Calling a function to handle addition
          }
        });
      });

      function addToFavorites(exerciseId, user) {
        var username = "<?php echo isset($_SESSION['user']['Username']) ? $_SESSION['user']['Username'] : '' ?>";
        $.ajax({
          url: "DB/connections/favorite_exercises.php",
          type: "POST",
          data: {
            exerciseId: exerciseId,
            user: username,
            flag: 1
          },
          success: function(data) {
            console.log(data);
          }
        });
        console.log(`Exercise ${exerciseId} added to favorites.`);
      }

      function removeFromFavorites(exerciseId, user) {
        var username = "<?php echo isset($_SESSION['user']['Username']) ? $_SESSION['user']['Username'] : 'REALLY NIGGA' ?>";
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
          }
        });
        console.log(`Exercise ${exerciseId} removed from favorites.`);
      }
    });
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    <?php include 'css/exercise_page_design.css' ?>
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <a class="nav-link" href="favorite_exercises_page.php">Favorites</a>
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


  <div class="main-container">
    <section class="exercise-results">
      <div class="exercise-grid">
        <?php
        $count = 0;
        foreach ($paginatedExercises as $exercise) {
          if ($count % 3 === 0) {
            echo '<div class="exercise-row">';
          }
          echo '<div class="exercise-container">';
          echo "<div class='exercise-description'>";
          echo "<h2>{$exercise->name}</h2>";
          echo "<div class='exercise-image'><img src='{$exercise->gifUrl}' alt='{$exercise->name}' /></div>";
          echo "<p>Body Part: {$exercise->bodyPart}</p>";
          echo "<p>Equipment: {$exercise->equipment}</p>";
          echo '</div>';
          echo "<div class='exercise-actions'>";
          echo "<span class='favorite-star' exerciseId='{$exercise->id}'>&#9734;</span>"; // Star symbol
          echo "</div>";
          echo '</div>';
          $count++;
          if ($count % 3 === 0) {
            echo '</div>';
          }
        }
        // Check if the last row is not closed
        if ($count % 3 !== 0) {
          echo '</div>';
        }
        ?>
      </div>
    </section>
    <div class="pagination-container">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php
          for ($i = 1; $i <= $totalPages; $i++) {
            // Build the URL for each pagination link, including filter parameters if they exist
            $filterParams = isset($_GET['bodyPart']) ? "bodyPart={$_GET['bodyPart']}&" : '';
            $filterParams .= isset($_GET['equipment']) ? "equipment={$_GET['equipment']}&" : '';
            $isActive = isset($_GET['page']) && $_GET['page'] == $i ? 'active' : ''; // Add this line to highlight the current page
            echo "<li class='page-item {$isActive}'><a class='page-link' href='exercise_page.php?{$filterParams}page={$i}'>{$i}</a></li>";
          }
          ?>
        </ul>
      </nav>
    </div>
  </div>
  <div style="color: white;">Current Page: <?php echo isset($_GET['page']) ? $_GET['page'] : '1'; ?></div>
</body>

</html>