<?php
    //Connection to the database
    $DB_HOST="localhost:3309";
    $DB_USER="rahul";
    $DB_PASS="rahul123+*";
    $DB_NAME="bookshop";

    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
    if($con==false){
        die("Error".mysqli_connect_error());
    }
?>