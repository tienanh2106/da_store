<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
 <?php 
    $brand = new brand();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $insertbrand = $brand->insert_brand($_POST,$_FILES);
    }
?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm thương hiệu</h2>
                 <?php
                    if(isset($insertbrand)){
                        echo $insertbrand;
                    }
                 ?> 
               <div class="block copyblock"> 
                 <form action="brandadd.php" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Tên thương hiệu</label>
                            </td>
                            <td>
                                <input type="text" name="brandName" placeholder="Thêm thương hiệu sản phẩm" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ảnh thương hiệu</label>
                            </td>
                            <td>
                                <input name="img" type="file" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>