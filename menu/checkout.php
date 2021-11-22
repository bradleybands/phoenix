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


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Checkout</title>
	<!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<!-- CSS Styling -->
	<link rel="stylesheet" type="text/css" href="../css/checkout_styles.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- Google Font -->

</head>
<body>
	<div class="main-menu sticky-top">
		<div class="logo">
			<img src="../images/logo.png" alt="site logo" class="img-fluid">
		</div>
		<div class="inner-menu sticky-top">
			<a href="index.php" style="float: left;">MENU</a>
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

	<div class="container main-div">
		<div class="parent-div border rounded">
			<div class="container">
				<div class="info-div">

					<div class="container mt-3 mb-4 main-width">
						<div class="border rounded cart-summary bg-white">
							<h5 class="text-center pt-3 ">Account Details</h5>
							<hr class="pb-4">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-3 child-left">
									<h6>Name:</h6>
								</div>
								<div class="col-lg-8 col-md-8 col-9">
									<h6><?php echo $data1['name'] ?></h6>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-3 child-left">
									<h6>Mobile No:</h6>
								</div>
								<div class="col-lg-8 col-md-8 col-9">
									<h6><?php echo $data1['mobile'] ?></h6>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-3 child-left">
									<h6>Address:</h6>
								</div>
								<div class="col-lg-8 col-md-8 col-9">
									<h6><?php echo $data1['address'] ?></h6>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-3 child-left">
									<h6>Email:</h6>
								</div>
								<div class="col-lg-8 col-md-8 col-9">
									<h6><?php echo $data1['email'] ?></h6>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
							<div class="col-lg-5 col-md-5 col-12 offset-lg-1 offset-md-1 mb-4">
								<div class="border rounded cart-summary bg-white">

									<h5 class="text-center pt-3 ">Summary</h5>
									<hr class="pb-4">
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
															<div class="col-lg-8 col-md-8 col-8">
																<h6><?php echo $pro['qty']; ?> x <?php echo $data['name']; ?></h6>
																<div class="desc">
																	<p><?php echo $data['detail']; ?></p>
																</div>
															</div>
															<div class="col-lg-4 col-md-4 col-4 text-right">
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

									<hr>
									<div>
										<div class="row">
											<div class="col-lg-7 col-md-7 col-7 text-right">
												<h5>Subtotal:</h5>
											</div>
											<div class="col-lg-5 col-md-5 col-5 text-left">
												<h5><?php echo $total.".00"; ?></h5>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-5 col-md-5 col-12 mb-4">
								<div class=" border rounded bg-white cart-summary pt-4">
									<div class="text-center">
										<div class="">
											<h4><b>PAYMENT METHOD</b></h4>
										</div>
										<div class="radio" style="padding: 15px">
					  						<label><input type="radio" name="optradio" checked> Cash On Delivery (COD)</label>
										</div>
									</div>
									<hr>
									<h6>PRICE DETAILS</h6>
									<hr>
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
									<hr>
								</div>
							</div>
					</div>
				</div>
			</div>

			<div class="text-center" style="padding-bottom: 40px;">
				<a href="order.php"><button class="checkout"> ORDER NOW <i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>
			</div>
		</div>
	</div>





	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>

	<!-- Start of LiveChat (www.livechatinc.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 13303971;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechatinc.com/chat-with/13303971/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->

</body>
</html>
