<?php
	require_once "configure.php";

		$id=$_GET['user_id'];	
		$sql="SELECT user_id,username,email,phone,address,reg_time FROM users WHERE user_id=?";

		if($stmt=mysqli_prepare($con,$sql)){
			mysqli_stmt_bind_param($stmt,'i',$id);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);

			if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				echo 'USER ID:'.$row['user_id'].'<br>';
				echo 'USER EMAIL:'.$row['email'].'<br>';
				echo 'Username:'.$row['username'].'<br>';
				echo 'Mobile NO:'.$row['phone'].'<br>';
				echo 'Password:'.$row['address'].'<br>';
				echo 'Registered time:'.$row['reg_time'].'<br>';
			}
		}
		echo"<a href=logout.php>Click here to log out..</a>";


		/*
		// Processing form data when form is submitted
if(isset($_POST["item_id"]) && !empty($_POST["item_id"]))
{
  //get hidden iput value
  $user_id=$_GET['user_id'];

  if(empty(trim($_POST["email"]))){
    $email_err = "Please enter a email.";
  } else{
    $email = trim($_POST["email"]);
  }

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

  // Validate phone
  if(empty(trim($_POST["phone"]))){
      $mobile_err = "Please enter a phone number.";     
  } else{
      $mobile = trim($_POST["phone"]);
  }

  //validate pic
  if(isset($_POST['submit']) && isset($_FILES["image"]) ){
    $picture=$_FILES['image']['name'];
    $temfile=$_FILES['image']['tmp_name'];
    $target="uploadedimages/".basename($_FILES['image']['name']);

    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        $picture_msg= "Success";
    }else{
        $picture_msg="ERROR";
    }        
  } else{
      echo "Error";
  }

  if(empty($email_err) && empty($username_err) && empty($address_err) && empty($mobile_err) && empty($password_err) && empty($confirm_password_err)){
    $sql="UPDATE users SET username	email	password	phone	address	picture WHERE user_id	=?";
       
    if($stmt = mysqli_prepare($connection, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssi", $param_username,	$param_email, $param_phone,	$param_address,	$param_picture, $param_user_id);
      
      // Set parameters
      $param_username = $username;
      $param_email=$email;
      $param_phone=$phone;
      $param_address=$address;
      $param_picture =  $picture;
      $param_user_id = $user_id;
      
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Records updated successfully. Redirect to landing page
          header("location: user.php?user_id=".$user_id);
          exit();
      } else{
          echo "Something went wrong. Please try again later.";
      }

    // Close statement
    mysqli_stmt_close($stmt);
  }
   
  // Close statement
  mysqli_stmt_close($stmt);
  }
}
else
{
		*/
?>