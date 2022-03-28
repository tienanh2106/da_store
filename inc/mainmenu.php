	<?php	if(isset($_GET['cartid'])){
        $cartid=$_GET['cartid'];
        $delcart = $ct->delete_product_cart($cartid);
        if($delcart==true){
        	echo "<script>window.location = '#'</script>";
        }
    }?>
		<!-- MAIN-MENU-AREA START -->
		<header class="main-menu-area">
			<div class="container">
				<div class="row">
					<!-- SHOPPING-CART START -->
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right shopingcartarea">
						<div class="shopping-cart-out pull-right">
							<div class="shopping-cart">
								<a class="shop-link" href="giohang.php" title="View my shopping cart">
									<i class="fa fa-shopping-cart cart-icon"></i>
									<b>Giỏ hàng</b>
									<span class="ajax-cart-quantity"></span>
								</a>
								<div class="shipping-cart-overly">
									<?php 
										$login_check= session::get('customer_login');
										if($login_check==false){
											?>
										<div class="shipping-checkout-btn"><a href="login.php">Đăng Nhập</a>
									</div>
									<?php
										}
										else{
									?>
									<?php 
									$tienphaitra=0;
									$get_product_cart = $ct->get_product_cart();
									if ($get_product_cart) {
										while ($result=$get_product_cart->fetch_assoc()) {
									 ?>
									<div class="shipping-item">
										<a onclick="return confirm('Chắc Chắn Xóa')" href="?cartid=<?php echo $result['cartid'];?>"><span class="cross-icon"><i class="fa fa-times-circle"></i></span></a>
										<div class="shipping-item-image">
											<a href="single-product.php?proid='<?php echo $result['spId']; ?>'"><img src="admin/upload/<?php echo $result['image']; ?>" width=50px alt="shopping image" /></a>
										</div>
										<div class="shipping-item-text">
											<span><?php echo $result['soluong']; ?> <span class="pro-quan-x">x</span> <a href="single-product.php?proid='<?php echo $result['spId']; ?>'" class="pro-cat"><?php echo $result['tensp']; ?></a></span>
											<p><?php $tonggia = $result['giasp']*$result['soluong']; echo $fm->Format_currency($tonggia)." VND"; ?></p>
										</div>
									</div>
									<?php $tienphaitra +=$tonggia; 
										}
									} ?>
									<div class="shipping-total-bill">
										<div class="total-shipping-prices">
											<span class="shipping-total"><?php  echo $fm->Format_currency($tienphaitra)." VND";
										session::set('sum',$tienphaitra); ?></span>
											<span>Total</span>
										</div>										
									</div>
									<div class="shipping-checkout-btn">
										<a href="checkout-address.php">Check out <i class="fa fa-chevron-right"></i></a>
									</div><?php } ?>
								</div>
							</div>
						</div>
					</div>	
					<!-- SHOPPING-CART END -->
					<!-- MAINMENU START -->
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding-right menuarea">
						<div class="mainmenu">
							<nav>
								<ul class="list-inline mega-menu">
									<li class="active"><a href="index.php">Trang chủ</a>
									</li>
									<li>
										<a href="listproduct.php">Sản phẩm</a>
										<!-- DRODOWN-MEGA-MENU START -->
										<div class="drodown-mega-menu">
											<div class="left-mega col-xs-6">
												<div class="mega-menu-list">
													<a class="mega-menu-title" href="shop-gird.php">Danh mục</a>
													<?php 
								                        $show_category= $cat->show_category();
								                        if($show_category){
								                            $i = 0;
								                            while($result = $show_category->fetch_assoc()){
								                            $i++;  
								                        ?>
													<ul>
														<li><a href="sanpham3.php?danhmucid=<?php echo $result['catid']; ?>"><?php echo $result['catName']; ?></a></li>
													</ul>
													<?php }} ?>
												</div>
											</div>
											<div class="right-mega col-xs-6">
												<div class="mega-menu-list">
													<a class="mega-menu-title" href="shop-gird.php">Hãng</a>
													<?php 
								                        $show_brand = $brand->show_brand();
								                        if($show_brand){
								                            $i = 0;
								                            while($result = $show_brand->fetch_assoc()){
								                            $i++; 
								                        ?>
													<ul>
														<li><a href="sanpham2.php?brandid=<?php echo $result['brandid']; ?>"><?php echo $result['brandName']; ?></a></li>
													</ul>
												<?php }} ?>
												</div>
											</div>
										</div>
										<!-- DRODOWN-MEGA-MENU END -->
									</li>
									<?php 
									$login_check=session::get('customer_login');
									if ($login_check==false) {
										echo "";
									}
									else {echo "<li><a href='my-account.php'>Tài khoản</a></li>";}
									?>
									<?php 
									$customer_id=session::get('customer_id');
									$check_order=$ct->check_order($customer_id);
									if ($check_order==false) {
										echo "";
									}
									else {echo "<li><a href='order_details.php'>Hóa Đơn</a></li>";}
									?>
									<?php 
									$login_check=session::get('customer_login');
									if ($login_check==false) {
										echo "";
									}
									else {echo "<li><a href='wish_list.php'>Yêu Thích</a></li>";}
									?>
									<li><a href="about-us.php">Liên hệ</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- MAINMENU END -->
				</div>
				
								
			</div>
		</header>