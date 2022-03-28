<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; 
$id = session::get('customer_id');
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['save'])){
 		$update_cus=$cs->update_customers2($_POST,$id);
 		if($update_cus){
 			echo "<script type='text/javascript'>alert('$update_cus');</script>";
 			echo "<script>window.location='checkout-address.php'</script>";
 		}
 		else{
 			echo "<script type='text/javascript'>alert('$update_cus');</script>";
 		}
    }
?>
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
						<h2 class="page-title">Cập Nhật Địa Chỉ Nhận Hàng</h2>
					</div>	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-todo first step-done">
									<span><a href="giohang.php">01. Giỏ hàng</a></span>
								</li>
								<li class="step-current third">
									<span>02. Địa chỉ</span>
								</li>
								<li class="step-todo four">
									<span>03. Shipping</span>
								</li>
								<li class="step-todo last" id="step_end">
									<span>04. Thanh Toán</span>
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
							<form action="" method="post">
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
								<li><h1 style="font-size:16px;">Tên Người Nhận Hàng :</h1><input type="text" name="name" size="60" value="<?php echo $result['name']; ?>"></li>
								<li><h1 style="font-size:16px;">Email : </h1><input type="text" name="email" size="60" value="<?php echo $result['email']; ?>"></li>
								<li><h1 style="font-size:16px;">Địa chỉ nhận hàng : </h1><input type="text" name="address" size="60" value="<?php echo $result['address']; ?>"></li>
								<li><h1 style="font-size:16px;">Số Điện Thoại : </h1><input type="text" name="sdt" size="60" value="<?php echo $result['sdt']; ?>"></li>
								<li>
									<input type="submit" name="save" class="update-button" value="Cập nhật">
								</li>	<?php
											}
										}
										?>									
							</ul>	</form>
							<!-- BILLING ADDRESS END -->
						</div>
					</div>			
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		
		<?php include 'inc/footer.php'; ?>