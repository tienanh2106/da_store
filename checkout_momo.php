<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; 
if(isset($_GET['shipid'])){
	$shipid = $_GET['shipid'];
}
if (isset($_GET['confirm'])&&$_GET['confirm']=='1') {
	$customer_id=session::get('customer_id');
	$thanhtoan=2;
	$insert_order=$ct->insert_order($customer_id,$shipid,$thanhtoan);
	$delcart=$ct->delete_all_product_cart();
	echo "<script>window.location = 'success.php'</script>";
}
?>

<style type="text/css">
	:root{
    --orange:#ff7800;
    --black:#130f40;
    --light-color:#666;
    --box-shadow:0 .5rem 1.5rem rgba(0,0,0,.1);
    --border:.2rem solid rgba(0,0,0,.1);
    --outline:.1rem solid rgba(0,0,0,.1);
    --outline-hover:.2rem solid var(--black);
}
*{
	font-family: 'Poppins', sans-serif;
}

.btn1{
    margin-top: 1rem;
    display: inline-block;
    padding:.8rem 3rem;
    font-size: 1.7rem;
    border-radius: .5rem;
    border:.2rem solid var(--black);
    color:var(--black);
    cursor: pointer;
    background: none;
}
.btn1:hover{
    background: #ff6600;
    color:#fff;
    letter-spacing: .1rem;
}
	h1{
		text-align: center;
   		 padding-top: 50px;
    	font-size: 50px;
	}
	.momo {
		text-align: center;
	}
	.img >img {
		text-align: center;
	}
	.momo p{
		font-size: 20px;
	}

</style>
<body>
	<div class="momo">
		<h1>Quét để thanh toán</h1>
		<div class="img">
			<img src="logothuonghieu/momo.png">
		</div>
		<p>Sử dụng app momo để thanh toán</p>
		<p>Nội dung chuyển khoản: Số điện thoại đăng kí mua hàng</p>
		<p>Nếu bạn đã thanh toán hay bấm xác nhận</p>
		<a href="?shipid=<?php echo $shipid;?>&confirm=1" class="btn1" style="text-align: center;">Xác nhận</a>
	</div>

</body>
<?php include 'inc/footer.php'; ?>