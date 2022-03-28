<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; 
	$customer_id=session::get('customer_id');
	if(!isset($_GET['proid']) || $_GET['proid']==null){
        echo "'<script>window.location='404.php'</script>";
    }
    else{
        $id=$_GET['proid'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['addtocart'])){
        $soluong = $_POST['soluong'];
        if($soluong>0){
      		$addtocart = $ct->addtocart($soluong,$id);
      	}
      	else{
      		echo "<script>alert('Bạn chưa nhập số lượng')</script>";
      	}
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wishlist'])){
        $insert_wishlist = $product->insert_wishlist($id,$customer_id);
    }
    if(isset($_POST['binhluan_submit'])){
    	$cusid = session::get('customer_id');
        $binhluan = $cs->insert_binhluan($cusid);
    }
    if (isset($_GET['delcmtid'])) {
    	$delcmtid = $_GET['delcmtid'];
    	$delcmt = $cs->delcmt($delcmtid);
    }
?>

		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<br><br><br>			
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- SINGLE-PRODUCT-DESCRIPTION START -->
						 <?php 
			                $get_pro_detail = $product->getdetail($id);
			                if($get_pro_detail){
			                while($result_detail = $get_pro_detail->fetch_assoc()){
			                	$idbrand = $result_detail['brandid'];
        ?>
        			
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
								<div class="single-product-view">
									  <!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="thumbnail_1">
											<div class="single-product-image">
												<img src="admin/upload/<?php echo $result_detail['hinhanh']; ?>" alt="single-product-image" />
												<a class="fancybox" href="admin/upload/<?php echo $result_detail['hinhanh']; ?>" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										
									</div>										
								</div>
								
							</div>
							<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
								<div class="single-product-descirption">
									<h2><?php echo $result_detail['tensp']; ?></h2>
									<div class="single-product-price">
										<h2><?php echo $fm->Format_currency($result_detail['giasp']); ?> VND</h2>
									</div>
									<div class="single-product-desc">
										<p><?php echo $result_detail['motasp']; ?></p>
										<div class="product-in-stock">
											<?php if ($result_detail['soluong']>0) { ?>
											<p>số lượng : <?php echo $result_detail['soluong']; ?>
											<span>
												<?php if($result_detail['soluong']>0){
													echo 'Còn hàng';
												} 
												else{
													echo 'Hết hàng';
												}?>

											</span></p>	
											<?php } 
											else{ ?>
												<p>số lượng : <?php echo '0'; ?>
											<span>
												<?php if($result_detail['soluong']>0){
													echo 'Còn hàng';
												} 
												else{
													echo 'Hết hàng';
												}?>

											</span></p>	
											<?php }?>
											<p><?php echo $result_detail['brandName'];?>, <?php echo $result_detail['catName'];?></p>
										</div>
									</div>

								<form method="post" action="">
									<div class="single-product-quantity">
										<p class="small-title">Số lượng</p> 
										<div class="cart-quantity">
											<div class="cart-plus-minus-button single-qty-btn">
												<input class="cart-plus-minus sing-pro-qty" type="text" name="soluong" min="1" value="1">
											</div>
										</div>
									</div>
									<div class="single-product-add-cart">
										<table>
										<tr>
											<td>
												<input type="submit" name="addtocart" class="add-cart-text" title="Add to cart" value="Thêm vào giỏ hàng">
											</td>
											<td>
													<form method="post" action="">
														<input type="hidden" name="product_id" value="<?php $result_detail['spId'] ?>">
														<?php 
														$login_check= session::get('customer_login');
														if($login_check==false){
															echo "";
														}
														else{?>
														<div class="single-product-add-cart">
															<td width="50"></td>
																<td>
																	<input type="submit" name="wishlist" class="add-cart-text"  value="Thêm vào yêu thích">
																</td>
															</tr>
														</div>
														<?php } ?>														
														
													</form>
											</td>
										</tr>	
										
										</table>
										
										
									</div>
									
									<?php 
										if (isset($addtocart)) {
											echo "<script type='text/javascript'>alert('$addtocart');</script>";
										}
										?>
									<?php 
										if (isset($insert_wishlist)) { ?>
											<br><p style="padding-left: 120px; font-size: 18px; " ><?php echo $insert_wishlist; ?></p>
									<?php	}
									?>
								</form>
							

								</div>
							</div>
						</div>
						<?php }} ?>
						<!-- SINGLE-PRODUCT-DESCRIPTION END -->
						
						<div class="binhluan">
							<div class="row">
								<div class="col-lg-12">
									
									<h5 style="font-size: 22px;">Bình Luận</h5>
									<p style="color:blue;"><?php 
									if (isset($binhluan)) {
										echo $binhluan;
									}?></p>
									<table>
									<tr>
										<th width="150px">Tên</th>
										<th width="500px">Bình luận</th>
										<th>Hoạt động</th>
									</tr>
									<?php
									$cusid = session::get('customer_id');
									$getcmt=$cs->showcmt($id);
										if($getcmt){
											while($result=$getcmt->fetch_assoc()){
												    	if($result['nguoibl']==$cusid){
									?>	

									<tr>
										<td><?php echo $result['name']; ?></td>
										<td><?php echo $result['binhluan'];?></td>
										<td>
											<a onclick="return confirm('Chắc chắn xóa')" href="single-product.php?delcmtid=<?php echo $result['comment_id'];?>&proid=<?php echo $id; ?>" class="cart_quantity_delete" title="Delete"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
								<?php 
									}else{ ?>
												  <tr>
										<td><?php echo $result['name']; ?></td>
										<td><?php echo $result['binhluan'];?></td>
										<td>
										</td>
									</tr>  	
									<?php			    	}
										}} ?></table>
									<form action="" method="post">
										<p><input type="hidden" name="product_id_binhluan" value="<?php echo $id; ?>" ></p>
										<?php 
											$id = session::get('customer_id');
											$getcs=$cs->show_customers($id);
											if($getcs){
												while($result=$getcs->fetch_assoc()){
										 ?>
										<p><?php echo $result['name']; ?></p><?php }} ?>
										<p><textarea rows="3" style="resize: none;" class="form-control" name="binhluan" placeholder="Nhập bình luận ...."></textarea></p>
										<p><input type="submit" class="add-cart-text" value="Gửi" name="binhluan_submit"></p>
									</form>
								</div>
							</div>
						</div>

						<br><br>

						<!-- RELATED-PRODUCTS-AREA START -->
						
						<!-- RELATED-PRODUCTS-AREA END -->
					</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="left-title-area">
									<h2 class="left-title">Sản phẩm liên quan</h2>
								</div>	
							</div>
							<div class="related-product-area featured-products-area">
								<div class="col-sm-12">
									<div class=" row">
										<!-- RELATED-CAROUSEL START -->
										<div class="related-product">
											<!-- SINGLE-PRODUCT-ITEM START -->
											<?php 
												$getproductrelated = $product->getproduct_related($id);
												if($getproductrelated){
										                    while($result = $getproductrelated->fetch_assoc()){
											?>
											<div class="item">
												<div class="single-product-item">
													<div class="product-image">
														<a href="single-product.php?proid=<?php echo $result['spId']; ?>"><img src="admin/upload/<?php echo $result['hinhanh']; ?>" alt="product-image" /></a>
													</div>
													<div class="product-info">
														<a href="#"><?php echo $result['tensp']; ?></a>
														<div class="price-box">
															<span class="price"><?php echo $result['giasp']; ?></span>
														</div>
													</div>
												</div>							
											</div>
										<?php }}?>
											<!-- SINGLE-PRODUCT-ITEM END -->								
										</div>
										<!-- RELATED-CAROUSEL END -->
									</div>	
								</div>
							</div>	
						</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<?php include 'inc/footer.php'; ?>