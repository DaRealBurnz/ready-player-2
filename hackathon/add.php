<?php
$dbc = mysqli_connect('localhost', 'root', 'password', 'hackathon_testing');
//if (!$dbc) exit('Could not connect');
$errors = array();
if (empty($_POST['fname'])) {
    array_push($errors, '0');
}
if (empty($_POST['lname'])) {
    array_push($errors, '1');
}
if (empty($_POST['email'])) {
    array_push($errors, '2');
}
if (empty($_POST['discord'])) {
    array_push($errors, '3');
}
if (empty($_POST['password'])) {
    array_push($errors, '4');
}
if (empty($errors)) {
    $stmt = mysqli_prepare($dbc, "INSERT INTO users (`first_name`, `last_name`, `email`, `discord`, `password`) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssss', $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['discord'], $_POST['password']);
    $success = mysqli_stmt_execute($stmt);
    /*if ($success) {
        echo "yes";
    } else {
        echo "no";
    }
    echo gettype($_POST['discord']);*/
    echo "Done";
} else {
    foreach ($errors as $value) {
        echo "$value,";
    }
}
?>