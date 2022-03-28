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
						<h2 class="page-title">Shipping</h2>
					</div>	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-todo first step-done">
									<span><a href="giohang.php">01. Giỏ Hàng</a></span>
								</li>
								<li class="step-todo third step-done">
									<span><a href="checkout-address.php">02. Địa Chỉ</a></span>
								</li>
								<li class="step-current four">
									<span>03. Shipping</span>
								</li>
								<li class="step-todo last" id="step_end">
									<span>04. Thanh toán</span>
								</li>
							</ul>									
						</div>
						<!-- SHOPING-CART-MENU END -->
					</div>
				</div>
				<form>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- PRODUCT-DELIVERY-OPTION START -->
						<div class="product-delivery-option">
							<div class="product-delivery-address">
								<p>Chọn đơn vị vận chuyển</p>
							</div>
							<!-- PRODUCT-DELIVERY-ITEM START -->
							<div class="product-delivery-item">
								<div class="product-delivery-single-item">
									<?php 
										$show_ship = $ship->show_ship();
										if($show_ship){
											$i = 0;
											while($result = $show_ship->fetch_assoc()){
												$i++;
									?>
									<div class="table-responsive">
										<!-- PRODUCT-DELIVERY SINGLE OPTION START -->
									    <table class="table table-bordered delivery-table">
											<tr>											
												<td class="delivery-method-icon">
													<img src="admin/upload/<?php echo $result['shipimg']; ?>" alt="" />
												</td>
												<td class="carrey-info">
													<strong><?php echo $result['shipname']; ?></strong><br>
													<?php echo $result['shipmota']; ?>
												</td>
												<td class="carrey-cost"><?php echo $result['shipgia']; ?></td>
												<td><a href="checkout.php?shipid=<?php echo $result['shipid']; ?>" class="btn1">Chọn</a></td>
											</tr>
									    </table>
										<!-- PRODUCT-DELIVERY SINGLE OPTION END -->
									</div>
								<?php }} ?>
								</div>
							</div>
							<!-- PRODUCT-DELIVERY-ITEM START -->
							<!-- TERMS-OF-SERVICE START -->
							<div class="terms-of-service">
								<p>Terms of service</p>
								<div class="form-group new-ac-form-group p-info-group ">
									<label class="cheker">
										<input type="checkbox" name="checkbox">
										<span></span>
									</label>
									<span class="agree">I agree to the terms of service and will adhere to them unconditionally.<a href="#">(Read the Terms of Service)</a></span>
								</div>								
							</div>
							<!-- TERMS-OF-SERVICE END -->
						</div>
						<!-- PRODUCT-DELIVERY-OPTION END -->
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
							
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->	
					</div>					
				</div></form>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<?php include 'inc/footer.php'; ?>