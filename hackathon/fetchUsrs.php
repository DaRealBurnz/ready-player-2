<?php
$dbc = mysqli_connect('localhost', 'root', 'password', 'hackathon_testing');
if (!$dbc) exit('Could not connect');

$stmt = "SELECT id, first_name, last_name FROM users";
$results = mysqli_query($dbc, $stmt);

echo '<option value="">Select a User:</option>';
while ($row = mysqli_fetch_assoc($results)) {
    echo '<option value="'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
}
?>