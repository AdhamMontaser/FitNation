<?php
include ('../config.php');
$user = mysqli_query ($con, 'Select * from user');
echo '<table border=1>';
echo '<tr><th>ID</th><th>Username</th><th>First_Name</th><th>Second_Name</th><th>Phone_Number</th><th>Email</th></tr>';
while ($res = mysqli_fetch_array ($user))
{
    echo '<tr>';
    echo '<td>'.$res['ID'].'</td>';
    echo '<td>'.$res['Username'].'</td>';
    echo '<td>'.$res['First_Name'].'</td>';
    echo '<td>'.$res['Second_Name'].'</td>';
    echo '<td>'.$res['Phone_Number'].'</td>';
    echo '<td>'.$res['Email'].'</td>';
    echo '</tr>';
}
echo '</table>';
?>