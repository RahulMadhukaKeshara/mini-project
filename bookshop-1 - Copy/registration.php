<?php
// Include configure file
require_once "configure.php";
 
// Define variables and initialize with empty values
$email = $username= $password = $confirm_password = $address= $mobile= "";
$email_err = $username_err= $password_err = $confirm_password_err = $address_err= $mobile_err= $error="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
			
			$param_email=trim($_POST["email"]);
          
            // execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                $result=mysqli_stmt_get_result($stmt);
                
                if(mysqli_num_rows($result) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                $error= "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    //$email = trim($_POST["email"]);

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";     
    } else{
        $username = trim($_POST["username"]);
    }

    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter a address.";     
    } else{
        $address = trim($_POST["address"]);
    }

    // Validate mobile
    if(empty(trim($_POST["mobile"]))){
        $mobile_err = "Please enter a mobile.";     
    } else{
        $mobile = trim($_POST["mobile"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($username_err) && empty($address_err) && empty($mobile_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, password, phone, address) VALUES (?, ?,  ?, ?, ?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $username , $email, password_hash($password, PASSWORD_DEFAULT),  $mobile, $address);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                $error= "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
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

			background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url(image/image2.jpg);
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
				<h2>Sign Up Here</h2>
				<span class="help-block"><?php echo $error; ?></span>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
					<div class="form-group">
						<label>Email :</label>
						<input type="text" name="email" class="form-control" value="<?php echo $email;?>">
						<span class="help-block"><?php echo $email_err; ?></span>
					</div>
					<div class="form-group">
						<label>User Name :</label>
						<input type="text" name="username" class="form-control" value="<?php echo $username;?>">
						<span class="help-block"><?php echo $username_err; ?></span>
					</div>
					<div class="form-group">
						<label>Mobile Number :</label>
						<input type="text" name="mobile" class="form-control" value="<?php echo $mobile;?>">
						<span class="help-block"><?php echo $mobile_err; ?></span>
					</div>
					<div class="form-group">
						<label>Address :</label>
						<input type="text" name="address" class="form-control" value="<?php echo $address;?>">
						<span class="help-block"><?php echo $address_err; ?></span>
					</div>
					<div class="form-group">
						<label>Password :</label>
						<input type="password" name="password" class="form-control" value="<?php echo $password;?>">
						<span class="help-block"><?php echo $password_err; ?></span>
					</div>
					<div class="form-group">
						<label>Re-Enter Password :</label>
						<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password;?>">
						<span class="help-block"><?php echo $confirm_password_err; ?></span>
					</div>
					<button type="submit" class="btn btn-primary" name="register"> Sign Up </button>	
					<p class="signup">
					Already Have an Account ?<a href="index.php">Log In</a>
					</p>				
				</form>
			</div>
		</div>
		</div>
	</div>
</body>
</html>