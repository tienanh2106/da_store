<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';
include '../classes/sanpham.php';
include_once '../helpers/format.php';
$fm = new Format();
$pd = new sanpham();
if(isset($_GET['spId'])){
        $id=$_GET['spId'];
        $delsp = $pd->delete_sp($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block"> 
        <?php 
        	if(isset($delsp)){
        		echo $delsp;
        	}
        ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Mô tả</th>
					<th>Loại</th>
					<th>Số lượng</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=0;
					
					$pdlist = $pd->show_sanpham();
					if($pdlist){
						while($result= $pdlist->fetch_assoc()){
							$i++;
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td width="150"><?php echo $result['tensp']; ?></td>
					<td><?php echo $fm->Format_currency($result['giasp']); ?></td>
					<td><img src="upload/<?php echo $result['hinhanh']; ?>" width=60px></td>
					<td align="center"><?php echo $result['catid']; ?></td>
					<td align="center"><?php echo $result['brandid']; ?></td>
					<td><?php echo $fm->textShorten($result['motasp'],100); ?></td>
					<td><?php 
						if($result['type']==1){
							echo 'Nổi bật';
						}else{
							echo 'Không nổi bật';
						}

					 ?></td>
					 <td align="center"><?php echo $result['soluong']; ?></td>
					 
				
					<td><a href="productedit.php?spId=<?php echo $result['spId']?>" >Sửa</a> || 
						<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?spId=<?php echo $result['spId'];?>">Xóa</a></td>
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
