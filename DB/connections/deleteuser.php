<?php
include('../config.php');

$message = '';

if (isset($_POST['search'], $_POST['search_term'], $_POST['search_by'])) {
    $search_term = $_POST['search_term'];
    $search_by = $_POST['search_by'];

    $sql = "DELETE FROM user WHERE ";
    
    if ($search_by === 'ID') {
        $sql .= "ID LIKE '%$search_term%'";
    } elseif ($search_by === 'name') {
        $sql .= "username LIKE '%$search_term%'";
    }

    $result = $con->query($sql);

    if ($result !== false) {
        if ($con->affected_rows > 0) {
            $message = 'DONE';
        } else {
            $message = 'No user found with the given search term.';
        }
    } else {
        $message = 'Error executing the query: ' . $con->error;
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove Gym</title>
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
        <h2>Remove user</h2>
        <form method="post" action="">
            <input type="text" name="search_term" required placeholder="Enter search term">
            <select name="search_by" required>
                <option value="ID">ID</option>
                <option value="username">Name</option>
            </select>
            <button type="submit" name="search">delete</button>
        </form>

        <?php echo $message; ?>
    </div>
</body>
</html>
