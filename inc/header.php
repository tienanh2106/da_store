<?php 
    include_once 'lib/session.php';
    Session::init();
 ?>
 <?php 
	include_once ('lib/database.php');
	include_once ('helpers/format.php');
	spl_autoload_register(function($classname){
		include_once "classes/".$classname.".php";
	});
	$db= new Database();
	$fm = new Format();
	$ct = new cart();
    $brand = new brand();
	$mxh = new mxh();
	$product = new sanpham();
	$cat = new category();
	$cs = new customer();
	$ship = new ship();
?>

<!doctype html>

    
<head> <meta charset="utf-8"> <meta http-equiv="x-ua-compatible"
content="ie=edge"> <title>Home</title> <meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="img/logoda.png">
		
		<!-- FONTS
		============================================ -->	
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/font-awesome.min.css">
   		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap" rel="stylesheet">
		
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="css/animate.css">			
		
		<!-- FANCYBOX CSS
		============================================ -->			
        <link rel="stylesheet" href="css/jquery.fancybox.css">	
		
		<!-- BXSLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="css/jquery.bxslider.css">			
				
		<!-- MEANMENU CSS
		============================================ -->			
        <link rel="stylesheet" href="css/meanmenu.min.css">	
		
		<!-- JQUERY-UI-SLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="css/jquery-ui-slider.css">		
		
		<!-- NIVO SLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="css/nivo-slider.css">
		
		<!-- OWL CAROUSEL CSS 	
		============================================ -->	
        <link rel="stylesheet" href="css/owl.carousel.css">
		
		<!-- OWL CAROUSEL THEME CSS 	
		============================================ -->	
         <link rel="stylesheet" href="css/owl.theme.css">
		
		<!-- BOOTSTRAP CSS 
		============================================ -->	
        <link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- FONT AWESOME CSS 
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		
		<!-- NORMALIZE CSS 
		============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
		
		<!-- MAIN CSS 
		============================================ -->
        <link rel="stylesheet" href="css/main.css">
		
		<!-- STYLE CSS 
		============================================ -->
        <link rel="stylesheet" href="style.css">
		
		<!-- RESPONSIVE CSS 
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
		
		<!-- IE CSS 
		============================================ -->
        <link rel="stylesheet" href="css/ie.css">		
		
		<!-- MODERNIZR JS 
		============================================ -->
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body class="index-2">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		
		<!-- HEADER-TOP START -->
		<div class="header-top">
			<div class="container">
				<div class="row">
					
					<!-- HEADER-LEFT-MENU END -->
					<!-- HEADER-RIGHT-MENU START -->
					<?php
						if(isset($_GET['csid'])){
							$ct->delete_all_product_cart();
							session::destroy();
						}
					 ?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float: right;">
						<div class="header-right-menu">
							<nav>
								<ul class="list-inline">
									<?php 
										$login_check= session::get('customer_login');
										if($login_check==false){
											?>
											<li><a href="login.php">Đăng nhập</a></li>
											<?php
										}
										else{
											$csid = session::get('customer_id');
											?>
											<li>Chào <?php echo session::get('customer_name'); ?></li>
											<li><a href="?csid='<?php echo $csid;?>'">Đăng xuất</a></li>
											<?php
											$checklv = $cs->show_customers($csid);
											if($checklv){
												while($result=$checklv->fetch_assoc()){
													if($result['lv']!=0){?>
														<li><a href="admin/index.php">Trang admin</a></li>
													<?php }
												}
											}
										}
									?>
									
								</ul>									
							</nav>
						</div>
					</div>
					<!-- HEADER-RIGHT-MENU END -->
				</div>
			</div>
		</div>
		<!-- HEADER-TOP END -->
			<!-- HEADER-MIDDLE START -->
		<section class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<!-- LOGO START -->
						<div class="logo">
							<a href="index.php"><img src="anhdongho/logo1.png" alt="logo" /></a>
						</div>
						<!-- LOGO END -->
						<!-- HEADER-RIGHT-CALLUS START -->
						<div class="header-right-callus">
							<h3 style="padding-top: 12px;font-size: 20px; color: #fff; background: #3a3d42;width: 120px; height: 42px;">0975243861</h3>
						</div>
						<!-- HEADER-RIGHT-CALLUS END -->
						<!-- CATEGORYS-PRODUCT-SEARCH START --><!--  -->
						<div class="categorys-product-search">
							<form action="search.php" method="post" class="search-form-cat">
								<div class="search-product form-group">
									
									<!-- <?php
										  if($_SERVER['REQUEST_METHOD']=='POST'){
										        $tukhoa = $_POST['tukhoa'];
										        
										    }
										 ?> -->
									<input type="text" class="" style="width: 480px; height:40px;" name="tukhoa" value="<?php 
									if(isset($tukhoa)){
									echo $tukhoa ;} ?>" placeholder="Tìm kiếm ... " />
									<button class="search-button" value="Tìm Kiếm" name="timkiem" type="submit">
										<i class="fa fa-search"></i>
									</button>									 
								</div>
							</form>
						</div>
						<!-- CATEGORYS-PRODUCT-SEARCH END -->
					</div>
				</div>
			</div>
		</section>
		<!-- HEADER-MIDDLE END -->