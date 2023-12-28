<?php
if (empty($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) === false) {
    // If the page is accessed directly or not from your domain, deny access
    header('HTTP/1.0 403 Forbidden');
    exit('Access denied.');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gym Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <?php
    include('../config.php');
    $gym = mysqli_query($con, 'Select * from gym');
    echo '<table>';
    echo '<tr><th>ID</th><th>Gym Name</th><th>Address</th><th>Phone Number</th></tr>';
    while ($res = mysqli_fetch_array($gym)) {
        echo '<tr>';
        echo '<td>' . $res['ID'] . '</td>';
        echo '<td>' . $res['Gym_Name'] . '</td>';
        echo '<td>' . $res['Address'] . '</td>';
        echo '<td>' . $res['Phone_Number'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>

</html>