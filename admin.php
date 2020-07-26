<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style_a.css">
    <title>Home</title>
  </head>
  <body>
    <!-- Navigation Bar -->
      <nav class="navbar navbar-dark bg-dark ">
        <a class="navbar-brand" href="#">
          <img id="logo" src="Image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Book Mart
        </a>
      </nav>
      <div class="d-flex justify-content-around">
        
      <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="image/newbook.jpg" alt="Card image cap">
          <div class="card-body  ">
            <h5 class="card-title">Book Library</h5>
            <a href="#" class="btn btn-primary col text-center">Library</a>
          </div>
        </div>
      
     
      <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="image/newcustomer.jpg" alt="Card image cap">
          <div class="card-body  ">
            <h5 class="card-title">Customer Details</h5>
            <?php $id=$_GET['user_id']; 
             echo "<a href='welcome.php?user_id=".$id."' class='btn btn-primary col text-center'>Details</a>"
            ?>
          </div>
      </div>
   
      <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="image/order.jpg" alt="Card image cap">
          <div class="card-body  ">
            <h5 class="card-title">Booking Orders</h5>
            <a href="#" class="btn btn-primary col text-center">Orders</a>
          </div>
      </div>
 
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js" type="text/javascript"></script>
  </body>
</html>