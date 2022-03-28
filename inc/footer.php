<!-- BRAND-CLIENT-AREA START -->
		<section class="brand-client-area">
			<div class="container">
				<div class="row">
					<!-- BRAND-CLIENT-ROW START -->
					<div class="brand-client-row">
						<div class="center-title-area">
							<h2 class="center-title">Thương hiệu</h2>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<!-- CLIENT-CAROUSEL START -->
								<div class="client-carousel">
									<!-- CLIENT-SINGLE START -->
									<?php 
                        $show_brand = $brand->show_brand();
                        if($show_brand){
                            $i = 0;
                            while($result = $show_brand->fetch_assoc()){ 
                                $i++;
                                
                        ?>
									<div class="item">
										<div class="single-client">
											<a href="sanpham2.php?brandid=<?php echo $result['brandid']; ?>">
												<img src="admin/upload/<?php echo $result['brandImg']; ?>" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->
										<?php }} ?>							
								</div>
								<!-- CLIENT-CAROUSEL END -->
							</div>
						</div>
					</div>
					<!-- BRAND-CLIENT-ROW END -->
				</div>
			</div>
		</section>
		<!-- BRAND-CLIENT-AREA END -->
<!-- COMPANY-FACALITY START -->
		<section class="company-facality">
			<div class="container">
				<div class="row">
					<div class="company-facality-row">
						<!-- SINGLE-FACALITY START -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="single-facality">
								<div class="facality-icon">
									<i class="fa fa-rocket"></i>
								</div>
								<div class="facality-text">
									<h3 class="facality-heading-text">Vận chuyển nhanh</h3>
									<span>Trong nội thành</span>
								</div>
							</div>
						</div>
						<!-- SINGLE-FACALITY END -->
						<!-- SINGLE-FACALITY START -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="single-facality">
								<div class="facality-icon">
									<i class="fa fa-umbrella"></i>
								</div>
								<div class="facality-text">
									<h3 class="facality-heading-text">Hỗ trợ 24/7</h3>
									<span>Hỗ trợ trực tuyến</span>
								</div>
							</div>
						</div>
						<!-- SINGLE-FACALITY END -->
						<!-- SINGLE-FACALITY START -->						
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="single-facality">
								<div class="facality-icon">
									<i class="fa fa-calendar"></i>
								</div>
								<div class="facality-text">
									<h3 class="facality-heading-text">Cập nhật hàng ngày</h3>
									<span>Thông tin mới nhất</span>
								</div>
							</div>
						</div>
						<!-- SINGLE-FACALITY END -->
						<!-- SINGLE-FACALITY START -->						
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="single-facality">
								<div class="facality-icon">
									<i class="fa fa-refresh"></i>
								</div>
								<div class="facality-text">
									<h3 class="facality-heading-text">Đảm bảo hoàn tiền</h3>
									<span>Hoàn tiền trong 30 ngày</span>
								</div>
							</div>
						</div>		
						<!-- SINGLE-FACALITY END -->					
					</div>
				</div>
			</div>
		</section>
		<!-- COMPANY-FACALITY END -->
		<!-- FOOTER-TOP-AREA START -->
		<section class="footer-top-area">
			<div class="container">
				<div class="footer-top-container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
							<!-- FOOTER-TOP-LEFT START -->
							<div class="footer-top-left">
								<!-- NEWSLETTER-AREA START -->
								<div class="newsletter-area">
									<h2>Bản tin</h2>
									<p>Đăng ký danh sách gửi thư của chúng tôi để nhận thông tin cập nhật về hàng mới, ưu đãi đặc biệt và thông tin giảm giá khác.</p>
									<form action="#">
										<div class="form-group newsletter-form-group">
										  <input type="text" class="form-control newsletter-form" placeholder="Nhập email của bạn">
										  <input type="submit" class="newsletter-btn" name="submit" value="Đăng ký " />
										</div>
									</form>
								</div>
								<!-- NEWSLETTER-AREA END -->
								
								
							</div>
							<!-- FOOTER-TOP-LEFT END -->
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
							<!-- FOOTER-TOP-RIGHT-1 START -->
							<div class="footer-top-right-1">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 hidden-sm">
										<!-- STATICBLOCK START -->
										<div class="staticblock">
											<h2>follow us</h2>
											<ul class="flow-us-link">
												<?php
								                $showmxh = $mxh->showmxh();
								                if($showmxh){
								                    while($result = $showmxh->fetch_assoc()){  ?>
												<li><a href="<?php echo $result['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
												<li><a href="<?php echo $result['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
												
												<li><a href="mailto:<?php echo $result['google'] ?>"><i class="fa fa-google-plus"></i></a></li> <?php }} ?>
											</ul>
										</div>
										<!-- STATICBLOCK END -->
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<!-- STORE-INFORMATION START -->
										<div class="Store-Information">
											<h2>Store Information</h2>
											<ul>
												<li>
													<div class="info-lefticon">
														<i class="fa fa-map-marker"></i>
													</div>
													<div class="info-text">
														<p>Số 298 Đ. Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội</p>
													</div>
												</li>
												<li>
													<div class="info-lefticon">
														<i class="fa fa-phone"></i>
													</div>
													<div class="info-text call-lh">
														<p>Số điện thoại : 0975-243-861</p>
													</div>
												</li>
												<li>
													<div class="info-lefticon">
														<i class="fa fa-envelope-o"></i>
													</div>
													<div class="info-text">
														<?php
										                $showmxh = $mxh->showmxh();
										                if($showmxh){
										                    while($result = $showmxh->fetch_assoc()){  ?>
														<p>Email : <a href="mailto:<?php echo $result['google'] ?>"><i class="fa fa-angle-double-right"></i><?php echo $result['google'] ?></a></p><?php }} ?>
													</div>
												</li>
											</ul>
										</div>
										<!-- STORE-INFORMATION END -->
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										
										<!-- GOOGLE-MAP-AREA START -->
										<div class="google-map-area">
											<div class="google-map">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.473663080212!2d105.73291275105164!3d21.053735992230983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1642044631145!5m2!1svi!2s" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
											</div>
										</div>
										<!-- GOOGLE-MAP-AREA END -->
											
									</div>
								</div>
							</div>
							<!-- FOOTER-TOP-RIGHT-1 END -->
							<div class="footer-top-right-2">
								<div class="row">
									
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- FOOTER-TOP-AREA END -->
		
		<!-- JS 
		===============================================-->
		<!-- jquery js -->
		<script src="js/vendor/jquery-1.11.3.min.js"></script>
		
		<!-- fancybox js -->
        <script src="js/jquery.fancybox.js"></script>
		
		<!-- bxslider js -->
        <script src="js/jquery.bxslider.min.js"></script>
		
		<!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		
		<!-- owl carousel js -->
        <script src="js/owl.carousel.min.js"></script>
		
		<!-- nivo slider js -->
        <script src="js/jquery.nivo.slider.js"></script>
		
		<!-- jqueryui js -->
        <script src="js/jqueryui.js"></script>
		
		<!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
		
		<!-- wow js -->
        <script src="js/wow.js"></script>		
		<script>
			new WOW().init();
		</script>

		<!-- main js -->
        <script src="js/main.js"></script>
    </body>


</html>