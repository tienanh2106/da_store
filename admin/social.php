<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/mxh.php';?>
<?php
    $mxh = new mxh();
     if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $google = $_POST['googleplus'];
            $update_mxh = $mxh->updatemxh($facebook,$twitter,$google);
        }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block">
        <?php if(isset($update_mxh)){
            echo $update_mxh;
        } ?>               
         <form method="post">
            <table class="form">
            <?php
                
                $showmxh = $mxh->showmxh();
                if($showmxh){
                    while($result = $showmxh->fetch_assoc()){  ?>					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" value="<?php echo $result['facebook'] ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" value="<?php echo $result['twitter'] ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="googleplus" value="<?php echo $result['google'] ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Sửa" />
                    </td>
                </tr>
            <?php }} ?>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>