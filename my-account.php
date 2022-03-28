<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; ?>	
<?php 
$login_check=session::get('customer_login');
	if ($login_check==false) {
		echo "<script>window.location='login.php'</script>";
	}
?>


		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>

				

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Tài khoản</h2>
					</div>	
					<div class="account-info-text">
						Chào mừng đến với tài khoản của bạn. Tại đây bạn có thể quản lý tất cả các thông tin cá nhân và đơn đặt hàng của mình.
					</div>
					<!-- ACCOUNT-INFO-TEXT START -->

					


					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									<li><a href="my_account_detail.php"><i class="fa fa-user"></i><span>Thông tin cá nhân</span>	</a></li>
									<li><a href="giohang.php"><i class="fa fa-list-ol"></i><span>giỏ hàng của tôi</span>	</a></li>
									<li><a href="order_details.php"><i class="fa fa-file-o"></i><span>hóa đơn</span>	</a></li>
									<li><a href="checkout-address.php"><i class="fa fa-building"></i><span>địa chỉ nhận hàng</span>	</a></li>
									<!-- <li><a href="checkout-registration.php"><i class="fa fa-user"></i><span>My personal information</span></a></li> -->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									<li><a href="wish_list.php"><i class="fa fa-heart"></i><span>yêu thích</span>	</a></li>
								</ul>
								<ul>
									<li><a href="changepassword.php"><i class="fa fa-user"></i><span>Đổi mật khẩu</span>	</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- ACCOUNT-INFO-TEXT END -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<div class="home-link-menu">
							<ul>
								<li><a href="index.php"><i class="fa fa-chevron-left"></i> Home</a></li>
							</ul>
						</div>
						<!-- BACK TO HOME END -->
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<?php include 'inc/footer.php'; ?>