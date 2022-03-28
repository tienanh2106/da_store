<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';
include '../classes/sanpham.php';
?>
<?php  $sp = new sanpham();
if (isset($_GET['update_slider'])) {
    $id=$_GET['update_slider'];
    }
    else{
        echo "'<script>window.location='sliderlist.php'</script>";
    }

   
     if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        
        $update_slider = $sp->update_slide($_POST,$_FILES,$id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block"> 
        <?php 
          if(isset($update_slider)){
             echo $update_slider;
          }
        ?>                 
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <?php
                $get_slider_id = $sp->get_slider_id($id);
                if($get_slider_id){
                while($result_sp = $get_slider_id->fetch_assoc()){
        ?>     
      
				
			     <tr>
                    <td>
                        <label>Tên slider</label>
                    </td>
                    <td>
                        <input type="text" name="slider_name" value="<?php echo $result_sp['slider_name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ảnh</label>
                    </td>
                    <td>
                        <img name="slider_image" src="upload/<?php echo $result_sp['slider_image']; ?>" width=80px><br>
                        <input name="img" type="file" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Vị Trí</label>
                    </td>
                    <td>
                        <input type="text" name="vitri" value="<?php echo $result_sp['vitri']; ?>">
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        <?php }} ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


