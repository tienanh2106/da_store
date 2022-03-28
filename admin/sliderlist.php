<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/sanpham.php';?>
<?php 
$product=new sanpham();
if (isset($_GET['del_slider_type'])&&isset($_GET['type'])) {
	$id=$_GET['del_slider_type'];
	$type=$_GET['type'];
	$update_type_slider=$product->update_type_slider($id,$type);
}
if (isset($_GET['del_slider'])) {
	$id=$_GET['del_slider'];
	$delete_type_slider=$product->delete_type_slider($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên Slider</th>
					<th>Slider Image</th>
					<th>Vị trí</th>
					<th style="text-align: center;">Thao Tác</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				$product=new sanpham();
				$get_slider=$product->show_slider();
				if ($get_slider) {
					$i=0;
					while ($result_slider=$get_slider->fetch_assoc()) { $i++;
					?>

				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result_slider['slider_name']; ?></td>
					<td><img style=" display: block;
									  max-width:100px;
									  max-height:95px;
									  width: auto;
									  height: auto;
									  " src="upload/<?php echo $result_slider['slider_image']; ?>" alt="<?php echo $result_slider['slider_name']; ?>"  /></td>
					<td><?php echo $result_slider['vitri']; ?></td>			  				
				<td align="center">
					<?php if ($result_slider['type']==1) { ?>
						<a href="?del_slider_type=<?php echo $result_slider['slider_id'];?>&type=0">TẮT</a>
						<?php } ?>
					<?php if ($result_slider['type']==0) { ?>
						<a href="?del_slider_type=<?php echo $result_slider['slider_id'];?>&type=1">BẬT</a>	
					<?php }?> 
					<span>||</span>
					<a href="slider_edit.php?update_slider=<?php echo $result_slider['slider_id'];?>" >SỬA</a> 
				</td>
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
