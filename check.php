<?php 
session_start();

if(isset($_POST['name'])&&isset($_POST['pass'])&&isset($_POST['id'])&&isset($_POST['cpass'])&&isset($_POST['type']))
	{
		$name=$_POST['name'];
		$pass=$_POST['pass'];
		$cpass=$_POST['cpass'];
		$id=$_POST['id'];
		$type=$_POST['type'];
		$allgood=1;

		if (strlen($id)>8) 
		{
			header("Location: registration.php?ret=erroridlimit");
		}
		elseif(empty($name))
		{
			//echo "* Cannot be empty"; echo '</br> ';
			header("Location: registration.php?ret=erroremptyname");
		}
		elseif(empty($pass))
		{
			//echo "* Cannot be empty"; echo '</br> ';
			header("Location: registration.php?ret=erroremptypass");
		}
		elseif(strlen($pass)<8)
		{
			//echo "* Cannot be empty"; echo '</br> ';
			header("Location: registration.php?ret=errorpasslimit");
		}
		elseif(empty($cpass))
		{
			//echo "* Cannot be empty"; echo '</br> ';
			header("Location: registration.php?ret=erroremptypass");
		}
		elseif($cpass!=$pass)
		{
			//echo "* Cannot be empty"; echo '</br> ';
			header("Location: registration.php?ret=errorpassnotmatch");
		}
		elseif(!isset($_POST['type']))
		{
			//echo "* Cannot be empty"; echo '</br> ';
			header("Location: registration.php?ret=errortype");
		}
		else
		{
	      $servername   ="localhost";
	      $username 	="root";
	      $password 	="";
	      $dbname 	    ="midlabxam";
	
	      $conn = mysqli_connect($servername, $username, $password, $dbname);
	
	     if(!$conn)
	     {
		  die("Connection Error!".mysqli_connect_error());
		 }
		 else
		 {
		 	$sql = "insert into user values ('$id','$name','$pass','$type')";
	
	        if(mysqli_query($conn, $sql))
	        {
		    echo "<br/> Data Inserted!";
		    header("Location: login.php");
	        }
	        else
	        {
		    echo "<br/> SQL Error".mysqli_error($conn);
	        }
	        mysqli_close($conn);
	    }
	}
}
	


 ?>