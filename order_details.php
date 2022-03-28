<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; 

?>

<?php  
$customer_id=session::get('customer_id');
$get_card_ordered=$ct->get_card_ordered($customer_id);
if ($login_check==false) {
	echo "<script>window.location = 'login.php'</script>";
}
$ct=new Cart();
if(isset($_GET['confirm_id'])&&isset($_GET['time'])&&isset($_GET['price']) ){
       $id=$_GET['confirm_id'];
       $time=$_GET['time'];
       $price=$_GET['price'];
       $shifted_confirm=$ct->shifted_confirm($id,$time,$price);
    }
// if(isset($_GET['confirm_id'])&&isset($_GET['time'])&&isset($_GET['price']) ){
//        $id=$_GET['confirm_id'];
//        $time=$_GET['time'];
//        $price=$_GET['price'];
//        $del_soluong=$ct->del_soluong($id,$time,$price);
//     }
if(isset($_GET['del_order_id']) ){
       $id=$_GET['del_order_id'];
       $time=$_GET['time'];
       $price=$_GET['price'];
       $del_order_id=$ct->del_order_id($id,$time,$price);
    }
?>	

<form action="" method="post">
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<h2 style="font-size: 30px;">Hóa đơn của bạn</h2>
							<?php 
								if (isset($shifted_confirm)) {
									echo $shifted_confirm;
								}
							?>
							<?php 
						 if (isset($del_order_id)) { ?>
						     <h1 style="font-size: 18px; color:blue;">Hủy Đơn Thành Công</h1>
						<?php      }?> 
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<!-- CART TABLE_BLOCK START -->
						<div class="table-responsive">
							<!-- TABLE START -->
							<table class="table table-bordered" id="cart-summary">
								<!-- TABLE HEADER START -->
								<thead>
									<tr>
										<th class="cart-product">Sản phẩm</th>
										<th class="cart-description">Mô tả</th>
										<th style="width: 150px; text-align: center;">Ngày đặt</th>
										
										<th class="cart-unit text-right" style="text-align: center;">Giá</th>
										<th class="cart_quantity text-center">Số lượng</th>
										<th class="cart_quantity text-center">Phí vận chuyển</th>
										<th class="cart-total text-right">Tổng</th>
										<th style="width: 150px; text-align: center;">Tình Trạng</th>
										<th style="width: 100px; text-align: center;">Thao tác</th>
									</tr>
								</thead>
								<!-- TABLE HEADER END -->
								<!-- TABLE BODY START --><?php 
									$tienphaitra=0;
									if (isset($get_card_ordered)) {
										while ($result=$get_card_ordered->fetch_assoc()) {
									 ?>
									
									<!-- SINGLE CART_ITEM START -->
									<tr>
										<td class="cart-product">
											<a href="#">
												<img alt="Faded" src="admin/upload/<?php echo $result['image']; ?>">
											</a>
										</td>
										<td class="cart-description">
											<p class="product-name"><?php echo $result['tensp']; ?></p>
										</td>
										<td class="cart_quantity text-center">
											<span><?php echo $result['date_order']; ?></span>
										</td>
										
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price"><?php echo $fm->Format_currency($giasp=$result['giasp']) ." VND"; ?></li>
											</ul>
										</td>
										<td class="cart_quantity text-center">
											<span><?php $soluong= $result['soluong_order']; echo $soluong; ?></span>
										</td>
										<td class="cart_quantity text-center">
											<span><?php $shipgia= $result['shipgia']; echo $shipgia; ?></span>
										</td>
										<td class="cart-total">
											<span class="price"><?php $tong= (float)$giasp*$soluong+$shipgia;echo $fm->Format_currency($tong); ?></span>
										</td>
										<td class="cart_quantity text-center">
											<?php if($result['status']=='0') {?> <span style="font-size:14px;"><?php echo 'Chờ Xử Lý'; ?></span><?php }  ?>
											<?php if($result['status']=='1') {?> <span style="font-size:14px;"><?php echo 'Đang giao hàng';?></span><?php }  ?>
											<?php if($result['status']=='2') {?> <span style="font-size:14px;"><?php echo 'Đã nhận hàng';?></span><?php }  ?>
											<?php if($result['status']=='3') {?> <span style="font-size:14px;"><?php echo 'Đã hủy đơn';?></span><?php }  ?>
										</td>
										
											<?php  if ($result['status']=='0') { ?>
											<td align="center">
												<p><a style="font-size:12px;" href="order_details.php?del_order_id=<?php echo $result['order_id'];?>&price=<?php echo $result['gia']; ?>&time=<?php echo $result['date_order']; ?>"><?php echo 'HỦY ĐƠN';?></a></p>
											</td> 
											
											<?php }
											elseif ($result['status']=='1')  { ?> 
											<td align="center">
												<p><a style="font-size:12px;" href="thankiu.php?confirm_id=<?php echo $customer_id;?>&price=<?php echo $result['gia'];?>&time=<?php echo $result['date_order'];?>"><?php echo 'Đã Nhận hàng';?></a></p>
												<p><a style="font-size:12px;" onclick="return confirm('Chắc Chắn Xóa')" href="order_details.php?del_order_id=<?php echo $result['order_id'];?>&price=<?php echo $result['gia']; ?>&time=<?php echo $result['date_order']; ?>"><?php echo 'HỦY ĐƠN';?></a></p> 
												
											</td>
											<?php } 
											elseif($result['status']=='2') {?>
											<td style="font-size:12px; " align="center" width="100">
												<?php echo 'HOÀN THÀNH'; ?>
											</td>
											<?php  }
											else {?>
											<td style="font-size:12px; " align="center" width="100">
												<?php echo 'ĐÃ HỦY ĐƠN'; ?>
											</td>
											<?php  }?>
	
									</tr>
									<!-- SINGLE CART_ITEM END -->
									
									
								
								<?php $tienphaitra +=$tong;  }} ?>
								<!-- TABLE BODY END -->
								<!-- TABLE FOOTER START -->
								<tfoot>
									<tr>
										<td class="total-price-container text-right" colspan="5">
											<span>Tiền phải trả</span>
										</td>
										<td id="total-price-container" class="price" colspan="4">
											<span id="total-price"><?php 
											$thanhtoan=$tienphaitra;
											echo $fm->Format_currency($thanhtoan)." VND"; ?></span>
										</td>
									</tr>
								</tfoot>
								<!-- TABLE FOOTER END -->								
							</table>
							<!-- TABLE END -->
						</div>
						<!-- CART TABLE_BLOCK END -->
					</div>
					
					
				</div>
			</div>
		</section>
		</form>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>

<?php include 'inc/footer.php'; ?>