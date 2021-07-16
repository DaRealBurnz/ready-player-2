<?php
$dbc = mysqli_connect('localhost', 'root', 'password', 'hackathon_testing');
if (!$dbc) exit('Could not connect');
include("verify_user_function.php");
if (!isset($_POST['submit'])) {
    header("Location: home.html");
    die();
}
$stmt = mysqli_prepare($dbc, "UPDATE users SET first_name=?, last_name=?, discord=?, interests=?, dislikes=?, comp=?, skill=? WHERE id=?");
mysqli_stmt_bind_param($stmt, 'ssssssss', $_POST['fname'], $_POST['lname'], $_POST['discord'], $_POST['interests'], $_POST['dislikes'], $_POST['comp'], $_POST['skill'], $_SESSION['user_id']);
$success = mysqli_stmt_execute($stmt);
if ($success) {
    echo "Done";
}
?>