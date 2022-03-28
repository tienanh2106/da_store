<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	/**
	 * 
	 */
	class ship
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_ship($data,$files)
		{
			
			$shipname = mysqli_real_escape_string($this->db->link, $data['shipname']);
			$mota = mysqli_real_escape_string($this->db->link, $data['mota']);
			$shipgia = mysqli_real_escape_string($this->db->link, $data['shipgia']);
			$permited = array('jpg','jpeg','png','gif');             
			$file_name = $_FILES['img']['name'];             
			$file_size = $_FILES['img']['size'];             
			$file_temp = $_FILES['img']['tmp_name'];             
			$div = explode('.', $file_name);             
			$file_ext = strtolower(end($div));             
			$unique_img = substr(md5(time()),0,10).'.'.$file_ext;             
			$uploaded_img = "upload/".$unique_img;

			if($shipname=='' || $file_name==''|| $mota==''|| $shipgia=='')
			{
				$thongbao = "<span class='error'>Không được để trống";
				return $thongbao;
			}
			else
			{	move_uploaded_file($file_temp,$uploaded_img);
				$query = "insert into tbl_ship(shipname,shipimg,shipmota,shipgia) values('$shipname','$unique_img','$mota','$shipgia')";
				$ketqua = $this->db->insert($query);
				if($ketqua){
					$thongbao = "<span class='success'>Thêm đơn vị vận chuyển thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Thêm đơn vị vận chuyển không thành công</span>";
					return $thongbao;
				}
			}
		}
		public function show_ship()
		{
			$query = "SELECT *FROM tbl_ship order by shipid desc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		
		public function update_ship($data,$files,$id){
			
			$shipname = mysqli_real_escape_string($this->db->link, $data['shipname']);
			$mota = mysqli_real_escape_string($this->db->link, $data['mota']);
			$shipgia = mysqli_real_escape_string($this->db->link, $data['shipgia']);

			$permited = array('jpg','jpeg','png','gif');             
			$file_name = $_FILES['img']['name'];             
			$file_size = $_FILES['img']['size'];             
			$file_temp = $_FILES['img']['tmp_name'];             
			$div = explode('.', $file_name);             
			$file_ext = strtolower(end($div));             
			$unique_img = substr(md5(time()),0,10).'.'.$file_ext;             
			$uploaded_img = "upload/".$unique_img;
			if($shipname=='' || $mota==''|| $shipgia=='')
			{
				$thongbao = "<span class='error'>Không được để trống";
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
					$query = "update tbl_ship set shipname='$shipname', shipimg='$unique_img', shipmota='$mota',shipgia='$shipgia' where shipid = '$id'";
					
					
				}
				else{
					$query = "update tbl_ship set shipname='$shipname', shipmota='$mota',shipgia='$shipgia' where shipid = '$id'";
					
					}
				}		
					$ketqua = $this->db->update($query);
					if($ketqua){
						$thongbao = "<span class='success'>Sửa thành công</span>";
						return $thongbao;
					}
					else{
						$thongbao = "<span class='error'>Sửa không thành công</span>";
						return $thongbao;
					}
		}
		
		public function delete_ship($id){
			$query = "delete from tbl_ship where shipid = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$thongbao = "<span class='success'>Xóa thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Xóa không thành công</span>";
					return $thongbao;
				}
		}
		public function getshipbyid($id){
			$query = "SELECT *FROM tbl_ship where shipid='$id'";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
	}
?>