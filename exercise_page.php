<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/exercise_page_design.css" />
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
  ?>

</head>

<body style="background-color: rgb(171, 85, 85)">
  <nav>
    <!-- Your navigation bar here -->
  </nav>

  <section>
    <div class="filters">
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

        <input type="submit" value="Apply Filters">
      </form>
    </div>

    <div class="exercise-grid">
      <div class="exercise-row">
        <?php
        $count = 0;
        foreach ($filteredExercises as $exercise) {
          if ($count % 3 === 0 && $count !== 0) {
            echo "</div><div class='exercise-row'>";
          }
          echo "<div class='exercise-container'>";
          echo "<h2>{$exercise->name}</h2>";
          echo "<p>Body Part: {$exercise->bodyPart}</p>";
          echo "<p>Equipment: {$exercise->equipment}</p>";
          echo "<img src='{$exercise->gifUrl}' alt='{$exercise->name}' />";
          // Add more properties as needed
          echo "</div>";
          $count++;
        }
        ?>
      </div>
    </div>
  </section>
</body>

</html>