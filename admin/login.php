<?php 
	include "../classes/adminlogin.php";
?>
<?php 
	$class = new adminlogin();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$adminUser = $_POST['adminUser'];
		$adminPass = md5($_POST['adminPass']);
		$login_check = $class->login_admin($adminUser,$adminPass);
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="css\stylelogin.css" />
</head>
<body>
	<form class="box" action="login.php" method="post">
		<h1>Đăng nhập</h1>
		<span style="color: #E54646;"><?php 
			if(isset($login_check)){
				echo $login_check;
			}
		?></span>
		<input type="text" placeholder="Username or email" required="" name="adminUser">
		<input type="password" placeholder="Password" required="" name="adminPass">
		<input type="submit" name="" value="Đăng nhập">
	</form>
</body>
