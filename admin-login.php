<?php
error_reporting(0);
session_start();

$BMS_Login_Status = $_SESSION['BMS_is_login_now'];

if($BMS_Login_Status==false)
{

}
else
{
    header('location:index.php');
}





$Login_Status="";



if (isset($_POST['login']))
{
	$username_fild = $_POST['username'];
	$password_fild = $_POST['password'];

	////////////[USERNAME & Password]/////////////
	$Username = "Nilesh";
	$Password = "Nilesh@123";
	////////////[USERNAME & Password]/////////////


	if ($username_fild == $Username) 
	{
		if ($password_fild == $Password) 
		{
			$Login_Status="Admin_Login";
			$_SESSION['BMS_is_login_now']=$Login_Status;
			header('location:index.php');
		}
		else
		{
			$Login_Status="Wrong Password";
		}
	}
	else
	{
		$Login_Status= "Wrong Username";
	}
	

}


?>



<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="icon" href="fashionaminoo/images/favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<br>
	<br>
	<br>

	<center>
		<div style="width: 550px; height: auto; border-radius: 6px; background: white; padding: 50px; text-align: left;">
			<center>
				<span style="color: red; font-size: 18px;">
					<?php echo $Login_Status; ?>
				</span>
				<br>
			<h2 style="font-weight: bold;">
				Admin Login
			</h2>
			</center>
			<br>
			<br>
			<form method="post" action="">
				<label>Username</label>
				<input type="text" name="username" required="required" class="form-control" autocomplete="off" style="height: 45px;">
				<br>
				<label>Password</label>
				<input type="password" name="password" required="required" class="form-control" autocomplete="off" style="height: 45px;">
				<br>

				<center>
				<button class="btn btn-success" name="login" style="height: 50px; max-width: 150px; width: 100%;">Log in</button>
				</center>
				<br>
			</form>

			<div style="text-align: right;">
				<a style="text-decoration: none; font-weight:bold; font-size: 18px;" href="login.php">User Login</a>
			</div>
	
		</div>
	</center>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

</body>
</html>

<style type="text/css">
	body{
		background: #051B2C;
	}
</style>
