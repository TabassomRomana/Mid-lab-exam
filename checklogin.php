<?php
session_start();

if(isset($_POST['id'])&&isset($_POST['pass']))
{
        $id=$_POST['id'];
		$pass=$_POST['pass'];

	$servername ="localhost";
	$username 	="root";
	$password 	="";
	$dbname 	="midlabxam";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if(!$conn){
		die("Connection Error!".mysqli_connect_error());
	}
	
	$sql = "select * from user";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)>0){
		
		while($row=mysqli_fetch_assoc($result)){

			if ($id==$row['id']&&$pass=$row['pass']&&$row['type']="user") 
			{
				$_SESSION["id"] = $id;
				$_SESSION["type"] = "user";
				header("Location: user_home.php?id=$id&type=user");
			}
			if ($id==$row['id']&&$pass=$row['pass']&&$row['type']="admin") 
			{
				$_SESSION["id"] = $id;
				$_SESSION["type"] = "admin";
				header("Location: admin_home.php?id=$id&type=$type=admin");
			}
			else
			{
				header("Location: login.php?ret=error");
			}
		}
		
	}else{
		echo "Result not found!";
	}

	mysqli_close($conn);
}

?>