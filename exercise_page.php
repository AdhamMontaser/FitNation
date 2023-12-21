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
  <style>
    <?php include 'css/exercise_page_design.css' ?>
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <nav>
    <!-- Your navigation bar here -->
  </nav>

  <div class="main-container">
    <section class="filters">
      <div class="filters-content">
        <form action="" method="get">
          <label for="bodyPart">Select Body Part:</label>
          <select name="bodyPart" id="bodyPart">
            <option value="all">All Body Parts</option>
            <?php
            foreach ($_SESSION['listOfBodyParts'] as $part) {
              $selected = isset($_GET['bodyPart']) && $_GET['bodyPart'] === $part ? 'selected' : '';
              echo "<option value='{$part}' {$selected}>{$part}</option>";
            }
            ?>
          </select>
          <br>
          <label for="equipment">Select Equipment:</label>
          <select name="equipment" id="equipment">
            <option value="all">All Equipment</option>
            <?php
            foreach ($_SESSION['listOfEquipments'] as $equipment) {
              $selected = isset($_GET['equipment']) && $_GET['equipment'] === $equipment ? 'selected' : '';
              echo "<option value='{$equipment}' {$selected}>{$equipment}</option>";
            }
            ?>
          </select>
          <br>
          <input type="submit" value="Apply Filters">
        </form>
      </div>
    </section>

    <div class="vertical-line"></div>

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
          echo '</div></div>';
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
            $isActive = isset($_GET['page']) && $_GET['page'] == $i ? 'active' : ''; // Add this line to highlight the current page
            echo "<li class='page-item {$isActive}'><a class='page-link' href='exercise_page.php?page={$i}'>{$i}</a></li>";
          }
          ?>
        </ul>
      </nav>
    </div>
  </div>
  <div style="color: white;">Current Page: <?php echo isset($_GET['page']) ? $_GET['page'] : '1'; ?></div>
</body>

</html>