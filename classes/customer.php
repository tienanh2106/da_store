<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	class customer
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insertcustomer($data){

			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$username = mysqli_real_escape_string($this->db->link, $data['username']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
			$gioitinh = mysqli_real_escape_string($this->db->link, $data['gioitinh']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			$confirm_password = mysqli_real_escape_string($this->db->link, md5($data['confirm_password']));
			
			if($username==''||$name==''||$address==''||$sdt==''||$gioitinh==''||$email==''||$password==''||$confirm_password==''){
				$msg = 'Không được để trống';
				return $msg;
			}
			else{
				if ($password == $confirm_password) {
				$check_email="SELECT * FROM tbl_customer WHERE email = '$email' or username='$username'";
				$resultcheck = $this->db->select($check_email);
				if($resultcheck){
					$msg = 'Email hoặc tên đăng nhập đã tồn tại';
					return $msg;
				}
				else{
					if ($confirm_password==$password) {	
					$query = "insert into tbl_customer(username,address,sdt,gioitinh,email,password,name) values('$username','$address','$sdt','$gioitinh','$email','$password','$name')";
					$ketqua = $this->db->insert($query);
						if($ketqua){
							$msg = "Đăng kí thành công. Bạn có thể đăng nhập";
							return $msg;
							}
						else{
							$msg = "Đăng kí không thành công";
							return $msg;
							}
					}
					else {
					$msg='Nhập lại mật khẩu sai';
					return $msg;
					}
				}
				
			}
			else{
				$msg='Mật khẩu không trùng nhau';
					return $msg;
			}
		}
		}	
		public function logincustomer($data){
			$username = mysqli_real_escape_string($this->db->link, $data['username']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if($username==''||$password==''){
				$msg = 'Không được để trống';
				return $msg;
			}
			else{
				$check_login="SELECT * FROM tbl_customer WHERE password = '$password' and username='$username' or email = '$username'";
				$resultcheck = $this->db->select($check_login);
				if($resultcheck==true){
					$value = $resultcheck->fetch_assoc();
					session::set('customer_login',true);
					session::set('customer_id',$value['id']);
					session::set('customer_name',$value['name']);
					$msg = 'true';
					return $msg;
				}
				else{
					$msg = 'Username hoặc password không đúng';
					return $msg;
				}
			}
		}
		public function show_customers($id){

			$query="SELECT * FROM tbl_customer WHERE id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function updatelv($id){

			$query="UPDATE tbl_customer SET lv = '1' where id ='$id' ";
			$result = $this->db->update($query);
			if($result){
				$msg = "Nâng thành công";
				return $msg;
			}
			else{
				$msg = "Nâng không thành công";
				return $msg;
			}
		}
		public function resetlv($id){

			$query="UPDATE tbl_customer SET lv = '0' where id ='$id' ";
			$result = $this->db->update($query);
			if($result){
				$msg = "Hạ thành công";
				return $msg;
			}
			else{
				$msg = "Hạ không thành công";
				return $msg;
			}
		}
		public function delcus($delid){
			$query="DELETE FROM tbl_comment WHERE nguoibl='$delid'";
			$query2="DELETE FROM tbl_order WHERE customers_id='$delid'";
			$query3="DELETE FROM tbl_wishlist WHERE customer_id='$delid'";
			$result = $this->db->delete($query);
			$result2 = $this->db->delete($query2);
			$result3 = $this->db->delete($query3);
			if($result && $result2&& $result){
				$query1="DELETE FROM tbl_customer WHERE id='$delid';
						";
				$result1 = $this->db->delete($query1);
				if($result1){
					$msg = "Xóa thành công";
					return $msg;
				}
				else{
					$msg = "Xóa không thành công";
					return $msg;
				}
			}
		}
		public function showcustomers(){

			$query="SELECT * FROM tbl_customer";
			$result = $this->db->select($query);
			return $result;
		}


		public function update_customers($data,$id){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
			$gioitinh = mysqli_real_escape_string($this->db->link, $data['gioitinh']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			
			if($name==''||$address==''||$sdt==''||$gioitinh==''||$email==''){
				$msg = 'Không được để trống';
				return $msg;
			}
			else{
			
					$query = "UPDATE tbl_customer SET name='$name',address='$address',sdt='$sdt',gioitinh='$gioitinh',email='$email' WHERE id='$id' ";
					$ketqua = $this->db->insert($query);
					if($ketqua){
						$msg = "Cập nhật thành công";
						return $msg;
					}
					else{
						$msg = "Cập nhật không thành công";
						return $msg;
					}
				}
		}
		public function update_customers2($data,$id){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			
			if($name==''||$address==''||$sdt==''||$email==''){
				$msg = 'Không được để trống';
				return $msg;
			}
			else{
			
					$query = "UPDATE tbl_customer SET name='$name',address='$address',sdt='$sdt',email='$email' WHERE id='$id' ";
					$ketqua = $this->db->insert($query);
					if($ketqua){
						$msg = "Cập nhật thành công";
						return $msg;
					}
					else{
						$msg = "Cập nhật không thành công";
						return $msg;
					}
				}
		}
		public function insert_binhluan($cusid){
			$product_id=$_POST['product_id_binhluan'];
			
			$binhluan=$_POST['binhluan'];
			if ($binhluan=='') {
				$msg = 'Không được để trống';
				return $msg;
			}
			else{

					$query = "INSERT into tbl_comment(nguoibl,binhluan,spid) values ('$cusid','$binhluan','$product_id')";
					$ketqua = $this->db->insert($query);
					if($ketqua){
						$msg = "Bình luận sẽ được kiểm duyệt";
						return $msg;
					}
					else{
						$msg = "Bình luận không thành công";
						return $msg;
					}

			}
		}
		public function showcmt($proid){
			$query = "SELECT * FROM tbl_comment inner join tbl_customer on tbl_comment.nguoibl=tbl_customer.id WHERE spid = $proid";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function delcmt($cmtid){
			$query = "DELETE from tbl_comment WHERE comment_id = $cmtid";
			$ketqua = $this->db->delete($query);
			return $ketqua;
		}
		public function changepass($pass,$cusid){
			$query = "UPDATE tbl_customer SET password = '$pass' where id = $cusid";
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
		public function changepassnew($pass,$cusid){
			$query = "UPDATE tbl_customer SET password = '$pass' where id = $cusid";
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
		public function showcmtid($delcmtid){
			$query = "SELECT * FROM tbl_comment WHERE comment_id = $delcmtid";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function checktt($email,$sdt){
			$query = "SELECT * FROM tbl_customer WHERE email = '$email' and sdt = '$sdt'";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
	}
	
?>