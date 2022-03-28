<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; ?>	
<section class="main-content-section">
	<div class="container">	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<br>
			<h2 class="page-title">THÔNG TIN CÁ NHÂN</h2>
		</div>
	
	<form action="" method="post">			
<table border="1" width="1100"  height="300"  style="padding:auto;margin: auto; ">
	<?php 
	$id = session::get('customer_id');
	$get_customers=$cs->show_customers($id);
	if ($get_customers){
		while($result = $get_customers->fetch_assoc()){
			?>
					<tr >
						<td>Tên</td>
						
						<td align="center"><?php echo $result['name']; ?></td>
					</tr>
					<tr>
						<td>Giới Tính</td>
						
						<td align="center"><?php 
						if ($result['gioitinh']==1) {
							echo "Nam";
						}else {echo "Nữ" ;} 
					?></td>
					</tr>
					<tr>
						<td>Địa Chỉ</td>
						
						<td align="center"><?php echo $result['address']; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						
						<td align="center"><?php echo $result['email']; ?></td>
					</tr>
					<tr>
						<td>Số Điện Thoại</td>
						<td align="center"><?php echo $result['sdt']; ?></td>
					</tr>
					<!-- <tr>
						<td>password</td>
						<td align="center"><?php echo $result['password']; ?></td>
					</tr> -->
					<tr>
						<td colspan="2" align="center" style="font-size:20px;"><a href="edit_frofile.php">Cập nhật</a></td>
					</tr>
					
				<?php
					}
				}
				?>
				</table>
			</form>
			</div>
	</div>
</section>
<?php include 'inc/footer.php'; ?>