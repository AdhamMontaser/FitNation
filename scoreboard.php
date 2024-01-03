<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 50%;
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
            font-size: 3vh;
        }

        th {
            background-color: #343A40;
            color: white;
            font-size: 4vh;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            /* Add space above the heading */
        }
        h1{
            align-items: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include('DB/config.php');

    // Select all data from the score_board table and order by Score in descending order
    $query = "SELECT * FROM score_board ORDER BY score DESC";
    $result = mysqli_query($con, $query);

    echo "<h1>Push Up challenge</h1>";

    if (mysqli_num_rows($result) > 0) {
        // Output data in a table
        echo "<table border='1'>";
        echo "<tr><th>Username</th><th>Score</th></tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["Username"] . "</td><td>" . $row["score"] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    mysqli_close($con);
    ?>
</body>

</html>
