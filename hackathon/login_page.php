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