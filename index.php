<?php
session_start();
	if (isset($_SESSION['uid']))
	{
		include('dbcon.php');
		$uid = $_SESSION['uid'];
		$query = "SELECT * FROM `user` WHERE `id` = '$uid'";
		$run = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($run);
	}
	else{

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Phoenix's Order</title>

	<!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

	<!-- CSS Styling -->
	<link rel="stylesheet" type="text/css" href="css\index_styles.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">


</head>
<body>
	<div class="main">
		<div class="logout">
			<?php
				if (isset($_SESSION['uid']))
				{
					?><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Logout</a><?php
				}
				else{

				}
			?>
		</div>
		<div class="log-reg">
			<?php
				if (isset($_SESSION['uid']))
				{
					?><a href="ulogin/account.php" ><i class="fa fa-user" aria-hidden="true">&nbsp;</i><?php echo $data['name'] ?></a><?php
				}
				else{
					?><a href="login.php" >Login/Sign up</a><?php
				}
			?>
		</div>

		<div class="site-title">
			<h1>Phoenix's Order</h1>
		</div>
		<div class="site-yellow-img">
			<img src="images/img/yellow-str.png" class="img-fluid">
		</div>
		<div class="site-menu">
			<?php
				if (isset($_SESSION['uid']))
				{
					?><a href="menu/index.php" >MENU</a><?php
				}else{
					?><a href="menu/menu.php" >MENU</a><?php
				}
				?>
		</div>
		<div class="site-steps">
			<img src="images/img/steps.png" class="img-fluid">
		</div>
		<div class="overlay">
		</div>
	</div>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>

</body>
</html>
