<!DOCTYPE html>
<html>

<head>
    <title>User Table</title>
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
    $user = mysqli_query($con, 'Select * from user');
    echo '<table>';
    echo '<tr><th>ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Email</th></tr>';
    while ($res = mysqli_fetch_array($user)) {
        echo '<tr>';
        echo '<td>' . $res['ID'] . '</td>';
        echo '<td>' . $res['Username'] . '</td>';
        echo '<td>' . $res['First_Name'] . '</td>';
        echo '<td>' . $res['Last_Name'] . '</td>';
        echo '<td>' . $res['Phone_Number'] . '</td>';
        echo '<td>' . $res['Email'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>

</html>