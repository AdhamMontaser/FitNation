<?php
include('../config.php');
$results = [];

if (isset($_POST['search'], $_POST['search_term'], $_POST['search_by'])) {
    $search_term = $_POST['search_term'];
    $search_by = $_POST['search_by'];

    $sql = "SELECT * FROM admin WHERE ";
    
    if ($search_by === 'ID') {
        $sql .= "ID LIKE '%$search_term%'";
    } elseif ($search_by === 'name') {
        $sql .= "Username LIKE '%$search_term%'";
    }

    $result = $con->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}

$con->close();
?>
S

<!DOCTYPE html>
<html>
<head>
    <title>Admin Search</title>
    <style>
        body {
            background: radial-gradient(circle, gray, black);
            background-size: cover;
            color: white;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        div {
            width: 50%;
            height: 350px;
            padding: 3%;
            margin: auto;
        }

        input {
            color: white;
            background-color: transparent;
            border: 1px solid #ccc;
            padding: 1%;
            width: 100%;
            box-sizing: border-box;
        }

        select, button {
            margin-top: 1.5%;
            background-color: darkred;
            border: none;
            padding: 1.5%;
            color: white;
            font-family: Georgia, Times, "Times New Roman", serif;
            font-size: 12px;
            cursor: pointer;
            width: 100%;
            border: 3px solid gray;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            color: white;
            background-color: transparent;
            padding: 1%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div>
        <h2>Search for Admin</h2>
        <form method="post">
            <input type="text" name="search_term" required placeholder="Enter search term">
            <select name="search_by" required>
                <option value="ID">ID</option>
                <option value="name">Name</option>
            </select>
            <button type="submit" name="search">Search</button>
        </form>

        <?php if (!empty($results)): ?>
            <h3>Search Results:</h3>
            <table>
                <tr>
                <th>ID</th>
                <th>Username</th>
                <th>First_Name</th>
                <th>Second_Name</th
                ><th>Phone_Number</th>
                <th>Email</th>
                </tr>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['Username']; ?></td>
                        <td><?php echo $row['First_Name']; ?></td>
                        <td><?php echo $row['Second_Name']; ?></td>
                        <td><?php echo $row['Phone_Number']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php elseif (isset($_POST['search'])): ?>
            <p>No admins found with the given search term.</p>
        <?php endif; ?>
    </div>
</body>
</html>
