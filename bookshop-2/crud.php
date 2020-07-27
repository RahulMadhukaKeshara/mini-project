<?php
require_once "configure.php";
require_once "component.php";
require_once "operations.php";

$book_id=$bookname= $publisher=$isbn=$genre=$author=$copies=$price="";
if(!empty($_GET['book_id'])){
  $book_id=$_GET['book_id'];
}
if(!empty($_GET['bookname'])){
  $bookname=$_GET['bookname'];
}
if(!empty($_GET['publisher'])){
  $publisher=$_GET['publisher'];
}
if(!empty($_GET['isbn'])){
  $isbn=$_GET['isbn'];
}
if(!empty($_GET['genre'])){
  $genre=$_GET['genre'];
}
if(!empty($_GET['author'])){
  $author=$_GET['author'];
}
if(!empty($_GET['copies'])){
  $copies=$_GET['copies'];
}
if(!empty($_GET['price'])){
  $price=$_GET['price'];
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
<link rel="stylesheet" href="css/crudstyle.css">

<title>Admin | Library</title>

</head>
<body style="background-color: #ECF0F1">

    <!-- Navigation Bar -->
      <nav class="navbar navbar-dark bg-dark" id="navigate" style="margin:1%; border-radius: 10px;">
        <a class="navbar-brand" href="#">
          <img id="logo" src="image/mid-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Book Mart
        </a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
          <a class='nav-link text-white'  href='admin.php'>Home</a>
          </li>
          <li class="nav-item">
          <a class='nav-link text-white'  href='crud.php'>Library</a>
          </li>
          <li class="nav-item">
          <a class='nav-link text-white'  href='customer.php'>Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">Logout</a>
          </li>
        </ul>
      </nav>
      <div class="d-flex justify-content-around">


      <main>
        <div class="container text-center" id="contain">
          <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-75">
              <div class="py-2">
                  <?php inputId("hidden","<i class='fas fa-id-badge'></i>","ID", "book_id",  $book_id);  ?>
              </div>
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-book'></i>","Book Name", "book_name",$bookname); ?>
              </div>
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher", "book_publisher", $publisher); ?>
              </div>
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-barcode'></i>","ISBN", "book_isbn",$isbn); ?>
              </div>
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-dna'></i>","Genre", "book_genre", $genre); ?>
              </div>
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-user-tie'></i>","Author", "book_author",$author); ?>
              </div>
              <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-copy'></i>","No of Copies", "book_copies", $copies); ?>
                    </div>
                    <div class="col">
                       <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price", "book_price",$price); ?>
                    </div>
              </div>
              <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        
                </div>
            </form>
          </div>

        </div>

        <!-- Bootstrap table  -->
        
          <div class="d-flex table-data" id="tableContent">
            <?php
                   //display data
                  if(isset($_POST['read']))
                  {// Include config file
                          require_once "configure.php";
                            
                          // Attempt select query execution
                          $sql = "SELECT * FROM books";
                          if($result = mysqli_query($con, $sql))
                          {
                              if(mysqli_num_rows($result) > 0)
                              {
                                  echo "<table class='table table-striped table-dark text-center'>";
                                      echo "<thead  class='thead-dark'>";
                                          echo "<tr>";
                                          echo "<th>ID</th>";
                                          echo"<th>Book Name</th>";
                                          echo"<th>Publisher</th>";
                                          echo"<th>ISBN</th>";
                                          echo"<th>Genere</th>";
                                          echo"<th>Author</th>";
                                          echo"<th>No of Copies</th>";
                                          echo"<th>Book Price</th>";
                                          echo"<th>Edit</th>";
                                          echo "</tr>";
                                      echo "</thead>";
                                      echo "<tbody class='tbody'>";
                                      while($row = mysqli_fetch_array($result))
                                      {
                                          echo "<tr>";
                                          echo "<td>".$row['book_id']."</td>";
                                          echo "<td>".$row['book_name']."</td>";
                                          echo "<td>".$row['publisher']."</td>";
                                          echo "<td>".$row['isbn_no']."</td>";
                                          echo "<td>".$row['genre']."</td>";
                                          echo "<td>".$row['author']."</td>";
                                          echo "<td>".$row['copies']."</td>";
                                          echo "<td>".$row['price']."</td>";
                                          //echo "<td><i class='fas fa-edit btnedit'></i></td>";
                                          echo "<td>";
                                          echo "<a href='operations.php?item_id=". $row['book_id'] ."' title='Update Record' data-toggle='tooltip'><i class='fas fa-edit btnedit'></i></a>";  
                                          echo "</td>";
                                          echo "</tr>";
                                      }
                                      echo "</tbody>";                            
                                  echo "</table>";
                                  // Free result set
                                  mysqli_free_result($result);
                              } else{
                                  ///echo "<p class='lead'><em>No records were found.</em></p>";
                              }
                          } else{
                              echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                          }

                          // Close connection
                          mysqli_close($con);
                  }
            ?>  
          </div>
        


      </main>
</body>
</html>
