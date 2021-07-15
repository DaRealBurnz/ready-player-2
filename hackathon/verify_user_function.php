<?php
session_start();
if (!isset($_SESSION['user_id'])){
    echo "Not logged in! Redirecting...";
    header("Refresh:5; URL=login_page.php"); //Place login redirectory file if user_id does not exist
}
?>