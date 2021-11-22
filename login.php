<?php

	session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>


	<!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<!-- CSS Styling -->
	<link rel="stylesheet" type="text/css" href="css\login_styles.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


</head>
<body>
	<div style="float: right;" class="mt-3 mr-3">
		<a href="admin/adminlogin.php"><button class="btn btn-primary">ADMIN</button></a>
	</div>
	<div class="wrap">
		<h2>Login</h2>
		<form action="login.php" method="post">
			<input type="email" name="uname" placeholder="Email" required>

			<input type="password" name="pass" placeholder="Password" required>

			<input type="submit" name="login" value="Login">

			<h6 class="pt-3">Don't have an Acccount? <a href="register.php">Sign Up</a></h6>
		</form>
	</div>


	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>

<?php

	if (isset($_POST['login']))
	{
		include('dbcon.php');

		$uname = $_POST['uname'];
		$password = $_POST['pass'];

		$query = "SELECT * FROM `user` WHERE `email` = '$uname' AND `password` = '$password'";
		$run = mysqli_query($conn, $query);

		$row = mysqli_num_rows($run);

		if ($row < 1)
		{
			?>

			<script>
				alert("Username & Password not match!");
				window.open('login.php','_self');
			</script>

			<?php
		}
		else
		{
			$data = mysqli_fetch_assoc($run);
			$id = $data['id'];

			$_SESSION['uid'] = $id;

			?>
				<script>
					window.open('index.php?uid=<?php echo $id ?>','_self');
				</script>
			<?php

		}
	}

?>
