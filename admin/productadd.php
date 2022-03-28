<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';
include '../classes/sanpham.php';
?>
<?php 
    $sp = new sanpham();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        
        $insertsp = $sp->insert_sanpham($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm mới</h2>
        <div class="block"> 
        <?php 
          if(isset($insertsp)){
             echo $insertsp;
          }
        ?>                 
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="tensp" placeholder="Nhập tên sản phẩm" class="medium" />
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
                            <option value="<?php echo $result['catid'];?>"><?php echo $result['catName'];?></option>
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
                            <option value="<?php echo $result['brandid'];?>"><?php echo $result['brandName'];?></option>
                            <?php }}?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="motasp"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="giasp" placeholder="Nhập giá..." class="medium" />
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
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>- Chọn loại sản phẩm -</option>
                            <option value="1">Nổi bật</option>
                            <option value="2">Không nổi bật</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số lượng</label>
                    </td>
                    <td>
                        <input type="text" name="soluong" placeholder="Nhập số lượng..." class="medium" />
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


