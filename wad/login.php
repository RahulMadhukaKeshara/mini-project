<!DOCTYPE html>
<html>
<head>
	<title>User Login and Registraion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<style type="text/css">
		
		body{

			background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url(photo/image.jpg);
			background-size: cover;
	
		}
		
	</style>
</head>
<body>

	<div class="container">
		<div class="login-box">
		<div class="row">

			<div class="col-md-12 login">

				<h2>Login Here</h2>

				<form action="#" method="POST">
					<div class="form-group">
						<label>User Name :</label>
						<input type="text" name="user" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Passsword :</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary" name="login"> Login </button>
					<p class="logandcreate">
					Not yet a member ?<a href="registration.php">Sign Up</a>
					</p>					
				</form>

			</div>
			
		</div>
		</div>
	</div>
</body>
</html>