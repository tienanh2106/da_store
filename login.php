<?php 
    include 'lib/session.php';
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
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Đăng nhập</title>
		<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	</head>
	<?php 

				    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
				        $insertcs = $cs->insertcustomer($_POST);
				        if($insertcs){
				    	echo "<script type='text/javascript'>alert('$insertcs');</script>"; 
				    }
				    }
				    
				?>
				<?php 

				    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
				        $login = $cs->logincustomer($_POST);
				        if($login=='true'){
				        	echo "<script>window.location='index.php'</script>";
				        }else{
				    		echo "<script type='text/javascript'>alert('$login');</script>"; 
				    }
				    }
				    
				?>
	<body>
		<div class="container">
			<div class="blueBg">
				<div class="box signin">
					<h2>Bạn đã có tài khoản?</h2>
					<button class="signinBtn">Đăng nhập</button>
				</div>
				<div class="box signup">
					<h2>Bạn chưa có tài khoản?</h2>
					<button class="signupBtn">Đăng ký</button>
				</div>
			</div>
			<div class="formBx">
				<div class="form signinForm">
					<form action="" method="post">
						<h3>Đăng nhập</h3>
						<input type="text" name="username" placeholder="Nhập tên đăng nhập hoặc email">
						<input type="password" name="password" placeholder="Nhập mật khẩu">
						<input type="submit" name="login" value="Đăng nhập" >
						<a href="fogetpassword.php" class="forgot">Quên mật khẩu</a>
					</form>
				</div>
				
				 <div class="form signupForm">
					<form action="" method="post">
						<h3>Đăng ký</h3>
						<table>
							<tr>
							<td ><input type="text" name="username" placeholder="Tên đăng nhập"></td>
							<td ><input type="text" name="name" placeholder="Họ Tên"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="text" name="email" placeholder="Email"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="text" name="address" placeholder="Địa chỉ"></td>
						</tr>
						<tr>
							<td><input type="text" name="sdt" placeholder="Số điện thoại"></td>
							<td>
								<select name="gioitinh">
									<option value="1">Nam</option>
									<option value="2">Nữ</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="password" name="password" placeholder="Mật khẩu"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit" value="Đăng ký" ></td>
						</tr>
						</table>

						
					</form>
				</div> 
			</div>

		</div>
		<script type="text/javascript">
			const signinBtn = document.querySelector('.signinBtn');
			const signupBtn = document.querySelector('.signupBtn');
			const formBx = document.querySelector('.formBx');
			const body = document.querySelector('body')
			signupBtn.onclick = function(){
				formBx.classList.add('active')
				body.classList.add('active')
			}
			signinBtn.onclick = function(){
				formBx.classList.remove('active')
				body.classList.remove('active')
			}
		</script>
	</body>
</html>