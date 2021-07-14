<?php
$dbc = mysqli_connect('localhost', 'root', 'password', 'hackathon_testing');
if (!$dbc) exit('Could not connect');

if (isset($_GET['q'])) {
    $stmt = mysqli_prepare($dbc, "SELECT * FROM users WHERE id=?");
    mysqli_stmt_bind_param($stmt, 's', $_GET['q']);
} else {
    $stmt = mysqli_prepare($dbc, "SELECT * FROM users");
}
mysqli_stmt_execute($stmt);
$results = mysqli_stmt_get_result($stmt);

echo '<tr>
    <td>ID</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Games</td>
    <td>Interests</td>
    <td>Dislikes</td>
    <td>Comp?</td>
    <td>Skill Level</td>
    </tr>';
while ($row = mysqli_fetch_assoc($results)) {
    echo '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['first_name'].'</td>
        <td>'.$row['last_name'].'</td>
        <td>'.$row['games'].'</td>
        <td>'.$row['interests'].'</td>
        <td>'.$row['dislikes'].'</td>
        <td>'.$row['comp'].'</td>
        <td>'.$row['skill'].'</td>
      </tr>';
}
?>