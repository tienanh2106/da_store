<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';
include '../classes/sanpham.php';
?>
<?php 
    $sp = new sanpham();
     if(!isset($_GET['spId']) || $_GET['spId']==''){
        echo "'<script>window.location='productlist.php'</script>";
    }
    else{
        $id=$_GET['spId'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        
        $updatesp = $sp->update_sanpham($_POST,$_FILES,$id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block"> 
        <?php 
          if(isset($updatesp)){
             echo $updatesp;
          }
        ?>                 
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <?php
                $get_sp_by_id = $sp->getspbyid($id);
            if($get_sp_by_id){
                while($result_sp = $get_sp_by_id->fetch_assoc()){
        ?>     
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_sp['tensp']; ?>" name="tensp"  class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="danhmuc">
                            <option>- Chọn danh mục -</option>
                            <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while($result = $catlist->fetch_assoc()){
                                
                            ?>
                            <option <?php 
                                if($result['catid']==$result_sp['catid']){echo 'selected';}
                            ?>
                            value="<?php echo $result['catid'];?>"><?php echo $result['catName'];?></option>
                        <?php }}?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="thuonghieu">
                            <option>- Chọn thương hiệu -</option>
                            <?php 
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while($result = $brandlist->fetch_assoc()){
                                
                            ?>
                            <option 
                                <?php 
                                if($result['brandid']==$result_sp['brandid']){echo 'selected';}
                            ?>
                            value="<?php echo $result['brandid'];?>"><?php echo $result['brandName'];?></option>
                            <?php }}?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="motasp" rows="5" style="width: 750px;"><?php echo $result_sp['motasp']; ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="giasp" value="<?php echo $result_sp['giasp']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Ảnh</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_sp['hinhanh']; ?>" width=80px><br>
                        <input name="img" type="file" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>- Chọn loại sản phẩm -</option>
                            <?php 
                                if($result_sp['type']==1){
                            ?>
                            <option selected value="1">Nổi bật</option>
                            <option value="2">Không nổi bật</option>
                        <?php }
                            else{
                                ?>
                                <option value="1">Nổi bật</option>
                            <option selected value="2">Không nổi bật</option>
                        <?php }?>
                        </select>
                        <tr>
                    <td>
                        <label>Số lượng</label>
                    </td>
                    <td>
                        <input type="text" name="soluong" value="<?php echo $result_sp['soluong']; ?>" class="medium" />
                    </td>
                </tr>
                
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


