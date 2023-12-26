<?php
require_once 'apis/connections/foodDB/search_food.php';
function createTableRow($food)
{
    return "
    <tr>
        <td>{$food->name}</td>
        <td>{$food->caloric}</td>
        <td>{$food->fat}</td>
        <td>{$food->carbon}</td>
        <td>{$food->protein}</td>
    </tr>
    ";
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['foodName'])) {
    $foodName = $_GET['foodName'];
    $foodList = getFood($foodName);
} else {
    $foodList = getFood("chicken");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Recipe Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Add any necessary styling here -->
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            /* Center the table horizontally and add space around it */
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #343A40;
            text-align: left;
            text-transform: capitalize;
        }

        th {
            background-color: #343A40;
            color: white;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            /* Add space above the heading */
        }
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
                        <a class="nav-link" href="favorite_exercises_page.php">Favorites</a>
                    </li>
                </ul>

                <!-- Search input in navbar -->
                <form class="form-inline my-2 my-lg-0" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="foodName">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <h2>Recipe Table</h2>

    <table border='1'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Calorie</th>
                <th>Fats</th>
                <th>Carbs</th>
                <th>Proteins</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through recipes and create table rows
            foreach ($foodList as $food) {
                echo createTableRow($food);
            }
            ?>
        </tbody>
    </table>

</body>

</html>