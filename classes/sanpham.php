<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../helpers/format.php';
?>
<?php
	class sanpham
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_sanpham($data,$files)
		{
			$tensp = mysqli_real_escape_string($this->db->link, $data['tensp']);
			$danhmuc = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
			$thuonghieu = mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
			$motasp = mysqli_real_escape_string($this->db->link, $data['motasp']);
			$giasp = mysqli_real_escape_string($this->db->link, $data['giasp']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			$soluong = mysqli_real_escape_string($this->db->link, $data['soluong']);

			$permited = array('jpg','jpeg','png','gif');             
			$file_name = $_FILES['img']['name'];             
			$file_size = $_FILES['img']['size'];             
			$file_temp = $_FILES['img']['tmp_name'];             
			$div = explode('.', $file_name);             
			$file_ext = strtolower(end($div));             
			$unique_img = substr(md5(time()),0,10).'.'.$file_ext;             
			$uploaded_img = "upload/".$unique_img;
			if($tensp==''||$danhmuc==''||$thuonghieu==''||$motasp==''||$giasp==''||$type==''||$file_name==''||$soluong=='')
			{
				$thongbao = "<span class='success'>Không được để trống";
				return $thongbao;
			}
			else
			{
				move_uploaded_file($file_temp,$uploaded_img);
				$query = "insert into tbl_sanpham(tensp,catid,brandid,motasp,giasp,type,hinhanh,soluong) values('$tensp','$danhmuc','$thuonghieu','$motasp','$giasp','$type','$unique_img','$soluong')";
				$ketqua = $this->db->insert($query);
				if($ketqua){
					$thongbao = "<span class='success'>Thêm sản phẩm thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Thêm sản phẩm không thành công</span>";
					return $thongbao;
				}
			}
		}
		public function insert_slider($data,$files){
			$slider_name = mysqli_real_escape_string($this->db->link, $data['slider_name']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			$vitri = mysqli_real_escape_string($this->db->link, $data['vitri']);
			
			$permited = array('jpg','jpeg','png','gif');             
			$file_name = $_FILES['img']['name'];             
			$file_size = $_FILES['img']['size'];             
			$file_temp = $_FILES['img']['tmp_name'];             
			$div = explode('.', $file_name);             
			$file_ext = strtolower(end($div));             
			$unique_img = substr(md5(time()),0,10).'.'.$file_ext;             
			$uploaded_img = "upload/".$unique_img;

			if($slider_name==''||$type==''||$vitri=='')
			{
				$thongbao = "<span class='error'>Không được để trống";
				return $thongbao;
			}
			else
			{
				if(!empty($file_name))
				{
					// if($file_size >204800)
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
					$query = "INSERT into tbl_slider(slider_name,type,slider_image,vitri) values('$slider_name','$type','$unique_img','$vitri')";
					$ketqua = $this->db->insert($query);
					if($ketqua){
						$thongbao = "<span class='success'>Thêm slider thành công</span>";
						return $thongbao;
					}
					else{
						$thongbao = "<span class='error'>Thêm slider không thành công</span>";
						return $thongbao;
					}				
				}			
			}
		}
		public function show_sanpham()
		{
			$query = "SELECT *FROM tbl_sanpham order by spid desc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function update_sanpham($data,$files,$id)
		{
			$tensp = mysqli_real_escape_string($this->db->link, $data['tensp']);
			$danhmuc = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
			$thuonghieu = mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
			$motasp = mysqli_real_escape_string($this->db->link, $data['motasp']);
			$giasp = mysqli_real_escape_string($this->db->link, $data['giasp']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			$soluong = mysqli_real_escape_string($this->db->link, $data['soluong']);

			$permited = array('jpg','jpeg','png','gif');             
			$file_name = $_FILES['img']['name'];             
			$file_size = $_FILES['img']['size'];             
			$file_temp = $_FILES['img']['tmp_name'];             
			$div = explode('.', $file_name);             
			$file_ext = strtolower(end($div));             
			$unique_img = substr(md5(time()),0,10).'.'.$file_ext;             
			$uploaded_img = "upload/".$unique_img;

			if($tensp==''||$danhmuc==''||$thuonghieu==''||$motasp==''||$giasp==''||$type==''||$soluong=='')
			{
				$thongbao = "<span class='error'>Không được để trống";
				return $thongbao;
			}
			else
			{
				if(!empty($file_name))
				{
					if($file_size >204800)
					{
						$thongbao= "<span class='error'>Kích thước ảnh nên nhỏ hơn 2MB!</span>";
						return $thongbao;
					}
					elseif(in_array($file_ext,$permited)==false)
					{
						$thongbao= "<span class='error'>Bạn chỉ có thể cập nhật: ".implode(', ',$permited)."</span>";
						return $thongbao;
					}
					move_uploaded_file($file_temp,$uploaded_img);
					$query = "UPDATE tbl_sanpham SET 
							tensp='$tensp',
							catid='$danhmuc',
							brandid='$thuonghieu',
							motasp='$motasp',
							giasp='$giasp',
							type='$type',
							hinhanh= '$unique_img',
							soluong='$soluong'
							where spId = '$id'" ;
				}
				else
				{
					$query = "UPDATE tbl_sanpham SET 
							tensp='$tensp',
							catid='$danhmuc',
							brandid='$thuonghieu',
							motasp='$motasp',
							giasp='$giasp',
							type='$type',
							soluong='$soluong'
							where spId = '$id'" ;
				}
			}


					$ketqua = $this->db->update($query);
					if($ketqua)
					{
						$thongbao = "<span class='success'>Sửa sản phẩm thành công</span>";
						return $thongbao;
					}
					else
					{
						$thongbao = "<span class='error'>Sửa sản phẩm không thành công</span>";
						return $thongbao;
					}
			}
				
		
		public function delete_sp($id){
			$query = "delete from tbl_sanpham where spId = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$thongbao = "<span class='success'>Xóa sản phẩm thành công</span>";
					return $thongbao;
				}
				else{
					$thongbao = "<span class='error'>Xóa sản phẩm không thành công</span>";
					return $thongbao;
				}
		}
		public function getspbyid($id){
			$query = "SELECT *FROM tbl_sanpham where spId='$id' order by spId desc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function getproduct_feathered(){
			$query = "SELECT *FROM tbl_sanpham where type='1' order by spId limit 15";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function getproduct_related($id){
			$query = "SELECT *FROM tbl_sanpham where brandid='$id' order by spId desc";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function getdetail($id){
			$query = "SELECT tbl_sanpham.*,tbl_danhmuc.catName, tbl_brand.brandName 
			FROM tbl_sanpham,tbl_danhmuc,tbl_brand WHERE tbl_sanpham.catid = tbl_danhmuc.catid
			AND tbl_sanpham.brandid = tbl_brand.brandid AND tbl_sanpham.spId= '$id'";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function getproduct_new(){
			$query = "SELECT *FROM tbl_sanpham where catid='5'or catid='6' order by spId desc LIMIT 10";
			$ketqua = $this->db->select($query);
			return $ketqua;
		}
		public function insert_wishlist($product_id,$customer_id){
			$product_id=mysqli_real_escape_string($this->db->link,$product_id);
			$customer_id=mysqli_real_escape_string($this->db->link,$customer_id);
			$check_wishlist="SELECT * from tbl_wishlist where spId ='$product_id' and customer_id='$customer_id' ";
			$result_check_wishlist=$this->db->select($check_wishlist);
			if ($result_check_wishlist) {
				$msg='Đã có trong yêu thích';
				return $msg;
			}
			else{
				$query="SELECT * from tbl_sanpham WHERE spId='$product_id'";
				$result=$this->db->select($query)->fetch_assoc();
				$product_name=$result['tensp'];
				$price=$result['giasp'];
				$image=$result['hinhanh'];
				$query_insert="INSERT into tbl_wishlist(spId,gia,image,customer_id,tensp) values ('$product_id','$price','$image','$customer_id','$product_name')";
				$insert_list=$this->db->insert($query_insert);
				if ($insert_list) {
					$alter = 'Đã thêm vào yêu thích thành công';
					return $alter;
				}
				else {
					$alter="Thêm vào yêu thích không thành công";
					return $alter;
				}

			}
		}
		public function get_wishlist($customer_id){
			$query="SELECT * from tbl_wishlist WHERE customer_id='$customer_id' order by id desc";
			$result=$this->db->select($query);
			return $result;
		}
		public function del_list($proid,$customer_id){
			$query="DELETE from tbl_wishlist WHERE customer_id='$customer_id' and spId='$proid'";
			$result=$this->db->delete($query);
			return $result;
		}
		public function show_slider(){
			$query="SELECT * from tbl_slider  order by slider_id desc";
			$result=$this->db->select($query);
			return $result;
		}
		public function get_slider_id($id){
			$query="SELECT * FROM tbl_slider where slider_id='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type)
		{
			$type=mysqli_real_escape_string($this->db->link,$type);
			$query="UPDATE tbl_slider SET type='$type' where slider_id='$id'";
			$result=$this->db->update($query);
			return $result;
		}
		public function delete_type_slider($id){
			$query="DELETE FROM tbl_slider where slider_id='$id' ";
			$result=$this->db->update($query);
			return $result;
		}
		public function update_slide($data,$files,$id){
			$tenslider = mysqli_real_escape_string($this->db->link, $data['slider_name']);
			$vitri = mysqli_real_escape_string($this->db->link, $data['vitri']);

			$permited = array('jpg','jpeg','png','gif');             
			$file_name = $_FILES['img']['name'];             
			$file_size = $_FILES['img']['size'];             
			$file_temp = $_FILES['img']['tmp_name'];             
			$div = explode('.', $file_name);             
			$file_ext = strtolower(end($div));             
			$unique_img = substr(md5(time()),0,10).'.'.$file_ext;             
			$uploaded_img = "upload/".$unique_img;
			
			if($tenslider==''||$vitri=='')
			{
				$thongbao = "<span class='error'>Không được để trống";
				return $thongbao;
			}
			else
			{
				if(!empty($file_name))
				{
					// if($file_size >204800)
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
					$query = "UPDATE tbl_slider SET 
							slider_name='$tenslider',
							slider_image= '$unique_img',
							vitri='$vitri'
							where slider_id= '$id'" ;
				}
				else
				{
					$query = "UPDATE tbl_slider SET 
							slider_name='$tenslider',
							vitri='$vitri'
							where slider_id= '$id'" ;
				}
			}
					$ketqua = $this->db->update($query);
					if($ketqua)
					{
						$thongbao = "<span class='success'>Sửa slider thành công</span>";
						return $thongbao;
					}
					else
					{
						$thongbao = "<span class='error'>Sửa slider không thành công</span>";
						return $thongbao;
					}
		}
		public function show_sanpham_brand($id)
		{
			$query="SELECT * FROM tbl_sanpham where brandid='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function get_name_brand($id)
		{
			$query="SELECT * FROM tbl_brand where brandid='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function get_name_danhmuc($id)
		{
			$query="SELECT * FROM tbl_danhmuc where catid='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function show_danhmuc_sanpham($id)
		{
			$query="SELECT * FROM tbl_sanpham where catid='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		// public function get_danhmuc($id)
		// {
		// 	$query="SELECT * FROM tbl_brand where brandid='$id'";
		// 	$result=$this->db->select($query);
		// 	return $result;
		// }
		public function timkiem($tukhoa){
			$tukhoa=mysqli_real_escape_string($this->db->link,$tukhoa);
			$query="SELECT * FROM tbl_sanpham where tensp like '%$tukhoa%'";
			$result=$this->db->select($query);
			return $result;
		}

		

	}
?>