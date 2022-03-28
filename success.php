<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; ?>
<?php 
if (isset($_GET['orderid'])&&$_GET['orderid']=='order') {
	$customer_id=session::get('customer_id');
	$insert_order=$ct->insert_order($customer_id);
	$delcart=$ct->delete_all_product_cart();
	echo "<script>window.location = 'success.php'</script>";	
}

?>
<style type="text/css">
	.checkout{
		text-align: center;
	}
	.checkout h3{
		color:red; font-size: 25px;
	}
	.checkout p{
		font-size:20px;
	}
</style>
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<br>
				<div class="checkout">
					<h3>ĐẶT HÀNG THÀNH CÔNG</h3>
					<p>Xem sản phẩm đã mua </p>
					<a href="order_details.php" class="add-cart-text " style="text-align:center;">XEM</a>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<?php include 'inc/footer.php'; ?>