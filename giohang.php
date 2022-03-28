<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; ?>
<?php 
	$login_check= session::get('customer_login');
	if($login_check==false){
		echo "<script>window.location='login.php'</script>";
	}
	
?>
<?php 
$delcart = 0;
if(isset($_GET['cartid'])){
        $cartid=$_GET['cartid'];
        $delcart = $ct->delete_product_cart($cartid);
    }
    if($delcart==true){
        	echo "<script>window.location = 'giohang.php'</script>";
        }

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
 		$cartid=$_POST['cartid'];
        $soluong = $_POST['soluong'];
        $update_soluong_cart = $ct->update_soluong_cart($soluong,$cartid);
        if ($soluong<=0) {
        	$delcart = $ct->delete_product_cart($cartid);
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
						<!-- SHOPPING-CART SUMMARY START -->
						<h2 class="page-title">Giỏ Hàng</h2>
						<!-- SHOPPING-CART SUMMARY END -->
					</div>	
						<?php if (isset($update_soluong_cart)) {
								echo "<script type='text/javascript'>alert('$update_soluong_cart');</script>"; 
							} ?>
						<?php if (isset($delete_product_cart)) {
								echo "<script type='text/javascript'>alert('$delete_product_cart');</script>"; 
							} ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-current first">
									<span>01. Giỏ Hàng</span>
								</li>
								
								<li class="step-todo third">
									<span>02. Địa Chỉ</span>
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
						<!-- CART TABLE_BLOCK START -->
						<div class="table-responsive">
							<!-- TABLE START -->
							<table class="table table-bordered" id="cart-summary">
								<!-- TABLE HEADER START -->
								<thead>
									<tr>
										<th class="cart-product">Ảnh</th>
										<th class="cart-description">Sản Phẩm</th>
										<th class="cart-unit text-right">Giá Sản Phẩm</th>
										<th class="cart_quantity text-center">Số Lượng</th>
										<th class="cart-delete">Thao Tác</th>
										<th class="cart-total text-right">Tổng Tiền</th>
									</tr>
									<?php 
									$tienphaitra=0;
									$get_product_cart = $ct->get_product_cart();
									if ($get_product_cart) {
										while ($result=$get_product_cart->fetch_assoc()) {
										
									
									 ?>
								</thead>
								<!-- TABLE HEADER END -->
								<!-- TABLE BODY START -->
								<tbody>	
									
									
									<!-- SINGLE CART_ITEM START -->
									<tr>
										<td class="cart-product">
											<img src="admin/upload/<?php echo $result['image']; ?>">
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="single-product.php?proid=<?php echo $result['spId']; ?>"><?php echo $result['tensp']; ?></a></p>
											
										</td>

										

										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price special-price"><?php echo $fm->Format_currency($result['giasp'])." VND"; ?></li>
												
											</ul>
										</td>
										<td >
											<form action="" method="post">
												<input type="hidden" name="cartid" value="<?php echo $result['cartid']; ?>">
												<p style="display:flex; padding-top: 15px;"><input type="number" name="soluong" min="1" style="width: 70px; margin-right:5px " value="<?php echo $result['soluong']; ?>">
												<input type="submit" class="" name="submit" value="Cập nhật"></p><br>
											</form>
										</td>
										<td class="cart-delete text-center">
											<a onclick="return confirm('Chắc Chắn Xóa')" href="?cartid=<?php echo $result['cartid'];?>" class="cart_quantity_delete" title="Delete"><i class="fa fa-trash-o"></i></a>
										</td>
										<td class="cart-total">
											<span class="price"><?php $tonggia = $result['giasp']*$result['soluong']; echo $fm->Format_currency($tonggia)." VND"; ?></span>
										</td>
									</tr>
									<!-- SINGLE CART_ITEM END -->
								<?php $tienphaitra +=$tonggia; 
										}
									} ?>
								</tbody>
								<!-- TABLE BODY END -->
								<!-- TABLE FOOTER START -->
								<tfoot>										
									<tr class="cart-total-price">
										<td class="cart_voucher" colspan="3" rowspan="4"></td>
										<td class="text-right" colspan="2">Tổng </td>
										<td id="total_product" class="price" colspan="1"><?php  echo $fm->Format_currency($tienphaitra)." VND";
										session::set('sum',$tienphaitra); ?></td>
									</tr>
									<tr>
										<td class="total-price-container text-right" colspan="2">
											<span>Thanh Toán</span>
										</td>
										<td id="total-price-container" class="price" colspan="1">
											<span id="total-price"><?php 
											$vat=0;
											$thanhtoan=$tienphaitra+$vat;
											echo $fm->Format_currency($thanhtoan)." VND";
										?></span>
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
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
							
									<a href="checkout-address.php" class="procedtocheckout">Thanh toán<i class="fa fa-chevron-right"></i></a>
							
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->						
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		
		<?php include 'inc/footer.php'; ?>