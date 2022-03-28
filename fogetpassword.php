<?php 
    include_once 'lib/session.php';
    Session::init();
 ?>
 <?php 
	include_once ('lib/database.php');
	include_once ('helpers/format.php');
	spl_autoload_register(function($classname){
		include_once "classes/".$classname.".php";
	});
	$db= new Database();
	$fm = new Format();
	$ct = new cart();
    $brand = new brand();

	$product = new sanpham();
	$cat = new category();
	$cs = new customer();
	$ship = new ship();
?>
<?php 
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$sdt = $_POST['sdt'];
		$checktt = $cs->checktt($email,$sdt);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="text/css">

	*{
		font-family: 'Poppins',sans-serif;
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	body{
		min-height: 100vh;
		background: #e5e5e5;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.box{
		width: 500px;
		min-height: 300px;
		text-align: center;
		border-radius: 10px;
		box-shadow: -8px -8px 13px #fff7,8px 8px 13px #0001;  
	}
	h2{
		margin: 10px 0;
		text-transform: uppercase;
		color: teal;
		letter-spacing: 2px;
	}
	form{
		padding: 0 30px;
	}
	form label{
		width: 100%;
		height: 40px;
		margin: 15px 0;
		display: block;
		position: relative;
	}
	form input{
		width: 100%;
		height: 100%;
		border: none;
		outline: none;
		background: transparent;
		border-bottom: 1px solid teal;
		padding-right: 50px;
	}
	form i{
		color: crimson;
	}
	form .submit{
		height: 40px;
		cursor: pointer;
		outline: none;
		border: none;
		background: rgb(25, 146, 187);
		padding: 0 20px;
		color: white;
		letter-spacing: 1.5px;
		text-transform: uppercase;
		border-radius: 5px;
		margin: 13px 0;
	}
	form .submit:disabled,
	form input:disabled{
		opacity: 0.4;
		cursor: no-drop;
	}
	.alert{
		border-radius: 5px;
		text-transform: uppercase;
		letter-spacing: 2px;
		padding: 5px 0;
		font-size: 12px;
		display: none;
	}
	.alert.denger{
		display: block;
		background: #da7f7c;
		color: #900;
	}
	.alert.success{
		display: block;
		background: #7dc77d;
		color: #015f01;
	}
</style>
<body>
	<div class="box">
		<h2>Quên mật khẩu</h2>
		<form method="post" action="">
			<?php if (isset($checktt)) {				
				if($checktt){
					while($result = $checktt->fetch_assoc()){
						$cusid = $result['id'];
					}
					
					echo "<script>window.location='changepasswordnew.php?cusid=".$cusid."'</script>";
			} else{ ?>
			<p class="alert denger">Email hoặc số điện thoại không đúng</p><?php } }?>
			<label for="oldpass"><input type="text" name="email" required placeholder="Nhập email của bạn"></label>
			<label for="pass"><input type="text" name="sdt" required placeholder="Nhập số điện thoại của bạn"></label>
			<input type="submit" class="submit" name="submit" value="Xác nhận">
		</form>
	</div>
</body>


