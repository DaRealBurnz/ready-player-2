<!DOCTYPE html>
<html lang="en">
<head>
  <title>Enter your details</title>
  <meta charset="utf-8" />
  <!-- other meta, CSS, and custom tags -->
  <link rel="stylesheet" href="player_display.css">
</head>
 
<body>
<?php
$dbc = mysqli_connect( 'localhost', 'root', 'root', 'databaseName' );//need to put database name here
?>
  <main>
<?php
if (!$dbc) echo "<p>Database not found</p>";
$specifyData = 'SELECT id, first_name, last_name, email, password, discord, games, interests, dislikes, comp, skill, path FROM DB';//change DB to your database
$databaseResults = mysqli_query($dbc,$specifyData);

?>
  </main>


  <header>Player information</header>   

    <h1>Tell us a bit about yourself</h1>
    <form method="POST" action="">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname"><br><br>
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname"><br><br>
        <input type="submit" value="Submit">
    </form>
 
 
  <footer>Site Footer</footer>
  <!-- load JS here so it doesn't block the rendering of the page -->

<?php
mysqli_close($dbc)
?>
</body>
</html> 