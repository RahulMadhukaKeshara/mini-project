<?php
	require_once "configure.php";

		$id=$_GET['user_id'];	
		$sql="SELECT user_id,username,email,phone,address,reg_time FROM users WHERE user_id=?";

		if($stmt=mysqli_prepare($con,$sql)){
			mysqli_stmt_bind_param($stmt,'i',$id);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);

			if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				echo 'USER ID:'.$row['user_id'].'<br>';
				echo 'USER EMAIL:'.$row['email'].'<br>';
				echo 'Username:'.$row['username'].'<br>';
				echo 'Mobile NO:'.$row['phone'].'<br>';
				echo 'Password:'.$row['address'].'<br>';
				echo 'Registered time:'.$row['reg_time'].'<br>';
			}
		}
		echo"<a href=logout.php>Click here to log out..</a>";

?>