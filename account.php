<?php
//include configure file  
require_once "configure.php";
  
// Define variables and initialize with empty values
$email = $username = $address = $phone = $picture = "";
$email_err =$username_err =$address_err = $phone_err = $picture_msg = "";

// Processing form data when form is submitted
if(isset($_POST["user_id"]) && !empty($_POST["user_id"]))
{
  //get hidden iput value
  $user_id=$_POST['user_id'];

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
      $phone_err = "Please enter a phone number.";     
  } else{
      $phone = trim($_POST["phone"]);
  }

  //validate pic
  if(isset($_POST['submit']) && isset($_FILES["image"]) )
  {
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

  if(empty($email_err) && empty($username_err) && empty($address_err) && empty($phone_err) ){
    $sql="UPDATE users SET username=?, email=?,phone=?,address=?,picture=? WHERE user_id=?";
       
    if($stmt = mysqli_prepare($con, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssi", $param_username,	$param_email, $param_phone,	$param_address,	$param_picture, $param_user_id);
      
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
          header("location: home.php?user_id=".$user_id);
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
	// Check existence of user_id parameter before processing further

    // Get URL parameter
    $user_id = trim($_GET["user_id"]);
    
    // Prepare a select statement
    $sql="SELECT user_id,username,email,phone,address,picture FROM users WHERE user_id=?";

    if($stmt=mysqli_prepare($con,$sql))
    {
			mysqli_stmt_bind_param($stmt,'i',$user_id);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);

			if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$user_id=$row['user_id'];
				$email=$row['email'];
				$username=$row['username'];
				$phone=$row['phone'];
				$address=$row['address'];
				$picture=$row['picture'];
			}
    }
    else
    {
      // URL doesn't contain valitem_id item_id. Redirect to error page
      header("location: error.php");
      exit();
    }
            

    
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($con);

}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style_u.css">
<title>Customer | Account</title>
</head>
<body>
     <!-- Navigation Bar -->
     <nav class="navbar navbar-dark bg-dark ">
        <a class="navbar-brand" href="#">
          <img id="logo" src="Image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Book Mart
        </a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo "home.php?user_id=".$user_id?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">My purchase</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">Logout</a>
          </li>
        </ul>
      </nav>
      <div class="d-flex justify-content-around">

        
        

        <!--form-->
        <div class="container">
          <h1 class="head text-center text-primary">My Account</h1>
          <div class="row">
            <div class="col shadow  bg-white" id="left">
            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST" enctype="multipart/form-data">
                <label>Email</label>
                <div class="form-group">
                  <input type="text" name="email" class="form-control" id="formGroupExampleInput" value="<?php echo $email;  ?>">
                </div>
                <label>Username</label>
                <div class="form-group">
                  <input type="text" name="username" class="form-control" id="formGroupExampleInput2" value="<?php echo $username; ?>">
                </div>
                <label>Address</label>
                <div class="form-group">
                  <input type="text" name="address" class="form-control" id="formGroupExampleInput2" value="<?php echo $address; ?>">
                </div>
                <label>Phone number</label>
                <div class="form-group">
                  <input type="text" name="phone" class="form-control" id="formGroupExampleInput2" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="col shadow bg-white" id="right">
              <div class="row py-4">
                <div class="col-lg-6 mx-auto">
                  <div class="text-center text-primary"><label class="text-center">Profile picture</label></div>
            
                    <!-- Upload image input-->
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                        <input id="upload" type="file" name="image" onchange="readURL(this);" class="form-control border-0">
                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                        </div>
                    </div>
        
                    <!-- Uploaded image area-->
                    <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
        
                </div>
            </div>
            <!--SaveButton-->
            <div class="text-center mx-5">
              <input type="hidden" name="user_id" class="form-control" id="formGroupExampleInput2" value="<?php echo $user_id; ?>" >
              <Input type="submit" class="btn btn-primary btn-lg mb-2 btn-block" value="Save">
            </div>
            <!--Cancel-->
            <div class="text-center"><a id="cancel" href="<?php echo "home.php?user_id=".$user_id?>">Cancel</a></div>
            </div>
            </form>
          </div>
         
          

      
        

        

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!--<script src="scriptcust.js"></script>-->
</body>
</html>