<?php
session_start();
// Include configure file
require_once "configure.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	// Now we check if the data from the login form was submitted, isset() will check if the data exists.
	if ( !isset($_POST['email'], $_POST['password']) ) {
		// Could not get the data that should have been sent.
		exit('Please fill both the email and password fields!');
	}

	$email=$_POST['email'];
	$password=$_POST['password'];
	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
	$sql="SELECT user_id, password FROM users WHERE email = ?";
	if ($stmt=mysqli_prepare($con,$sql)) {
		// Bind parameters 
		mysqli_stmt_bind_param($stmt,'s', $email);
		//execute the statement
		mysqli_stmt_execute($stmt);
		// Store the result so we can check if the account exists in the database.
		mysqli_stmt_store_result($stmt);

		if (mysqli_stmt_num_rows($stmt) > 0) {
			mysqli_stmt_bind_result($stmt,$user_id, $hashedpassword);
			mysqli_stmt_fetch($stmt);
			// Account exists, now we verify the password.
			if (password_verify($_POST['password'], $hashedpassword)) {
				// Verification success! User has loggedin!
				// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['user_id'] = $user_id;
				echo 'Welcome ' . $_SESSION['name'] . '!';
				header("location: welcome.php?user_id=".$user_id);
			} else {
				$password_err= 'Incorrect password!';
			}
		} else {
			$email_err= 'Incorrect email!';
		}

		mysqli_stmt_close($stmt);
	}

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>User Login and Registraion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">
		
		body{

			background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url(images/image.jpg);
			background-size: cover;
	
		}

		.help-block{
			color: red;
		}

	</style>
</head>
<body>

	<div class="container">
		<div class="login-box">
		<div class="row">

			<div class="col-md-12 login">

				<h2>Login Here</h2>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
					<div class="form-group">
						<label>User Name :</label>
						<input type="email" name="email" class="form-control" value="<?php echo $email;?>">
						<span class="help-block"><?php echo $email_err; ?></span>
					</div>
					<div class="form-group">
						<label>Password :</label>
						<input type="password" name="password" class="form-control" value="<?php echo $password;?>">
						<span class="help-block"><?php echo $password_err; ?></span>
					</div>
					<button type="submit" class="btn btn-primary"> Login </button>
					<p class="signup">
					Not yet a member ?<a href="registration.php">Sign In</a>
					</p>					
				</form>

			</div>
			
		</div>
		</div>
	</div>
</body>
</html>