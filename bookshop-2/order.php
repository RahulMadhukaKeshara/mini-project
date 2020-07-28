<?php
  session_start();
  require_once "configure.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/library_cus.css">
<title>Book Library</title>
</head>
<body>
      <!-- Navigation Bar -->
      <nav class="navbar navbar-dark bg-dark ">
        <a class="navbar-brand" href="#">
          <img id="logo" src="image/mid-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Book Mart
        </a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
              <?php $user_id=$_GET['user_id']; 
                echo "<a class='nav-link text-white'  href='home.php?user_id=".$user_id."'>Home</a>"
              ?>
          </li>
          <li class="nav-item">
              <?php $user_id=$_GET['user_id']; 
                echo "<a class='nav-link text-white'  href='library_cus.php?user_id=".$user_id."'>Library</a>"
              ?>
          </li>
          <li class="nav-item">
                <?php $user_id=$_GET['user_id']; 
                echo "<a class='nav-link text-white'  href='account.php?user_id=".$user_id."'>Account</a>"
                ?>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">Logout</a>
          </li>
        </ul>
       </nav>
       <!--Nav-bar end-->

       <!--Heading-->
       <h1 class="text-center" id="Topic">Available Books</h1>
       <!--Heading End-->

       <!--Products-->
       <!--First Row-->
       <div class="d-flex justify-content-around">
       <div class="row text-center">
       <?php
				$query = "SELECT * FROM books ";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
			 ?>
        <div class="col-4">
           <div class="card" style="width: 18rem;">
             <img src="uploadedimages/<?php echo $row["picture"]; ?>" alt="Card image cap" style="max-width: 50%; max-height:100%">
             <div class="card-body">
               <ul>
                 <li><?php echo $row['book_name'] ?></li>
               </ul>
             </div>
            </div>
          </div>
      <?php
					}
				}
			?>
       </div>
       </div>
       <!--First Row End-->

      

       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>