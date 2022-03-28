<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/customer.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php 
    if(!isset($_GET['customer_id']) || $_GET['customer_id']==''){
        echo "'<script>window.location='inbox.php'</script>";
    }
    else{
        $id=$_GET['customer_id'];
        }
        $cs= new customer();

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                 <?php
                    $get_customer= $cs->show_customers($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                 ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Họ Tên</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name'];?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Số Điện Thoại</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['sdt'];?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address'];?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email'];?>" name="catName" class="medium" />
                            </td>
                        </tr>
                
						
                    </table>
                    </form>
                <?php }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>