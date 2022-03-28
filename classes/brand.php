<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	/**
	 * 
	 */
	class brand
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_brand($data,$files)
		{
			
			$brandName = mysqli_real_escape_string($this->db->link, $data['brandName']);
			$permited = array('jpg','jpeg','png','gif');             
			$file_name = $_FILES['img']['name'];             
			$file_size = $_FILES['img']['size'];             
			$file_temp = $_FILES['img']['tmp_name'];             
			$div = explode('.', $file_name);             
			$file_ext = strtolower(end($div));             
			$unique_img = substr(md5(time()),0,10).'.'.$file_ext;             
			$uploaded_img = "upload/".$unique_img;

			if($brandName=='' || $file_name=='')
			{
				$thongbao = "<span class='success'>Không được để trống";
				return $thongbao;
			}
			else
			{	move_uploaded_file($file_temp,$uploaded_img);
				$query = "insert into tbl_brand(brandName,brandImg) values('$brandName','$unique_img')";
				$ketqua = $this->db->insert($query);
				if($ketqua){
					$thongbao = "<span class='success'>Thêm thương hiệu thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Thêm thương hiệu không thành công</span>";
					return $thongbao;
				}
			}
		}
		public function show_brand()
		{
			$query = "SELECT *FROM tbl_brand order by brandid desc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		
		public function update_brand($data,$files,$id){
			
			$brandName = mysqli_real_escape_string($this->db->link, $data['brandName']);

			$permited = array('jpg','jpeg','png','gif');             
			$file_name = $_FILES['img']['name'];             
			$file_size = $_FILES['img']['size'];             
			$file_temp = $_FILES['img']['tmp_name'];             
			$div = explode('.', $file_name);             
			$file_ext = strtolower(end($div));             
			$unique_img = substr(md5(time()),0,10).'.'.$file_ext;             
			$uploaded_img = "upload/".$unique_img;
			if($brandName=='')
			{
				$thongbao = "<span class='success'>Không được để trống";
				return $thongbao;
			}
			else{
				if(!empty($file_name))
					{
						// if($file_size >100480)
						// {
						// 	$thongbao= "<span class='error'>Kích thước ảnh nên nhỏ hơn 2MB!</span>";
						// 	return $thongbao;
						// }
						if(in_array($file_ext,$permited)==false)
						{
							$thongbao= "<span class='error'>Bạn chỉ có thể cập nhật: ".implode(', ',$permited)."</span>";
							return $thongbao;
						}
					move_uploaded_file($file_temp,$uploaded_img);
					$query = "update tbl_brand set brandName='$brandName', brandImg='$unique_img' where brandid = '$id'";
					
					
				}
				else{
					$query = "update tbl_brand set brandName='$brandName' where brandid = '$id'";
					
					}
				}		
					$ketqua = $this->db->update($query);
					if($ketqua){
						$thongbao = "<span class='success'>Sửa thương hiệu thành công</span>";
						return $thongbao;
					}
					else{
						$thongbao = "<span class='error'>Sửa thương hiệu không thành công</span>";
						return $thongbao;
					}
		}
		
		public function delete_brand($id){
			$query = "delete from tbl_brand where brandid = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$thongbao = "<span class='success'>Xóa thương hiệu thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Xóa thương hiệu không thành công</span>";
					return $thongbao;
				}
		}
		public function getbrandbyid($id){
			$query = "SELECT *FROM tbl_brand where brandid='$id' order by brandid desc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
	}
?>