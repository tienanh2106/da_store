<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 
    $brand = new brand();
    if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
         echo "'<script>window.location='brandlist.php'</script>";
    }
    else{
        $id=$_GET['brandid'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $updatebrand = $brand->update_brand($_POST,$_FILES,$id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <?php
                    if(isset($updatebrand)){
                        echo $updatebrand;
                    }
                 ?>
                 <?php
                    $get_brand_name = $brand->getbrandbyid($id);
                    if($get_brand_name){
                        while($result = $get_brand_name->fetch_assoc()){
                 ?>
               <div class="block copyblock"> 
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName'];?>" name="brandName" placeholder="Sửa tên thương hiệu" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ảnh</label>
                            </td>
                            <td>
                                <img src="upload/<?php echo $result['brandImg']; ?>" width=80px><br>
                                <input name="img" type="file" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>