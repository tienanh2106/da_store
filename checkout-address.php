<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; ?>
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.php"></a>
							<span></span>
							<span></span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Địa Chỉ Nhận Hàng</h2>
					</div>	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-todo first step-done">
									<span><a href="giohang.php">01. Giỏ Hàng</a></span>
								</li>
								<li class="step-current third">
									<span>02. Địa chỉ</span>
								</li>
								<li class="step-todo four">
									<span>03. Shipping</span>
								</li>
								<li class="step-todo last" id="step_end">
									<span>04. Thanh toán</span>
								</li>
							</ul>									
						</div>
						<!-- SHOPING-CART-MENU END -->
					</div>
					<!-- ADDRESS AREA START --> 
					
				</div>
				<div class="row" >
					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
						<div class="second_item primari-box" >
							<!-- BILLING ADDRESS START -->
							<ul class="address">
								<li>
									<h3 class="page-subheading box-subheading">
										Địa chỉ giao hàng
									</h3>
									<?php $id = session::get('customer_id');
										$get_customers=$cs->show_customers($id);
										if ($get_customers){
											while($result = $get_customers->fetch_assoc()){
									?>

								</li>
								<li><span class="address_name"><?php echo 'Tên Người Nhận Hàng : '.$result['name']; ?></span></li>
								<li><span class="address_company"><?php echo 'Email : '.$result['email']; ?></span></li>
								<li><span class="address_address1"><?php echo 'Địa Chỉ Nhận Hàng : '.$result['address']; ?></span></li>
								<li><span class="address_phone_mobile"><?php echo 'Số Điện Thoại : '.$result['sdt']; ?></span></li>
								<li class="update-button">
									<a href="checkout-address_update.php">Update<i class="fa fa-chevron-right"></i></a>
								</li>	<?php
											}
										}
										?>									
							</ul>	
							<!-- BILLING ADDRESS END -->
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<!-- ADDRESS AREA START --> 
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop ship-address">
							<a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng </a>
							<a href="checkout-shipping.php" class="procedtocheckout">Thanh toán<i class="fa fa-chevron-right"></i></a>
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->		
					</div>					
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		
		<?php include 'inc/footer.php'; ?>