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
	$checklogin = session::get('customer_login');
	if ($checklogin==true) {
		$cusid=session::get('customer_id');
	}if (isset($_GET['cusid'])) {
		$cusid=$_GET['cusid'];
	}
	if (isset($_POST['submit'])) {
		$oldpass = md5($_POST['oldpass']);
		$pass = md5($_POST['pass']);
		$cfpass = md5($_POST['cfpass']);
		if ($pass == $cfpass) {
		$check=false;
		
		
		if ($checklogin==true) {
			$get_customers=$cs->show_customers($cusid);
			if ($get_customers){
				while($result = $get_customers->fetch_assoc()){
					if ($result['password']== $oldpass) {
						// $check=true;
						// if($check==true){
						$doimk = $cs->changepass($pass,$cusid);
						if ($doimk){
							echo "<script type='text/javascript'>alert('$doimk');</script>";
							echo "<script>window.location='my-account.php'</script>"; 
						}
					}
					else{
						echo "<script type='text/javascript'>alert('Mật khẩu cũ không đúng');</script>";
					}
				}}
			
		}
		else{
			echo "<script>window.location='login.php'</script>"; 
		}}
		else{
			echo "<script type='text/javascript'>alert('Mật khẩu không trùng nhau');</script>";
		}
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
		<h2>Đổi mật khẩu</h2>
		<form method="post" action="">
			<p></p>
			<label for="oldpass"><input type="password" name="oldpass" id="oldpass" required placeholder="Mật Khẩu Cũ"></label>
			<label for="pass"><input type="password" name="pass" id="pass" required placeholder="Mật Khẩu Mới"></label>
			<label for="cfpass"><input type="password" name="cfpass" id="cfpass" required placeholder="Nhập Lại Mật Khẩu"></label>
			<input type="submit" class="submit" name="submit" value="Xác nhận">
		</form>
	</div>
</body>
<script type="text/javascript">
	const pass =document.querySelector('#pass');
	const cfpass =document.querySelector('#cfpass');
	const palert =document.querySelector('form p');
	const btnregister =document.querySelector('button');
	function check(){
		let check=(pass.value.length < 1);
		console.log(check);
		btnregister.disabled = check;
		cfpass.disabled = check;
		cfpass.value='';
		palert.className = 'alert';
	}
	check();
	pass.addEventListener('keyup', check);
	btnregister.addEventListener('click', (e)=>{
		e.preventDefault();
		let txterr = "Mật khẩu không trùng nhau";
		let txtsus = "Mật khẩu trùng nhau";
		let result = (pass.value === cfpass.value);
		console.log(result);
		palert.textContent = result ? txtsus : txterr;
		palert.className = result ? 'alert success':'alert danger';
	});
	
</script>