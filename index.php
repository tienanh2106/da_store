
<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php';
	if(isset($_GET['proid'])){
		$soluong = 1;$id=$_GET['proid'];
        $addtocart = $ct->addtocart($soluong,$id);
    }
    $login_check= session::get('customer_login');
    if(isset($_POST['proid2'])&&$login_check!=false){
    	$id = $_GET['proid2'];
    	$customer_id=session::get('customer_id');
        $insert_wishlist = $product->insert_wishlist($id,$customer_id);
        if($insert_wishlist){
        	echo "<script type='text/javascript'>alert('$insert_wishlist');</script> ";
        }
    }

        ?>	
  <body>
  <head>
  	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/font-awesome.min.css">
   		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap" rel="stylesheet">
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  	<link rel="stylesheet" type="text/css" href="css/bannerstyle.css">
  	
  </head>
<section class="home" id="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box" style="background: url(logothuonghieu/bannerskagen.png);">
                <div class="content">
                    <h3>đồng hồ Skagen</h3>
                    <p>đến từ Đan Mạch</p>
                    <div class="button">
                        <a href="sanpham2.php?brandid=1" class="btn1">shop now</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box" style="background: url(logothuonghieu/bannermk.png);">
                <div class="content">
                    <h3>Đồng hồ Michael Kors</h3>
                    <p>thương hiệu đồng hồ thời trang hiện đại được yêu thích</p>
                    <div class="button">
                        <a href="sanpham2.php?brandid=7" class="btn1">shop now</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box" style="background: url(logothuonghieu/bannerfossil.png);">
                <div class="content">
                    <h3>Đồng hồ Fossil</h3>
                    <p>phụ kiện thời trang đang được yêu thích hiện nay</p>
                    <div class="button">
                        <a href="sanpham2.php?brandid=3" class="btn1">shop now</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>
</body>
		<!-- MAIN-MENU-AREA END -->
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<!-- LEFT-SIDEBAR START -->
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!-- SIDEBAR-LEFT-ADD START -->
						<?php  
									$get_slider=$product->show_slider();
									if ($get_slider) {
									while ($result_slider=$get_slider->fetch_assoc()) {
										if ($result_slider['type']==1) {
											if($result_slider['vitri']==1){
										?>
						<div class="single-left-sidebar sidebar-left-add">
							<div class="sidebar-left zoom-img">
								<a href="sanpham2.php?brandid=6"><img src="admin/upload/<?php echo $result_slider['slider_image']; ?>" alt="sidebar left" /></a>
							</div>	
						</div><?php }}}} ?>
						<?php  
									$get_slider=$product->show_slider();
									if ($get_slider) {
									while ($result_slider=$get_slider->fetch_assoc()) {
										if ($result_slider['type']==1) {
											if($result_slider['vitri']==2){
										?>
						<div class="single-left-sidebar sidebar-left-add">
							<div class="sidebar-left zoom-img">
								<a href="sanpham2.php?brandid=5"><img src="admin/upload/<?php echo $result_slider['slider_image']; ?>" alt="sidebar left" /></a>
							</div>	
						</div><?php }}}} ?>
						<!-- SIDEBAR-LEFT-ADD END -->
						
					</div>	
					<!-- LEFT-SIDEBAR END -->
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="new-product-area">
									<div class="left-title-area">
										<h2 class="left-title">Sản phẩm mới</h2>
									</div>						
									<div class="row">
										<div class="col-xs-12">
											<div class="row">
												<!-- HOME2-NEW-PRO-CAROUSEL START -->
												<div class="home2-new-pro-carousel">
													<!-- NEW-PRODUCT SINGLE ITEM START -->
													<?php 
										                $getproductnew = $product->getproduct_new();
										                if($getproductnew){
										                    while($result = $getproductnew->fetch_assoc()){
										            ?>
													<div class="item">
														<div class="new-product">
															<div class="single-product-item">
																<div class="product-image">
																	<a href="single-product.php?proid=<?php echo $result['spId']; ?>"><img src="admin/upload/<?php echo $result['hinhanh']; ?>" alt="product-image"  /></a>
																	<a href="#" class="new-mark-box">new</a>
																	<div class="overlay-content">
																		<ul>
																			<li><a href="?proid=<?php echo $result['spId']; ?>" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
																			<li><a href="single-product.php?proid=<?php echo $result['spId']; ?>" title="Quick view"><i class="fa fa-search"></i></a></li>
																		</ul>
																	</div>
																</div>
																<div class="product-info">
																	<a href="single-product.php?proid=<?php echo $result['spId']; ?>"><?php echo $result['tensp']; ?></a>
																	<div class="price-box">
																		<span class="price"><?php echo $fm->Format_currency($result['giasp']); ?> VNĐ</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<?php }} ?>
													<!-- NEW-PRODUCT SINGLE ITEM END -->
													
												</div>
												<!-- HOME2-NEW-PRO-CAROUSEL END -->
											</div>
										</div>
									</div>
								</div>										
							</div>
							<?php  
									$get_slider=$product->show_slider();
									if ($get_slider) {
									while ($result_slider=$get_slider->fetch_assoc()) {
										if ($result_slider['type']==1) {
											if($result_slider['vitri']==3){
										?>
							<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
								<!-- TOW-COLUMN-ADD START -->
								<div class="tow-column-add zoom-img">
									<a href="sanpham2.php?brandid=3"><img src="admin/upload/<?php echo $result_slider['slider_image']; ?>" alt="shope-add" /></a>
								</div>
								<!-- TOW-COLUMN-ADD END -->
							</div><?php }}}} ?>
							<?php  
									$get_slider=$product->show_slider();
									if ($get_slider) {
									while ($result_slider=$get_slider->fetch_assoc()) {
										if ($result_slider['type']==1) {
											if($result_slider['vitri']==4){
										?>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
								<!-- TOW-COLUMN-ADD START -->
								<div class="one-column-add zoom-img">
									<a href="sanpham2.php?brandid=7"><img src="admin/upload/<?php echo $result_slider['slider_image']; ?>" alt="shope-add" /></a>
								</div>	
								<!-- TOW-COLUMN-ADD END -->
							</div>	<?php }}}} ?>
							<div class="col-xs-12">
								<!-- SALE-PODUCT-AREA START -->
								<div class="sale-poduct-area new-product-area">
									<div class="left-title-area">
										<h2 class="left-title">Nổi bật</h2>
									</div>
									<div class="row">
										<!-- HOME2-SALE-CAROUSEL START -->
										<div class="home2-sale-carousel">
											<!-- NEW-PRODUCT SINGLE ITEM START --><?php 
										                $getproductfeathered = $product->getproduct_feathered();
										                if($getproductfeathered){
										                    while($result = $getproductfeathered->fetch_assoc()){
										            ?>
											<div class="item">
												<div class="new-product">
													<div class="single-product-item">
														<div class="product-image">
															<a href="single-product.php?proid=<?php echo $result['spId']; ?>"><img src="admin/upload/<?php echo $result['hinhanh']; ?>" alt="product-image" /></a>
															
															<div class="overlay-content">
																<ul>
																	<li><a href="?proid=<?php echo $result['spId']; ?>" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
																	<li><a href="single-product.php?proid=<?php echo $result['spId']; ?>" title="Quick view"><i class="fa fa-search"></i></a></li>
																</ul>
															</div>
														</div>
														<div class="product-info">
															
															<a href="single-product.php?proid=<?php echo $result['spId']; ?>"><?php echo $result['tensp']; ?></a>
															<div class="price-box">
																<span class="price"><?php echo $fm->Format_currency($result['giasp']) ; ?> VNĐ</span>
															
															</div>
														</div>
													</div>
												</div>
											</div><?php } } ?>
											<!-- NEW-PRODUCT SINGLE ITEM END -->
											
										</div>
										<!-- HOME2-SALE-CAROUSEL END -->
									</div>
								</div>
								<!-- SALE-PODUCT-AREA end -->
								

							</div>
						</div>
					</div>
						
				</div>
			</div>
		</section>
		
	
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section-full-column">
			<div class="container">
				<div class="row">
					<!-- IMAGE-ADD-AREA START -->
					<div class="image-add-area">
						<?php  
									$get_slider=$product->show_slider();
									if ($get_slider) {
									while ($result_slider=$get_slider->fetch_assoc()) {
										if ($result_slider['type']==1) {
											if($result_slider['vitri']==5){
										?>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
							<!-- SINGLE ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="sanpham2.php?brandid=1"><img src="admin/upload/<?php echo $result_slider['slider_image']; ?>" alt="shope-add" /></a>
							</div>
							<!-- SINGLE ADD END -->
						</div><?php }}}} ?>
						<?php  
									$get_slider=$product->show_slider();
									if ($get_slider) {
									while ($result_slider=$get_slider->fetch_assoc()) {
										if ($result_slider['type']==1) {
											if($result_slider['vitri']==6){
										?>
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
							<!-- SINGLE ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="sanpham2.php?brandid=10"><img src="admin/upload/<?php echo $result_slider['slider_image']; ?>" alt="shope-add" /></a>
							</div>
							<!-- SINGLE ADD END -->
						</div>	<?php }}}} ?>					
					</div>
					<!-- IMAGE-ADD-AREA END -->
				</div>
				
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- LATEST-NEWS-AREA START -->
		
		<!-- LATEST-NEWS-AREA END -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="js/bannerjs.js"></script>	
	
<?php include 'inc/footer.php'; ?>

