<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; ?>
<?php  
$id = session::get('customer_id');
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['save'])){
 		$update_cus=$cs->update_customers($_POST,$id);
    }
?>

<form action="" method="post">
	<br><h1 style=" padding-left: 60px;">CẬP NHẬT THÔNG TIN CÁ NHÂN</h1><br>	
<table border="1" width="1100"  height="300"  style="padding:auto;margin: auto; ">
	<?php 
	$id = session::get('customer_id');
	$get_customers=$cs->show_customers($id);
	if ($get_customers){
		while($result = $get_customers->fetch_assoc()){
			?>
					<tr>
						<td>Tên</td>
						<td align="center"><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
					</tr>
					<tr>
						<td>Giới Tính</td>
						<td align="center" >
						<select id="select" name="gioitinh">
                         
                            <?php 
                                if($result['gioitinh']==1){
                            ?>
                            <option selected value="1">Nam</option>
                            <option value="2">Nữ</option>
                        <?php }
                            else{
                                ?>
                                <option value="1">Nam</option>
                            <option selected value="2">Nữ</option>
                        <?php }?>
                        </select>
						</td>
						
					</tr>
					<tr>
						<td>Địa Chỉ</td>
						<td align="center"><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
						
					</tr>
					<tr>
						<td>Email</td>
						<td align="center"><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>
						
					</tr>
					<tr>
						<td>Số Điện Thoại</td>
						<td align="center"><input type="text" name="sdt" value="<?php echo $result['sdt']; ?>"></td>
				
					</tr>
					<tr>
						
						<td colspan="2" align="center" style="font-size:25px;"><input type="submit" name="save" value="Update"></td>
					</tr>
					
				<?php
					}
				}
				?>
				<tr align="center" style="color:red;">

					<?php if (isset($update_cus)) {
					echo "<script>window.location = 'my_account_detail.php'</script>";
				}?>

					</tr>
				</table>

			</form>
<?php include 'inc/footer.php'; ?>