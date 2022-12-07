<?php
include_once '../settings/core.php';
include '../controllers/cart_controller.php';
// $uid = check_login();

// $role = inspect_admin();
$subTotal = 0.0;
$total = 0.0;

if(isset($_SESSION['customer_id'])){
	$uid = $_SESSION['customer_id'];
	$selectedproduct = select_all_cart_ctr($uid);
}else{
	$ip_add = check_ip();
	echo $ip_add;
	$selectedproduct_gst = select_all_cart_gst_ctr($ip_add);
}

if (isset($_GET['message'])) {
	$message = $_GET['message'];
} else {
	$message = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/revampdlogo.jpg">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../assets/css/responsive.css">
	<!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

	<!-- sweet alert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- <script src="sweetalert2.min.js"></script> -->



</head>

<body>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php" style="color: white; font-weight: bold; font-size:1.3rem;">
								<!-- <img src="./assets/img/revampdlogo.jpg" width="60" alt=""> -->
								REVAMP'D
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="../index.php">Home</a></li>
								<li><a href="../view/about.php">About</a></li>


								<li><a href="shop.php">Shop</a>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										 <?php if (isset($uid)) {
													echo '<a href="../Login/logout.php">Logout</a>';
												} ?> 
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<form method=POST action="search_product.php">
								<h3>Search For:</h3>
								<input type="text" name="searchtitle" placeholder="Keywords">
								<button type="submit">Search <i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Revampd Services</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->

	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-quantity"></th>
									<th class="product-total">Sub Total</th>


								</tr>
							</thead>
							<tbody>
								<?php // print_r($selectedproduct);
								if (isset($uid) ) {
									
										
										foreach ($selectedproduct as $product) {
	
											$sub = $product['product_price'] * $product['qty'];
											$total += (float) $sub;
											$title = $product['product_title'];
											$unitprice = $product['product_price'];
											$qty = $product['qty'];
											$subTotal = $sub;
											$total = $total;
									?>
											<form method=POST action="../actions/manage_quantity.php">
												<tr class="table-body-row">
													<input type="hidden" name="prod_id" value="<?php echo $product['product_id']; ?>">
													<td class="product-remove"><a href="<?php echo '../actions/remove_from_cart.php?deletePID=' .
																							$product['product_id']; ?>"><i class="far fa-window-close"></i></a></td>
													<td class="product-image"><img src="<?php echo $product['product_image']; ?>" alt=""></td>
													<td class="product-name"> <?php echo $product['product_title']; ?></td>
													<td class="product-price"> <?php
																				echo 'GHS';
																				echo $product['product_price'];
																				?>
													</td>
													<td class="product-quantity"><input type="number" name="qty" placeholder="0" value=<?php echo $qty; ?>></td>
													<td class="product-quantity">
														<input class="btn black" type="submit" name="updateQty" value="Update">
													</td>
													<td class="product-total"><?php echo $subTotal; ?></td>
											</form>
	
											</tr>
										<?php
										}
									
								} else {
									foreach ($selectedproduct_gst as $product) {

										$sub = $product['product_price'] * $product['qty'];
										$total += (float) $sub;
										$title = $product['product_title'];
										$unitprice = $product['product_price'];
										$qty = $product['qty'];
										$subTotal = $sub;
										$total = $total;
									?>
										<form method=POST action="../actions/manage_quantity.php">
											<tr class="table-body-row">
												<input type="hidden" name="prod_id" value="<?php echo $product['product_id']; ?>">
												<td class="product-remove"><a href="<?php echo '../actions/remove_from_cart.php?deletePID=' .
																						$product['product_id']; ?>"><i class="far fa-window-close"></i></a></td>
												<td class="product-image"><img src="<?php echo $product['product_image']; ?>" alt=""></td>
												<td class="product-name"> <?php echo $product['product_title']; ?></td>
												<td class="product-price"> <?php
																			echo 'GHS';
																			echo $product['product_price'];
																			?>
												</td>
												<td class="product-quantity"><input type="number" name="qty" placeholder="0" value=<?php echo $qty; ?>></td>
												<td class="product-quantity">
													<input class="btn black" type="submit" name="updateQty" value="Update">
												</td>
												<td class="product-total"><?php echo $subTotal; ?></td>
										</form>

										</tr>
								<?php
									}
								} ?>
							</tbody>
						</table>
					</div>
				</div>



				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>

								<tr class="total-data">
									<td><strong> GHS </strong></td>
									<td><?php echo $total; ?></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">

							<?php if (isset($uid) && isset($role)) { ?>

								<a href="../view/payment_form.php?amount=<?php echo $total; ?>" class="boxed-btn black">Check Out</a>
							<?php } else { ?>
								<a role="button" class="boxed-btn black" onclick="fireAlert()">Check Out</a>
								<script>
									function fireAlert(){
										Swal.fire({
											title: 'Action Restricted',
											text: 'You need to be logged in',
											icon: 'warning',
											confirmButtonText: 'Okay'
										}).then(()=>{
											window.location.href='../Login/login.php';
										})
									}
								</script>
							<?php } ?>

						</div>
					</div>


				</div>
			</div>
		</div>
	</div>

	<input type="hidden" name="" id="alert" value="<?php echo $message; ?>">

	<!-- end cart -->



	 <!-- footer -->
	 <div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Revamp'd is a career development organization that focuses on equipping young individuals with the necessary skills to take their careers to the next level</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>revampwithd@gmail.com</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="./view/about.php">About</a></li>
							<li><a href=".view/shop.php">Shop</a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.php">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights Reserved.<br>
						Distributed By - <a href="https://themewagon.com/">Themewagon</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="https://instagram.com/revamped_____?igshid=YTY2NzY3YTc=" target="_blank"><i class="fab fa-instagram"></i></a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="../assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="../assets/js/main.js"></script>

	<!-- sweet alert code -->
	<script>
		let sw = document.getElementById('alert').value
		if (sw == 'failed') {
			Swal.fire({
				title: 'Duplicate product',
				text: 'Product is already in the cart. Increase the quantity instead',
				icon: 'warning',
				confirmButtonText: 'Okay'
			}).then(()=>{
				window.location.href='cart.php'
			})
		} else if (sw == 'success') {
			Swal.fire({
				title: 'Product added to cart',
				text: '',
				icon: 'success',
				confirmButtonText: 'Okay'
			}).then(()=>{
				window.history.back()
			})
		} else {

		}
	</script>

</body>

</html>