<center>
<form action="checklogin.php" method="POST">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<fieldset>
					<legend><h3>LOGIN</h3></legend>
					User Id<br/>
					<input type="text" name='id'><br/>                               
					Password<br/>
					<input type="password" name='pass'>
					<br /><hr/>
					<input type="submit" value="Login">
					<a href="registration.php">Register</a>
				</fieldset>
			</td>
		</tr>                                
	</table>


</form>
</center>

<?php

	if (!isset($_GET['ret'])) {
	exit();
}
else
{
	$error=$_GET['ret'];
	if ($error=="error") {
		echo "<br>";
		echo "<h5>Wrong ID and Pass</h5>";
	    exit();
	}
}

?>