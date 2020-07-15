<?php
    //Connection to the database
    $DB_HOST="localhost";
    $DB_USER="root";
    $DB_PASS="";
    $DB_NAME="bookshop";

    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
    if($con==false){
        die("Error".mysqli_connect_error());
    }
?>