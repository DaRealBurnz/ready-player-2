<?php
$dbc = mysqli_connect('localhost', 'root', 'password', 'hackathon_testing');
include('verify_user_function.php');
if (!$dbc) exit('Could not connect');

$id = $_SESSION['user_id'];
$game = $_POST['game'];
$comp = $_POST['comp'];

$matches = array();
if (!$dbc) exit('Could not connect');
if ($comp == -1) {
    $stmt = mysqli_prepare($dbc, "SELECT * FROM users WHERE games LIKE '%$game%' AND NOT id=$id");
} else {
    $stmt = mysqli_prepare($dbc, "SELECT * FROM users WHERE games LIKE '%$game%' AND NOT id=$id AND comp=$comp");
}
mysqli_stmt_execute($stmt);
$results = mysqli_stmt_get_result($stmt);
echo '<tr>
    <td>Name</td>
    <td>Games</td>
    <td>Interests</td>
    <td>Dislikes</td>
    <td>Discord Tag</td>
    </tr>';
while ($row = mysqli_fetch_assoc($results)) {
    echo '<tr>
    <td>'.$row['first_name'].'</td>
    <td>'.$row['games'].'</td>
    <td>'.$row['interests'].'</td>
    <td>'.$row['dislikes'].'</td>
    <td>'.$row['discord'].'</td>
    </tr>';
}
?>