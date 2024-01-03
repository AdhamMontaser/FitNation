<!DOCTYPE html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    include('DB/config.php');

    // Select all data from the score_board table
    $query = "SELECT * FROM score_board";
    $result = mysqli_query($connection, $query);

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

    mysqli_close($connection);
    ?>

</body>