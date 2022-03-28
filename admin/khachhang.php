<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';
include '../classes/customer.php';
include_once '../helpers/format.php';
$fm = new Format();

$cs = new customer();
// if(isset($_GET['spId'])){
//         $id=$_GET['spId'];
//         $delsp = $pd->delete_sp($id);
//     }
if(isset($_GET['delid'])){
     $delid=$_GET['delid'];
     $delcus = $cs->delcus($delid);
  }
  if(isset($_GET['updatelv'])){
     $updatelv=$_GET['updatelv'];
     $update = $cs->updatelv($updatelv);

  }
  if(isset($_GET['resetlv'])){
     $resetlv=$_GET['resetlv'];
     $reset = $cs->resetlv($resetlv);
  }
$idadmin = session::get('adminId');
$ktralv = $cs -> show_customers($idadmin);
if($ktralv){
	while($resultadmin = $ktralv->fetch_assoc()){
		$lv = $resultadmin['lv'];
	}
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách người dùng</h2>
        <div class="block"> 
       <?php  if(isset($update)){
     				echo "$update";
     			} 
     			if(isset($reset)){
     				echo "$reset";
     			}
     			if(isset($delcus)){
     				echo "$delcus";
     			}  
     ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên đăng nhập</th>
					<th>Tên khách hàng</th>
					<th>Địa chỉ</th>
					<th>Giới tính</th>
					<th>Email</th>
					<th>SĐT</th>
					<th>Cấp</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=0;
					$showcs = $cs->showcustomers();
					if($showcs){
						while($result= $showcs->fetch_assoc()){
							$i++;
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $result['id']; ?></td>
					<td><?php echo $result['username']; ?></td>
					<td><?php echo $result['name']; ?></td>
					<td><?php echo $result['address']; ?></td>
					<td><?php 
						if($result['gioitinh']==1){
							echo 'Nam';
						}else{
							echo 'Nũ';
						}

					 ?></td>
					 <td><?php echo $result['email']; ?></td>
					 <td><?php echo $result['sdt']; ?></td>
					<td><?php 
						if($result['lv']==0){
							echo 'Khách hàng';
						}else{
							echo 'Admin';
						}

					 ?></td>
					<td>
						<?php if($lv==2){
							if($result['lv']==0){ ?>
						<a onclick="return confirm('Bạn có chắc chắn chuyển nâng tài khoản này thành admin?')" href="?updatelv=<?php echo $result['id']; ?>" >Xét admin</a> || <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?delid=<?php echo $result['id']; ?>">Xóa</a></td>
						<?php } elseif($result['lv']==2){  ?>
						 <?php } else{  ?><a onclick="return confirm('Bạn có chắc chắn muốn chuyển tài khoản này thành khách hàng?')" href="?resetlv=<?php echo $result['id']; ?>" >Xóa admin</a> ||
						<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?delid=<?php echo $result['id']; ?>">Xóa</a></td> <?php } ?> 
						
					<?php } ?>
					<?php if($lv==1){
							if($result['lv']==0){ ?>
						<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?delid=<?php echo $result['id']; ?>">Xóa</a></td>
						 <?php } else{  ?>
						 <?php } ?> 
					<?php } ?>
				</tr>
				<?php }} ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
