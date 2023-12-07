<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/exercise_page_design.css" />
</head>

<body style="background-color: rgb(171, 85, 85)">
  <nav>
    <!-- Your navigation bar here -->
  </nav>

  <section>
    <div class="exercise-details">
      <?php
      // Retrieve exercise list from DataStorage and display details
      require_once 'apis/connections/exerciseDB/exercises.php';
      //require_once 'test.php';
      echo "Hello";

      $exercises = $_SESSION['listOfExercises'];
      foreach ($exercises as $exercise) {
        echo "<h2>{$exercise->name}</h2>";
        echo "<p>Body Part: {$exercise->bodyPart}</p>";
        echo "<p>Equipment: {$exercise->equipment}</p>";
        echo "<img src='{$exercise->gifUrl}' alt='{$exercise->name}' />";
        // Add more properties as needed
        echo "</div>";
      }

      foreach ($_SESSION['test'] as $item) {
        echo $item;
        echo "<br>";
      }
      ?>
    </div>
  </section>
</body>

</html>