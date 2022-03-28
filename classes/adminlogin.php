<?php 
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	session::checkLogin();
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	/**
	 * 
	 */
	class adminlogin
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function login_admin($adminUser,$adminPass)
		{
			$adminUser = $this->fm->validation($adminUser);
			$adminPass = $this->fm->validation($adminPass);
			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

			if(empty($adminUser) || empty($adminPass))
			{
				$thongbao = "Tài Khoản hoặc Mật Khẩu trống";
				return $thongbao;
			}
			else
			{
				$query = "SELECT * FROM tbl_customer WHERE username = '$adminUser'  AND password = '$adminPass' OR email = '$adminUser'";
				$ketqua = $this->db->select($query);
				if($ketqua != false){
					$value = $ketqua->fetch_assoc();
					if($value['lv']!=0){
					session::set('adminLogin', true);
					session::set('adminId',$value['id']);
					session::set('adminUser',$value['username']);
					session::set('adminName',$value['name']);
					header('Location:index.php');
				}else{
					$thongbao = "Tài khoản hoặc mật khẩu không đúng";
					return $thongbao;
				}
				}else{
					$thongbao = "Tài khoản hoặc mật khẩu không đúng";
					return $thongbao;
				}	
			}
		}
		public function admin_check()
		{
			
		}
		public function showadmin($id){
			$query="SELECT * FROM tbl_customer WHERE id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function changepass($pass,$adminid){
			$query = "UPDATE tbl_customer SET password = '$pass' where id = $adminid";
			$ketqua = $this->db->update($query);
			if ($ketqua) {
				$msg = "Đổi mật khẩu thành công";
				return $msg;
			}
			else{
				$msg = "Đổi mật khẩu không thành công";
				return $msg;
			}
		}
		
	}
?>