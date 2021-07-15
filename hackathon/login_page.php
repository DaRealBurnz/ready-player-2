<?php 
$dbc = mysqli_connect('localhost', 'root', 'password', 'hackathon_testing');
session_start();

	include("verify_user_function.php");
	$badInput = false;


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($dbc, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			$badInput = true;
		}else
		{
			$badInput = true;
		}
	}

?>


<!DOCTYPE html>
<html>
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
    <title>Home</title>
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
				<a class="nav-item nav-link" id="home" href="/hackathon/home.html">Home</a>
                <a class="nav-item nav-link" id="signup" href="/hackathon/signup.html">Sign Up</a>
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
	<title>Login</title>
	<link href="styles/style.css" rel="stylesheet">
</head>
<body>		
	<form method="post" action="login_page.php" class="form">
		<h1>Login</h1>
		<table class="formTable">
			<tbody>
				<tr>
					<td><label>Email: </label></td>
					<td><input class="textInput" type="text" name="email"></td>
				</tr>
				<tr>
					<td><label>Password: </label></td>
					<td><input class="textInput" type="password" name="password"></td>
				</tr>
				<tr>
					<td><input id="button" type="submit" value="Login"></td>
					<td style="color:red;"><?php if ($badInput) {echo "Incorrect Email or Password!";} ?></td>
				</tr>
				<tr>
					<td><a href="signup.html">Click to Signup</a></td>
			</tbody>
		</table>
	</form>
</body>
</html>