<?php

require_once ("../crud/php/component.php");

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
<link rel="stylesheet" href="crudstyle.css">

<title>Admin | Library</title>

</head>
<body style="background-color: #ECF0F1">

    <!-- Navigation Bar -->
      <nav class="navbar navbar-dark bg-dark" id="navigate" style="margin:1%; border-radius: 10px;">
        <a class="navbar-brand" href="#">
          <img id="logo" src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Book Mart
        </a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="crud.php">Library</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="#">Logout</a>
          </li>
        </ul>
      </nav>
      <div class="d-flex justify-content-around">


      <main>
        <div class="container text-center" id="contain">
          <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-75">
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "book_id",""); ?>
              </div>
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-book'></i>","Book Name", "book_name",""); ?>
              </div>
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher", "book_publisher",""); ?>
              </div>
              <div class="py-2">
                  <?php inputElement("<i class='fas fa-barcode'></i>","ISBN", "book_ISBN",""); ?>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-warning"><i class="fas fa-dna"></i></i></span>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Genere</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>

              <div class="py-2">
                  <?php inputElement("<i class='fas fa-user-tie'></i>","Author", "book_author",""); ?>
              </div>
              <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-copy'></i>","No of Copies", "book_copies",""); ?>
                    </div>
                    <div class="col">
                       <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price", "book_price",""); ?>
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
            <table class="table table-striped table-dark text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>ISBN</th>
                        <th>Genere</th>
                        <th>Author</th>
                        <th>No of Copies</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody class="tbody">

                  <tr>
                    <td>1</td>
                    <td>Book Name</td>
                    <td>RahulCreations</td>
                    <td>123456789</td>
                    <td>action</td>
                    <td>lakshan</td>
                    <td>10</td>
                    <td>45.00</td>
                    <td><i class="fas fa-edit btnedit"></i></td>
                  </tr>
                  
                </tbody>
            </table>
          </div>
        


      </main>
</body>
</html>