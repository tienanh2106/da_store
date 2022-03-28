<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; ?>
<?php 
	if(!isset($_GET['proid']) || $_GET['proid']==null){
        echo "";
    }
    else{
    	$customer_id=session::get('customer_id');
        $proid=$_GET['proid'];
        $del_list=$product->del_list($proid,$customer_id);
    }
    if(isset($_GET['proid'])){
    	$id = $_GET['proid'];
    	$soluong = 1;
        $addtocart = $ct->addtocart($soluong,$id);
    }
    if(isset($_GET['delwish'])){
    	$proid = $_GET['delwish'];
    	$delwishlist = $ct->delwish($proid,$customer_id);
    }
  ?>




 <?php 
		if (isset($addtocart)) {
		echo "<script type='text/javascript'>alert('$addtocart');</script>";
		}
?>
<section class="main-content-section">
	<div class="container">	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<br>
			<h2 class="page-title">Danh Sách Yêu Thích</h2>
		</div>
	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Danh sách sản phẩm</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleproduct.css">
</head>
<body>
<div class="box-container1">

		<?php $customer_id=session::get('customer_id');
	$get_wishlist=$product->get_wishlist($customer_id);
	if ($get_wishlist) {
		$i=0;
		while ($result=$get_wishlist->fetch_assoc()) {
				$i++;
				?>
		<div class="box1">
			<div class="image1">
				<img src="admin/upload/<?php echo $result['image']; ?>" alt="product-image" width="200">
			</div>
			<div class="info">
				<h3 class="title1"><?php echo $result['tensp']; ?></h3>
				<div class="subinfo">
					<div class="price1"><?php echo $fm->Format_currency($result['gia']); ?> VNĐ</div>
				</div>
			</div>
		<div class="overlay">
			<a href="listproduct.php?proid=<?php echo $result['spId']; ?>" style="--i:1;" class="fas fa-shopping-cart"></a>
			<a href="single-product.php?proid=<?php echo $result['spId']; ?>" style="--i:2;" class="fas fa-search"></a>
			<a onclick="return confirm('Chắc Chắn Xóa')" href="?delwish=<?php echo $result['spId'];?>" style="--i:3;" class="fa fa-trash-o"> </a>
		</div>
	</div>

	<?php }}?>
</div>	
</div>
	</div>
</section>	
<?php 
    include 'inc/footer.php';
    
 ?>
<!-- footer section ends -->


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>	
