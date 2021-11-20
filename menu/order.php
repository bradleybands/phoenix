<?php

	include('../dbcon.php');
	session_start();
	if (isset($_SESSION['uid']))
	{

	}
	else
	{
		header('location: menu_nologin.php');
	}
	$uid = $_SESSION['uid'];
	$query1 = "SELECT * FROM `user` WHERE `id` = '$uid'";
	$run1 = mysqli_query($conn, $query1);
	$data1 = mysqli_fetch_assoc($run1);

	$userId = $data1['id'];
	$name = $data1['name'];
	$address = $data1['address'];
	$email = $data1['email'];
	$mobile = $data1['mobile'];

	if (isset($_SESSION['cart']))
	{
		$count = count($_SESSION['cart']);
		if ($count > 0)
		{

		}
		else
		{
			header('location: cart.php');
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="../css/order.css"> -->
	<title>Checkout</title>

	<!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<!-- CSS Styling -->
	<link rel="stylesheet" type="text/css" href="../css/order_styles.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- Google Font -->

</head>
<body onload="myFunction()">
	<div id="preloader">

	</div>

	<div class="main-menu">
		<div class="logo">
			<img src="" alt="site logo" class="img-fluid">
		</div>
		<div class="inner-menu">
			<a href="../index.php" style="float: left;">HOME</a>
		</div>
	</div>

	<div class="container">
		<div class="parent-div">
			<img src="../images/delivery1.gif" class="img-fluid delivery-boy">
			<h5 class="text-center">Super! Your Order has been confirmed by the restaurant</h5>
		</div>
	</div>
	<div class="container">
		<div class="back-div">
			<div class="child">
				<div class="tracking my-3">
		          	<div class="progress">
		            	<div class="progress-bar progress-bar-striped progress-bar-animated active bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:70%"></div>
          			</div>
          			<div class="state">
          				<div class="row pt-2">
          					<div class="col-lg-3 col-md-3 col-3">
          						<i class="fa fa-check-circle pl-2" aria-hidden="true"></i>
          						<h6>SENT </h6>
          					</div>
          					<div class="col-lg-3 col-md-3 col-3 text-center">
          						<i class="fa fa-check-circle" aria-hidden="true"></i>
          						<h6>CONFIRMED</h6>
          					</div>
          					<div class="col-lg-3 col-md-3 col-3 text-center">
          						<i class="fa fa-check-circle" aria-hidden="true"></i>
          						<h6>ON THE WAY</h6>
          					</div>
							<div class="col-lg-3 col-md-3 col-3 text-right">
								<i class="fa fa-check-circle pr-4" aria-hidden="true" style="color: #bbb"></i>
          						<h6 class="text-right">DELIVERED</h6>
          					</div>
          				</div>
          			</div>
          			<div class="quote text-center pt-5">
	        		<h6>Pull up a chair, sit back and relax, as your order is on its way to you!</h6>
	        		<hr class="w-25">
	        	</div>
	        	</div>
			</div>
			<div class="order-summary">
				<div>
					<div class="border rounded cart-summary bg-white">
						<h5 class="text-center pt-3 ">Order Summary</h5>
						<hr class="pb-4">
						<div class="text-center">
							<h6><b>ORDER ID:</b> <span><?php echo "#51200-".$userId; ?></span></h6>
							<h6><b>ORDER PLACED ON:</b> <span>
								<?php
									date_default_timezone_set("Africa/Accra");
							 		echo date("Y-m-d")." ".date("h:ia");
							 	?>
							 	</span></h6>
						</div>
						<hr class="pb-4">
						<div class="pl-3">
							<h6><b>Delivery Details:</b></h6>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<h6><?php echo $name; ?></h6>
									<h6><?php echo $address; ?></h6>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<h6>0264438599</h6>
									<h6>bradley.deku@ashesi.edu.gh</h6>
								</div>
							</div>
						</div>
						<hr class="pb-4">
						<div class="">
							<h6 class="pl-3"><b>Items:</b></h6>
							<div class="row px-4">
								<?php
									$qty = 1;
									$total = 0;
									$total1 = 0;
									$_SESSION['cart'] = array_values($_SESSION['cart']);
									if (isset($_SESSION['cart']))
									{
										if ($count > 0)
										{
										$product_id = array_column($_SESSION['cart'], 'product_id');
										// foreach ($product_id as $id)
										foreach ($_SESSION['cart'] as $pro)
										{
											$id = $pro['product_id'];
											$query = "SELECT * FROM `menu` WHERE `id` = '$id'";
											$run = mysqli_query($conn, $query);
											if (mysqli_num_rows($run)>0)
											{
												while ($data = mysqli_fetch_assoc($run))
												{
													$qty++;
													$total = $total + ( (int)$data['price']*(int)$pro['qty']);
												?>
													<div class="col-lg-5 col-md-5 col-5 text-center">
														<h6><?php echo $data['name']; ?></h6>
													</div>
													<div class="col-lg-2 col-md-2 col-2">
														<h6><?php echo $data['price'] ?> </h6>
													</div>
													<div class="col-lg-2 col-md-2 col-2">
														<h6><?php echo "x".$pro['qty']; ?></h6>
													</div>
													<div class="col-lg-3 col-md-3 col-3">
														<h6><?php echo $total1 = $data['price']*$pro['qty']; ?></h6>
													</div>
													<hr class="text-center w-75 horizontal-line">
													<?php
													}
												}
											}
										}
									}
								?>
							</div>
						</div>
						<hr class="pb-4">
						<div class="pl-3">
							<h6 class="pb-2"><b>Price Details:</b></h6>
							<div class="row">
								<div class="col-lg-8 col-md-8 col-8">
									<?php
										if (isset($_SESSION['cart'])) {
											$count = count($_SESSION['cart']);
											echo "<h6> Total: ($count Items)</h6>";
										}
										else
										{
											echo "<h6> Price: (0 Items)</h6>";
										}
									?>
									<h6>Delivery Charges </h6>
									<hr>
									<h5>Amount Payable </h5>
								</div>
								<div class="col-lg-4 col-md-4 col-4">
									<h6><?php echo "GHc. ".$total.".00" ?></h6>
									<h6 class="text-success">FREE</h6>
									<hr>
									<h5 class="text-success font-weight-bold"><?php echo "GHc. ".$total.".00"; ?></h5>
								</div>
							</div>
						</div>
						<hr>
						<div class="text-center">
							<h6>Payment Method: <span>CASH ON DELIVERY</span></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>







	<script>
		var preloader = document.getElementById('preloader');

		setTimeout(function myFunction(){
			preloader.style.display = 'none';
		}, 5000);
	</script>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>
