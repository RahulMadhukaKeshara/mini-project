<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style_a.css">
<title>Admin | Customer</title>
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
                    echo "<a class='nav-link text-white'  href='admin.php?user_id=".$user_id."'>Home</a>"
                ?>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Library</a>
              </li>
              <li class="nav-item">
              <?php $user_id=$_GET['user_id']; 
                    echo "<a class='nav-link text-white'  href='customer.php?user_id=".$user_id."'>Customer</a>"
                ?>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="order.html">Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-danger" href="#">Logout</a>
              </li>
            </ul>
          </nav>

        <!--Topic-->
        <h1 class="head text-center">Customers</h1>  
        <!--Table-->
                <?php
                // Include config file
                require_once "configure.php";
                    
                // Attempt select query execution
                $sql = "SELECT * FROM users";
                if($result = mysqli_query($con, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<table class='table table-dark'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th scope='col'>Id</th>";
                                    echo "<th scope='col'>Username</th>";
                                    echo "<th scope='col'>Email</th>";
                                    echo "<th scope='col'>Phone</th>";
                                    echo "<th scope='col'>Address</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['user_id'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['phone'] . "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";                            
                                        echo "</table>";
                                        // Free result set
                                        mysqli_free_result($result);
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                }

                                // Close connection
                                mysqli_close($con);
                                ?>
                            </tbody>
                        </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>