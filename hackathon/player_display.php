<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      crossorigin="anonymous"
    />
    <title>Profile</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Navigation Bar Colour-->
        <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbar"
      >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <div class="navbar-nav">
                <a class="nav-item nav-link" id="signup" href="match.html">Find a match</a>
                <a class="nav-item nav-link" id="signup" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>


    <div class="container">
    </div>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>

    <script
      type="text/javascript"
      src="{{ url_for('static', filename='index.js') }}"
    ></script>
</body>

<head>
  <title>Enter your details</title>
  <meta charset="utf-8" />
  <!-- other meta, CSS, and custom tags -->
  <link rel="stylesheet" href="player_display.css">
</head>
 
<body>
<?php
$dbc = mysqli_connect( 'localhost', 'root', 'password', 'hackathon_testing' );//need to put database name here
?>
  <main>
<?php
if (!$dbc) echo "<p>Database not found</p>";
include("verify_user_function.php");
$specifyData = "SELECT id, first_name, last_name, email, discord, games, interests, dislikes, comp, skill FROM users WHERE id=".$_SESSION['user_id'];//change DB to your database
//I took out password cuz we dont want to show that 
$databaseResults = mysqli_query($dbc,$specifyData);
/////////////////////////////////////In TABLE FORMAT//////////////////////////////////////////////////////////////
 /* 
echo '<table>
 <tr>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>discord</th>
 <th>games</th>
 <th>Interests</th>
 <th>Dislikes</th>
 <th>Casual or Competitive gamer</th>
 <th>Skill level</th>
 </tr>';
 while( $row = mysqli_fetch_assoc( $databaseResults ) ) { //please change the ID to suit your database
  echo '<tr>
  <td>'.$row['id'].'</td>
  <td>'.$row['first_name'].'</td>
  <td>'.$row['last_name'].'</td>
  <td>'.$row['email'].'</td>
  <td>'.$row['password'].'</td>
  <td>'.$row['discord'].'</td>
  <td>'.$row['games'].'</td>
  <td>'.$row['interests'].'</td>
  <td>'.$row['dislikes'].'</td>
  <td>'.$row['comp'].'</td>
  <td>'.$row['skill'].'</td>
 <tr>';
  }
echo '</table>';
*/
?>

  </main>


<h1>Player Information</h1>
<?php
//NB. chage all the 'ID' inside the $row to match the ID of each heading
  $usrInfo = mysqli_fetch_assoc($databaseResults);
  echo '<h2> First Name: </h2>';
  echo '<p>'.$usrInfo['first_name'].'</p><br>';
  echo '<h2> Last Name: </h2>';
  echo '<p>'.$usrInfo['last_name'].'</p><br>';
  echo '<h2> Email: </h2>';
  echo '<p>'.$usrInfo['email'].'</p><br>';
  echo '<h2> Discord: </h2>';
  echo '<p>'.$usrInfo['discord'].'</p><br>';
  echo '<h2> Games: </h2>';
  echo '<p>'.$usrInfo['games'].'</p><br>';
  echo '<h2> Interests: </h2>';
  echo '<p>'.$usrInfo['interests'].'</p><br>';
  echo '<h2> Dislikes: </h2>';
  echo '<p>'.$usrInfo['dislikes'].'</p><br>';
  echo '<h2> Casual or Competitive: </h2>';
  if ($usrInfo['comp'] == 1) {
    echo '<p>Competitive</p><br>';
  } elseif ($usrInfo['comp'] == 0) {
    echo '<p>Casual</p><br>';
  } else {
    echo '<p>Not Set</p><br>';
  }
  echo '<h2> Skill level: </h2>';
  switch ($usrInfo['skill']) {
    case 0:
      echo '<p>Beginner</p><br>';
      break;
    case 1:
      echo '<p>Novice</p><br>';
      break;
    case 2:
      echo '<p>Intermediate</p><br>';
      break;
    case 3:
      echo '<p>Cracked</p><br>';
      break;
    default:
      echo '<p>Not Set</p><br>';
  }


?>
 <a href="match.html"> <!-- Change your button location here-->
 <button>Find a match</button>
</a>
  <footer>Site Footer</footer>
  <!-- load JS here so it doesn't block the rendering of the page -->

<?php
mysqli_close($dbc)
?>
</body>
</html> 