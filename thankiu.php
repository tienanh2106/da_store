<?php include 'inc/header.php'; ?>
<?php include 'inc/mainmenu.php'; 

?>
<?php 
$ct=new Cart();
if(isset($_GET['confirm_id'])&&isset($_GET['time'])&&isset($_GET['price']) ){
       $id=$_GET['confirm_id'];
       $time=$_GET['time'];
       $price=$_GET['price'];
       $shifted_confirm=$ct->shifted_confirm($id,$time,$price);
    }
?>
<style type="text/css">
	
.tieptucmuahang{
    margin-top: 1rem;
    display: inline-block;
    padding:.8rem 3rem;
    font-size: 1.7rem;
    border-radius: .5rem;
    border:.2rem solid var(--black);
    color:var(--black);
    cursor: pointer;
    background: none;
}
.tieptucmuahang:hover{
    background: var(--orange);
    color:#00FF00;
}
</style>
<h1 style="font-size:40px; padding-top: 50px; text-align: center; color: red;">Cảm ơn bạn đã mua hàng tại wedsite</h1>
<p align="center"><a href="listproduct.php" class="tieptucmuahang" > Tiếp tục mua hàng</a></p>


<?php include 'inc/footer.php'; ?>