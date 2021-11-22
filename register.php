<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Signup</title>


	<!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<!-- CSS Styling -->
	<link rel="stylesheet" type="text/css" href="css\register_styles.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


</head>
<body>
	<div class="wrap">
		<h2>Register</h2>
		<form action="register.php" method="post">
			<input type="text" name="name" placeholder="Name" required>

			<input type="number" name="mobile" placeholder="Mobile Number" required>

			<input type="email" name="email" placeholder="Email" required>

			<textarea name="address" placeholder="Address" required></textarea>

			<input type="password" name="password" placeholder="Password" required>

			<input type="password" name="cpassword" placeholder="Confirm Password" required>

			<input type="submit" name="submit" value="Register" >

			<h6 class="pt-3">Aleready Have an Acccount? <a href="login.php">Login</a></h6>
		</form>
	</div>


	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>

<?php

	if (isset($_POST['submit']))
	{
		include('dbcon.php');

		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		if ($password != $cpassword)
		{
			?>
			<script type="text/javascript">
				alert("Password and Confirm Password not match!");
			</script>
			<?php
			die();
		}

		$sql_1 = "SELECT 1 FROM `user` WHERE `email` = '$email'";
		$erun = mysqli_query($conn, $sql_1);

		if (mysqli_num_rows($erun) > 0)
		{
			?>
			<script type="text/javascript">
				alert("Email Aleready Exist!");
			</script>
			<?php
			die();
		}

		$sql_2 = "INSERT INTO `user`(`name`, `mobile`, `address`, `email`, `password`, `cpassword`) VALUES ('$name', '$mobile', '$address', '$email', '$password', '$cpassword')";
		$run = mysqli_query($conn, $sql_2);

		if ($run == true)
		{
			?>

			<script>
				alert("User Registration Successfully !");
				window.open('login.php','_self')
			</script>

			<?php
		}
		else
		{
    		echo "ERROR: $sql_2. " . mysqli_error($conn);
		}
	}
?>
