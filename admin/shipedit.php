<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/ship.php';?>
<?php 
    $ship = new ship();
    if(!isset($_GET['shipid']) || $_GET['shipid']==NULL){
         echo "'<script>window.location='shiplist.php'</script>";
    }
    else{
        $id=$_GET['shipid'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $updateship = $ship->update_ship($_POST,$_FILES,$id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <?php
                    if(isset($updateship)){
                        echo $updateship;
                    }
                 ?>
                 <?php
                    $getship = $ship->getshipbyid($id);
                    if($getship){
                        while($result = $getship->fetch_assoc()){
                 ?>
               <div class="block copyblock"> 
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Tên</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['shipname'];?>" name="shipname" placeholder="Sửa tên thương hiệu" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ảnh</label>
                            </td>
                            <td>
                                <img src="upload/<?php echo $result['shipimg']; ?>" width=80px><br>
                                <input name="img" type="file" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mô tả</label></td>
                            <td>
                                <input type="text" value="<?php echo $result['shipmota'];?>" name="mota" placeholder="Sửa tên thương hiệu" class="medium" />
                            </td>
						<tr> 
                            
                            <td>
                                <label>Giá</label></td>
                            <td>
                                <input type="text" value="<?php echo $result['shipgia'];?>" name="shipgia" placeholder="Sửa tên thương hiệu" class="medium" />
                            </td>
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