<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php 
$ct= new cart();
    if(isset($_GET['shiftid']) ){
       $id=$_GET['shiftid'];
       $time=$_GET['time'];
       $price=$_GET['price'];
       $shifted=$ct->shifted($id,$time,$price);
    }
     if(isset($_GET['delid']) ){
       $id=$_GET['delid'];
       $time=$_GET['time'];
       $price=$_GET['price'];
       $del_shifted=$ct->del_shifted($id,$time,$price);
    } 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Đơn hàng</h2>
                <div class="block">    
                <?php 
                if (isset($shifted)) {
                	echo $shifted;
                }

                 ?> 
                 <?php 
                if (isset($del_shifted)) {
                	echo $del_shifted;
                }

                 ?>     
                    <table class="data display datatable" id="example" >
					<thead>
						<tr >
							<th style="font-size:12px;text-align: center;">STT</th>
							<th style="font-size:12px;text-align: center;">Ngày Đặt</th>
							<th style="font-size:12px;text-align: center;">Sản phẩm</th>
							<th style="font-size:12px;text-align: center;">Số Lượng</th>
							<th style="font-size:12px;text-align: center;" >Giá</th>
							<th style="font-size:12px;text-align: center;">ID Người Dùng</th>
							<th style="font-size:12px;text-align: center;">Địa Chỉ</th>
							<th style="font-size:12px;text-align: center;">Thanh toán</th>
							<th style="font-size:12px;text-align: center;">Vận chuyển</th>
							<th style="font-size:12px;text-align: center;">Thao Tác</th>
						</tr>
					</thead>
					<tbody >
						<?php 
						$ct=new cart();
						$fm=new format();
						$get_inbox_cart=$ct->get_inbox_cart();
						if ($get_inbox_cart) {
							$i=0;
							while ($result=$get_inbox_cart->fetch_assoc()) {$i++;
						?>

						<tr class="odd gradeX">
							<td width="50" align="center"><?php echo $i; ?></td>
							<td width="120" align="center"><?php echo $fm->formatdate($result['date_order']); ?></td>
							<td width="280"align="center"><?php echo $result['tensp']; ?></td>
							<td width="100" align="center"><?php echo $result['soluong_order']; ?></td>
							<td width="150" align="center"><?php echo $fm->Format_currency($result['gia']).' VND'; ?></td>
							<td width="110" align="center"><?php echo $result['id']; ?></td>
							<td align="center"><a href="customer.php?customer_id=<?php echo $result['id']; ?>">Xem Địa Chỉ</a></td>
							<?php
								if($result['thanhtoan']==1){
							 ?>
							<td width="150" align="center">Thanh toán khi nhận hàng</td>
						<?php }else{ ?>
							<td width="150" align="center">Thanh toán qua Momo</td><?php } ?>
							<td width="110" align="center"><?php echo $result['shipname']; ?></td>
							<td align="center" width="100">

								<?php 
								if ($result['status']==0) { ?>
									<a style="color:red;" href="?shiftid=<?php echo $result['order_id'];?>&price=<?php echo $result['gia']; ?>&time=<?php echo $result['date_order']; ?>">Chờ Xử Lý</a>		
								<?php } ?>
								<?php 
								if ($result['status']==1) { ?>
									<h1 style="font-size:12px;text-align: center;">Đang giao hàng</h1>	
								 <?php }?>
								<?php 
								if($result['status']==2) { ?> 
									<a style="color:red;" href="?delid=<?php echo $result['order_id'];?>&price=<?php echo $result['gia']; ?>&time=<?php echo $result['date_order']; ?>"> xóa</a> 
								<?php }  ?>
								<?php 
								if($result['status']==3) { ?> 
									<h1 style="font-size:12px;text-align: center;">khách hủy đơn</h1>
									<a style="color:red;" href="?delid=<?php echo $result['order_id'];?>&price=<?php echo $result['gia']; ?>&time=<?php echo $result['date_order']; ?>">xóa</a> 
								<?php }  ?>


							</td>
						</tr>
						<?php
							}
						}
						?>
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
