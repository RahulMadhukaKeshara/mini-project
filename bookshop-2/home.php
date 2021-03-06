<!DOCTYPE html>
<html lang="en">
<head>
<script>
		window.history.forward();
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style_u.css">
<title>Home</title>
</head>
<body>
    <div class="bg">
        <div class="containerhome">
             <!-- Navigation Bar -->
         <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
              <img id="logo" src="image/mid-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
              Book Mart
            </a>
            <ul class="nav justify-content-end">
              <li class="nav-item">
              <?php $user_id=$_GET['user_id']; 
                echo "<a class='nav-link text-info'  href='home.php?user_id=".$user_id."'>Home</a>"
              ?>
              </li>
              <?php $user_id=$_GET['user_id']; 
                echo "<a class='nav-link text-white'  href='library_cus.php?user_id=".$user_id."'>Books</a>"
              ?>
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

          <div class="text-center" class="d-flex justify-content-center">
            <img id="logo" src="image/mid-logo.png" width="200" height="200" class="d-inline-block align-top" alt="">
            <h1 id="header">Book Mart</h1>
          </div>  
            <div id="body">
                <p id="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
            </div>
        
          
        </div> 
       
        
    </div>
    <div id="footer">
      <div class="container-fluid" id="foot">
        <div class="row">
          <div class="col text-center justify-content-center">
            <h3 style="font-family: 'Lobster', cursive;
            ">Book Mart</h3>
            <p>Follow Us On</p>
            <i class='fab fa-facebook-square' style='font-size:24px'></i>
            <i class='fab fa-twitter-square' style='font-size:24px'></i>
            <i class='fab fa-google-plus-square' style='font-size:24px'></i>
          </div>

          <div class="col">
            <div class="d-flex justify-content-center"><i class='fas fa-map-marked-alt mx-3' style='font-size:24px'></i>
              <p> 1/50 castle road, Borella</p></div>  
              <div class="d-flex justify-content-center"><i class='fas fa-phone-alt mx-3' style='font-size:24px'></i>
                <p>Tele : (+94) 11 2588886</p></div>  
                <div class="d-flex justify-content-center"><i class='fas fa-print mx-3' style='font-size:24px'></i>
                  <p>Fax : (+94) 11 2558886</p></div>   
              </div> 
            </div>   
            </div>
        </div>
    </div>

    
        
        



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>