<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Phoenix's Order</title>

	<!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- CSS Styling -->
	<link rel="stylesheet" type="text/css" href="css\header_styles.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
	<!-- Increament & Decreament JS -->
	<script type="text/javascript" src="../javascript/quantity_inc_dec.js"></script>

</head>
<body>
	<div class="main-menu sticky-top">
		<div class="logo">
			<img src="images/logo.png" class="img-fluid">
		</div>
		<div class="inner-menu sticky-top">
			<a href="../index.php" style="float: left;">HOME</a>
			<a href="cart.php" style="float: right;">CART
			<?php
			if (isset($_SESSION['cart']))
			{
				$count = count($_SESSION['cart']);
				echo "<span><b>$count</b></span>";
			}
			else
			{
				echo "<span><b>0</b></span>";
			}
			?>
			</a>
		</div>
	</div>
