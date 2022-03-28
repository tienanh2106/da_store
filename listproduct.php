 <?php 
    include 'inc/header.php';
    include 'inc/mainmenu.php';
    if(isset($_GET['proid'])){
    	$id = $_GET['proid'];
    	$soluong = 1;
        $addtocart = $ct->addtocart($soluong,$id);
    }
 ?>
 <?php 
		if (isset($addtocart)) {
		echo "<script type='text/javascript'>alert('$addtocart');</script>";
		}
?>
<p style="padding-left: 60px;font-size:40px; color:black;">Tất cả sản phẩm</p>
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
		<?php 
                $getproduct = $product->show_sanpham();
                if($getproduct){
                    while($result = $getproduct->fetch_assoc()){
            ?>
		<div class="box1">
			<div class="image1">
				<img src="admin/upload/<?php echo $result['hinhanh']; ?> " width=250px>
			</div>
			<div class="info">
				<h3 class="title1"><?php echo $result['tensp']; ?></h3>
				<h3 class="title1">Số lượng : <?php echo $result['soluong']; ?></h3>
				<div class="subinfo">
					<div class="price1"><?php echo $fm->Format_currency($result['giasp']); ?> VNĐ</div>
				</div>
			</div>
		<div class="overlay">
			<a href="listproduct.php?proid=<?php echo $result['spId']; ?>" style="--i:1;" class="fas fa-shopping-cart"></a>
			<a href="single-product.php?proid=<?php echo $result['spId']; ?>" style="--i:2;" class="fas fa-search"></a>
			
		</div>
	</div>

	<?php }}?>
</div>
		
<?php 
    include 'inc/footer.php';
    
 ?>
<!-- footer section ends -->


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>