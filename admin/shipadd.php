<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/ship.php';?>
 <?php 
    $ship = new ship();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $insertship = $ship->insert_ship($_POST,$_FILES);
    }
?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm đơn vị vận chuyển</h2>
                 <?php
                    if(isset($insertship)){
                        echo $insertship;
                    }
                 ?> 
               <div class="block copyblock"> 
                 <form action="shipadd.php" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td><label>Tên</label></td>
                            <td>
                                <input type="text" name="shipname" placeholder="Thêm tên đơn vị vận chuyển" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Mô tả</label>
                            </td>
                            <td>
                                <input type="text" name="mota" placeholder="Mô tả" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ảnh</label>
                            </td>
                            <td>
                                <input name="img" type="file" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Giá</label></td>
                            <td>
                                <input type="text" name="shipgia" placeholder="Giá vận chuyển" class="medium" />
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