<?php
    require_once "configure.php";
    require_once "component.php";

    //insert new data
    if(isset($_POST['create']))
    {
        $bookname=$_POST['book_name'];
        $publisher=$_POST['book_publisher'];
        $isbn=$_POST['book_isbn'];
        $genre=$_POST['book_genre'];
        $author=$_POST['book_author'];
        $copies=$_POST['book_copies'];
        $price=$_POST['book_price'];

        if(isset($_POST['create']) && isset($_FILES["image"]) ){
            $picture=$_FILES['image']['name'];
            $temfile=$_FILES['image']['tmp_name'];
            $target="uploadedimages/".basename($_FILES['image']['name']);
    
            move_uploaded_file($_FILES['image']['tmp_name'],$target);       
        } else{
            echo "Error";
        }

        $description=$_POST['description'];
        /*echo $bookname;
        echo $publisher;
        echo $isbn;
        echo $genre;
        echo $author;
        echo $copies;
        echo $price;*/

        if($bookname && $publisher && $isbn && $genre && $author && $copies && $price)
        {
            $sql="INSERT INTO books (book_name,publisher,isbn_no,genre,author,copies,price,picture,description) VALUES ('$bookname','$publisher','$isbn','$genre','$author','$copies','$price','$picture','$description')";
            if(mysqli_query($con,$sql))
            {
                message("success","Data inserted succesfully.");
            }
            else
            {
                header("location: error.php");
            }
        }
        else
        {
            message("error","Fill all the input fields.");
        }
    }

    function message($classname,$msg){
      $element="<h6 class='$classname'>$msg</h6>";
      echo $element;
    }

    
    //replace records
    if(!empty(($_GET['item_id'])))
    {
        //Get url parameter
        $id = trim($_GET["item_id"]);

        // Prepare a select statement
        $sql="SELECT * FROM books WHERE book_id=?";

        if($stmt=mysqli_prepare($con,$sql))
        {
                mysqli_stmt_bind_param($stmt,'i',$id);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result)==1){
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $book_id=$row['book_id'];
                    $bookname=$row['book_name'];
                    $publisher=$row['publisher'];
                    $isbn=$row['isbn_no'];
                    $genre=$row['genre'];
                    $author=$row['author'];
                    $copies=$row['copies'];
                    $price=$row['price'];
                    $picture=$row['picture'];
                    $description=$row['description'];
                    header("location: crud.php?book_id=".$book_id."&& bookname=".$bookname."&& publisher=".$publisher."&& isbn=".$isbn."&& genre=".$genre."&& author=".$author."&& copies=".$copies."&& price=".$price."&& picture=".$picture."&& description=".$description);
                }
        }
        else
        {
        // URL doesn't contain valitem_id item_id. Redirect to error page
        header("location: error.php");
        exit();
        }
    }

    //Update data
    if(isset($_POST['update']))
    {
        $book_id=$_POST['book_id'];
        $bookname=$_POST['book_name'];
        $publisher=$_POST['book_publisher'];
        $isbn=$_POST['book_isbn'];
        $genre=$_POST['book_genre'];
        $author=$_POST['book_author'];
        $copies=$_POST['book_copies'];
        $price=$_POST['book_price'];
        
        if(isset($_POST['update']) && isset($_FILES["image"]) )
        {
            $picture=$_FILES['image']['name'];
            $temfile=$_FILES['image']['tmp_name'];
            $target="uploadedimages/".basename($_FILES['image']['name']);

            if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                $msg= "Success";
            }else{
                $msg="ERROR";
            }        
        } else{
            echo "Error";
        }
        $description=$_POST['description'];
        /*echo $book_id;
        echo $bookname;
        echo $publisher;
        echo $isbn;
        echo $genre;
        echo $author;
        echo $copies;
        echo $price;*/

        if($bookname && $publisher && $isbn && $genre && $author && $copies && $price)
        {
            $sql="UPDATE books SET book_name='$bookname',publisher='$publisher',isbn_no='$isbn',genre='$genre',author='$author',copies='$copies',price='$price',picture='$picture',description='$description' WHERE book_id='$book_id'";
            if(mysqli_query($con,$sql))
            {
                header("location: crud.php");
            }
            else
            {
                header("location: error.php");
            }
        }
        else
        {
            message("error","Fill all the input fields.");
        }
    }
    
    //delete data
    if(isset($_POST['delete']))
    {
        $book_id=$_POST['book_id'];

        if($book_id)
        {
            $sql="DELETE FROM books WHERE book_id='$book_id'";
            if(mysqli_query($con,$sql))
            {
                header("location: crud.php");
            }
            else
            {
                header("location: error.php");
            }
        }
        
    }
?>