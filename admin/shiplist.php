<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/ship.php';?>
<?php 
    $ship = new ship();
    if(isset($_GET['delid'])){
        $id=$_GET['delid'];
        $delship = $ship->delete_ship($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách thương hiệu</h2>
                <div class="block">    
                <?php 
                	if(isset($delbrand)){
                		echo $delbrand;
                	}
                ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên thương hiệu</th>
							<th>Hình ảnh</th>
							<th>Mô tả</th>
							<th>Giá</th>
							<th>Hoạt động</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show_ship = $ship->show_ship();
						if($show_ship){
							$i = 0;
							while($result = $show_ship->fetch_assoc()){
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['shipname'] ?></td>
							<td><img src="upload/<?php echo $result['shipimg']; ?>" width=60px></td>
							<td><?php echo $result['shipmota'] ?></td>
							<td><?php echo $result['shipgia'] ?></td>
							<td><a href="shipedit.php?shipid=<?php echo $result['shipid'] ?>">Sửa</a> ||
							<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?delid=<?php echo $result['shipid'] ?>">Xóa</a></td>
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

