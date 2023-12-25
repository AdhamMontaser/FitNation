<?php
include ('../config.php');
$gym = mysqli_query ($con, 'Select * from gym');
echo '<table border=1>';
echo '<tr><th>ID</th><th>Gym_Name</th><th>Address</th><th>Phone_Number</th></tr>';
while ($res = mysqli_fetch_array ($gym))
{
    echo '<tr>';
    echo '<td>'.$res['ID'].'</td>';
    echo '<td>'.$res['Gym_Name'].'</td>';
    echo '<td>'.$res['Address'].'</td>';
    echo '<td>'.$res['Phone_Number'].'</td>';
    echo '</tr>';
}
echo '</table>';
?>