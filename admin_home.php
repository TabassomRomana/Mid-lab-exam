<?phpsession_start();	if(isset($_SESSION["id"]) ){?><center>	<h1>Welcome <?php if (isset($_GET['id'])) 		{			echo $_GET['id'];		} ?> !</h1>	<a href="profile.php">Profile</a>	<br/>	<a href="change_password.html">Change Password</a>	<br/>	<a href="view_users.html">View Users</a>	<br/>	<a href="login.php">Logout</a></center><?php}else{		echo "Please login first";	}?>