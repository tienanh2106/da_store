<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	/**
	 * 
	 */
	class category
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function insert_category($catName)
		{
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);

			if(empty($catName))
			{
				$thongbao = "<span class='success'>Không được để trống";
				return $thongbao;
			}
			else
			{
				$query = "insert into tbl_danhmuc(catName) values('$catName')";
				$ketqua = $this->db->insert($query);
				if($ketqua){
					$thongbao = "<span class='success'>Thêm danh mục thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Thêm danh mục không thành công</span>";
					return $thongbao;
				}
			}
		}
		public function show_category()
		{
			$query = "SELECT *FROM tbl_danhmuc order by catid desc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function update_category($catName,$id){
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			if(empty($catName))
			{
				$thongbao = "<span class='error'>Không được để trống";
				return $thongbao;
			}
			else
			{
				$query = "update tbl_danhmuc set catName='$catName' where catid = '$id'";
				$ketqua = $this->db->update($query);
				if($ketqua){
					$thongbao = "<span class='success'>Sửa danh mục thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Sửa danh mục không thành công</span>";
					return $thongbao;
				}
			}
		}
		public function delete_category($id){
			$query = "delete from tbl_danhmuc where catid = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$thongbao = "<span class='success'>Xóa danh mục thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Xóa danh mục không thành công</span>";
					return $thongbao;
				}
		}
		public function getcatbyid($id){
			$query = "SELECT *FROM tbl_danhmuc where catid='$id' order by catid desc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function getcat($id){
			$query = "SELECT *FROM tbl_danhmuc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
	}
?>