<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; ?>
<?php 
if(isset($_GET['shipid'])){
	$shipid = $_GET['shipid'];
}
if (isset($_GET['orderid'])&&$_GET['orderid']=='order') {
	$customer_id=session::get('customer_id');
	$thanhtoan=1;
	$insert_order=$ct->insert_order($customer_id,$shipid,$thanhtoan);
	$delcart=$ct->delete_all_product_cart();
	echo "<script>window.location = 'success.php'</script>";

}


?>
<form action="" method="post">
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
						<h2 class="page-title">CHỌN PHƯƠNG THỨC THANH TOÁN CỦA BẠN </h2>
					</div>	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-todo first step-done">
									<span><a href="giohang.php">01. Giỏ hàng</a></span>
								</li>
								<li class="step-todo third step-done">
									<span><a href="checkout-address.php">02. Địa chỉ</a></span>
								</li>
								<li class="step-todo four step-done">
									<span><a href="checkout-shipping.php">03. Vận chuyển</a></span>
								</li>
								<li class="step-current last" id="step_end">
									<span>04. Thanh toán</span>
								</li>
							</ul>									
						</div>
						<!-- SHOPING-CART-MENU END -->
						<!-- CART TABLE_BLOCK START -->
						<div class="table-responsive">
							<!-- TABLE START -->
							<table class="table table-bordered" id="cart-summary">
								<!-- TABLE HEADER START -->
								<thead>
									<tr>
										<th class="cart-product">Sản phẩm</th>
										<th class="cart-description">Mô tả</th>
										<th class="cart-unit text-right">Giá</th>
										<th class="cart_quantity text-center">Số lượng</th>
										<th class="cart-total text-right">Tổng</th>
									</tr>
								</thead>
								<!-- TABLE HEADER END -->
								<!-- TABLE BODY START --><?php 
									$tienphaitra=0;
									$get_product_cart = $ct->get_product_cart();
									if ($get_product_cart) {
										while ($result=$get_product_cart->fetch_assoc()) {
										
									
									 ?>
								<tbody>
									<!-- SINGLE CART_ITEM START -->
									<tr>
										<td class="cart-product">
											<a href="#">
												<img alt="Faded" src="admin/upload/<?php echo $result['image']; ?>">
											</a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="#"><?php echo $result['tensp']; ?></a></p>
											<!-- <small>SKU : demo_1</small>
											<small><a href="#">Size : S, Color : Orange</a></small> -->
										</td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price"><?php $giasp=$result['giasp']; echo $fm->Format_currency($giasp).' VND'; ?></li>
											</ul>
										</td>
										<td class="cart_quantity text-center">
											<span><?php $soluong= $result['soluong']; echo $soluong; ?></span>
										</td>
										<td class="cart-total">
											<span class="price"><?php $tong= (float)$giasp*$soluong;echo $fm->Format_currency($tong).' VND'; ?></span>
										</td>
									</tr>
									<!-- SINGLE CART_ITEM END -->
									
									
								</tbody><?php $tienphaitra +=$tong;  }} ?>
								<!-- TABLE BODY END -->
								<!-- TABLE FOOTER START -->
								<tfoot>
									<tr>
										<td class="text-right" colspan="4">Tổng tiền</td>
										<td class="price" colspan="2"><?php  echo $fm->Format_currency($tienphaitra)." VND";
										session::set('sum',$tienphaitra); ?></td>
									</tr>
									<?php if(isset($_GET['shipid'])){
										$shipid=$_GET['shipid'];
										$getshipid=$ship->getshipbyid($shipid);
										if($getshipid){
											while($result = $getshipid->fetch_assoc()){
									 ?>
									<tr>
										<td class="text-right" colspan="4">Đơn vị vận chuyển</td>
										<td class="price" colspan="2"><?php echo (string)$result['shipname']; ?></td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Phí vận chuyển</td>
										<td class="price" colspan="2"><?php $phiship = $result['shipgia'];echo $fm->Format_currency($phiship) ?> VND</td>
									</tr><?php }}} ?>
									<tr>
										<td class="total-price-container text-right" colspan="4">
											<span>Tiền phải trả</span>
										</td>
										<td id="total-price-container" class="price" colspan="2">
											<span id="total-price"><?php 
											$thanhtoan=$tienphaitra+$phiship;
											echo $fm->Format_currency($thanhtoan)." VND"; ?></span>
										</td>
									</tr>
								</tfoot>
								<!-- TABLE FOOTER END -->								
							</table>
							<!-- TABLE END -->
						</div>
						<!-- CART TABLE_BLOCK END -->
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- FOUR-PAYMENT-METHOD START -->
						<div class="four-payment-method">
							<!-- SINGLE-PAYMENT-METHOD START -->
							<div class="single-payment-method " >
								<a href="?orderid=order&shipid=<?php echo $shipid ?>">
									Thanh toán khi nhận được hàng<span></span><i class="fa fa-chevron-right"></i></a>
							</div>
							<!-- SINGLE-PAYMENT-METHOD END -->
							<!-- SINGLE-PAYMENT-METHOD START -->
							<div class="single-payment-method ">
								<a href="checkout_momo.php?orderid=order&shipid=<?php echo $shipid ?>">Thanh toán qua Momo<span></span><i class="fa fa-chevron-right"></i></a>
							</div>
							<!-- SINGLE-PAYMENT-METHOD END -->
													
						</div>
						<!-- FOUR-PAYMENT-METHOD END -->
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
							
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->								
					</div>
				</div>
			</div>
		</section>
		</form>
		<!-- MAIN-CONTENT-SECTION END -->
		<?php include 'inc/footer.php'; ?>