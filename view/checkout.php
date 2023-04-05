<?php
require_once('../controller/UserController.php');
require_once('../controller/ProductController.php');
require_once('../controller/BillController.php');

$id = isset($_SESSION['user']) ? $_SESSION['user'] : '';

if ($id == null || $id == "") {
	header('Location:../view/signin.php');
}

$controller = new BillController();
$controller->createBill();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->


	<link rel="icon" href="https://res.cloudinary.com/ddt8drwas/image/upload/v1679934580/TVT_n5hd3g.png">
	<title>THT ToyStore - Checkout</title>
	<meta name="description" content="THT ToyStore - Checkout">


	<!-- Core Style CSS -->
	<link rel="stylesheet" href="/resources/css/core-style.css">
	<link rel="stylesheet" href="/resources/style.css">

	<!-- Responsive CSS -->
	<link href="/resources/css/responsive1.css" rel="stylesheet">

	<!-- bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="/resources/css/bootstrap.css" />
	<!-- fonts style -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- font awesome style -->
	<link href="/resources/css/font-awesome.min.css" rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="/resources/css/style2.css" rel="stylesheet" />
	<!-- responsive style -->
	<link href="/resources/css/responsive.css" rel="stylesheet" />

	<style>
		.dropdown1 {
			float: left;
			overflow: hidden;
		}

		.dropdown1 .dropbtn1 {
			font-size: 16px;
			border: none;
			outline: none;
			color: white;
			background-color: inherit;
			font-family: inherit;
			margin: 0;
		}

		.dropdown1:hover .dropbtn1 {
			color: #f3c93e;
		}

		.dropdown1-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			z-index: 1;
		}

		.dropdown1-content a {
			float: none;
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown1-content a:hover {
			background-color: #ddd;
			color: black;
		}

		.dropdown1:hover .dropdown1-content {
			display: block;
		}

		.mySlides1 {
			display: none
		}

		.mySlides1>img {
			border-radius: 8px;
			box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
		}

		/* Slideshow container */
		.slideshow-container1 {
			max-width: 1000px;
			position: relative;
			margin: auto;
		}

		/* Next & previous buttons */
		.prev1,
		.next1 {
			cursor: pointer;
			position: absolute;
			top: 50%;
			width: auto;
			padding: 16px;
			margin-top: -22px;
			color: white !important;
			font-weight: bold;
			font-size: 18px;
			transition: 0.6s ease;
			border-radius: 0 3px 3px 0;
			user-select: none;
		}

		/* Position the "next button" to the right */
		.next1 {
			right: 0;
			border-radius: 3px 0 0 3px;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev1:hover,
		.next1:hover {
			background-color: rgba(0, 0, 0, 0.8);
		}

		/* Number text (1/3 etc) */
		.numbertext1 {
			color: #f2f2f2;
			font-size: 12px;
			padding: 8px 12px;
			position: absolute;
			top: 0;
		}

		/* The dots/bullets/indicators */
		.dot1 {
			cursor: pointer;
			height: 15px;
			width: 15px;
			margin: 0 2px;
			background-color: #bbb;
			border-radius: 50%;
			display: inline-block;
			transition: background-color 0.6s ease;
		}

		.active1,
		.dot1:hover {
			background-color: #717171;
		}

		/* Fading animation */
		.fade1 {
			animation-name: fade;
			animation-duration: 1.5s;
		}
	</style>
</head>

<body>

	<div id="wrapper">

		<?php include 'header1.php' ?>

		<!-- ****** Checkout Area Start ****** -->
		<div class="checkout_area section_padding_100">
			<div class="container">
				<div class="row">

					<div class="col-12 col-md-6">
						<div class="checkout_details_area mt-50 clearfix">

							<div class="cart-page-heading">
								<h5>Thông tin hoá đơn</h5>
							</div>

							<form method="post" id="myForm">
								<div class="row">
									<div class="col-12 mb-3">
										<label for="company">Tên người dùng</label>
										<input type="text" class="form-control" id="userName" name="userName" value="<?php
																														$user = unserialize($_SESSION["user"]);
																														echo ($user['userName']);
																														?>" disabled="disabled">
									</div>
									<div class="col-12 mb-4">
										<label for="email_address">Email <span>*</span></label>
										<input type="email" class="form-control" id="userEmail" name="userEmail" value="<?php
																														$user = unserialize($_SESSION["user"]);
																														echo ($user['userEmail']);
																														?>" disabled="disabled">
									</div>
									<div class="col-12 mb-3">
										<label for="street_address">Địa chỉ giao hàng <span>*</span></label>
										<input type="text" class="form-control mb-3" id="userAddress" name="userAddress" value="<?php
																																$user = unserialize($_SESSION["user"]);
																																echo ($user['userAddress']);
																																?>">
									</div>
									<div class="col-12 mb-3">
										<label for="phone_number">SĐT <span>*</span></label>
										<input type="number" class="form-control" id="userPhoneNumber" name="userPhoneNumber" min="0" value="<?php
																																				$user = unserialize($_SESSION["user"]);
																																				echo ($user['userPhoneNumber']);
																																				?>">
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
						<div class="order-details-confirmation">

							<div class="cart-page-heading">
								<h5>Đơn hàng của bạn</h5>
								<p>Thông tin chi tiết</p>
							</div>

							<ul class="order-details-form mb-4">
								<li><span>Sản phẩm</span> <span>Tổng tiền</span></li>
								<?php
								foreach ($_SESSION['cart'] as $item) {
								?>
									<li>
										<span><?php echo $item['productName']; ?></span>
										<span><?php echo number_format($item['productPrice'] * $item['productQuantity'], 2, ",", ".") . ' đ'; ?></span>
									</li>
								<?php
								} ?>
							</ul>

							<div id="accordion" role="tablist" class="mb-4">
								<div class="card">
									<div class="card-header" role="tab" id="headingTwo">
										<h6 class="mb-0">
											<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												<i class="fa fa-circle-o mr-3"></i>
												Thanh toán khi giao hàng
											</a>
										</h6>
									</div>

								</div>
							</div>

							<a onclick="submitForm()" class="btn karl-checkout-btn">
								Xác nhận</a>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- ****** Checkout Area End ****** -->

		<?php include 'footer1.php' ?>
	</div>
	<!-- /.wrapper end -->

	<!-- jQuery (Necessary for All JavaScript Plugins) -->
	<script src="/resources/js/jquery/jquery-2.2.4.min.js"></script>
	<!-- Popper js -->
	<script src="/resources/js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="/resources/js/bootstrap.min.js"></script>
	<!-- Plugins js -->
	<script src="/resources/js/plugins.js"></script>
	<!-- Active js -->
	<script src="/resources/js/active.js"></script>

	<script>
		function submitForm() {
			document.getElementById('myForm').submit();
		}
	</script>

</body>

</html>