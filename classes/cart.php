<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	class cart
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function addtocart($soluong,$id){
			$soluong = $this->fm->validation($soluong);
			$soluong = mysqli_real_escape_string($this->db->link, $soluong);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sid = session_id();

			$query2="SELECT soluong FROM tbl_sanpham where spId='$id'";
			$result2=$this->db->select($query2)->fetch_assoc();
			$soluongsp=$result2['soluong'];
			if ($soluongsp>=$soluong) {

			$query="SELECT * FROM tbl_sanpham WHERE spId='$id'";
			$result = $this->db->select($query)->fetch_assoc();
			$img = $result['hinhanh'];
			$giasp = $result['giasp'];
			$tensp =$result['tensp'];

			$check_cart="SELECT * FROM tbl_cart WHERE spId='$id' ";
			$result1=$this->db->select($check_cart);
			if ($result1) {
				$msg="Sản phẩm đã có trong giỏ hàng";
				return $msg;
			}
			else{
				$query_insert = "insert into tbl_cart(spId,soluong,sid,image,giasp,tensp) values('$id','$soluong','$sid','$img','$giasp','$tensp')";
				$result_insert = $this->db->insert($query_insert);
				if($result_insert){
					echo "<script>window.location='giohang.php' </script> ";
				}
				else{
					echo "<script>window.location='404.php' </script> ";
					}
				}
			}
			else {$msg='Số lượng trong kho không đủ'; return $msg;}
		}
		public function get_product_cart(){ 
			$sId = session_id();
			$query="SELECT *FROM tbl_cart ";
			$result=$this->db->select($query);
			return $result;
		}
		public function update_soluong_cart($soluong,$cartid){
			$soluong = mysqli_real_escape_string($this->db->link, $soluong);
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query1="SELECT * FROM tbl_cart ";
			$result1=$this->db->select($query1)->fetch_assoc();
			$spid=$result1['spId'];
			$query2="SELECT soluong FROM tbl_sanpham where spId='$spid'";
			$result2=$this->db->select($query2)->fetch_assoc();
			$soluongsp=$result2['soluong'];
			if ($soluongsp>=$soluong) {
			$query= "update tbl_cart set 
					soluong='$soluong'
					where cartid='$cartid'; ";
			$result= $this->db->update($query);
			if ($result) {
				$msg=" Cập nhật thành công";
				return $msg;
			}
			else{$msg =" Cập nhật thất bại"; return $msg;}
			}
			else {$msg='Số lượng trong kho không đủ';
			return $msg;}
		}
		public function delete_product_cart($cartid){
			$cartid= mysqli_real_escape_string($this->db->link, $cartid);
			$query="DELETE FROM tbl_cart WHERE cartid='$cartid'";
			$result = $this->db->delete($query);
			if ($result) {
				$msg = 'true';
				return $msg;
			}
			else{$msg =" Xóa thất bại"; return $msg;}
		}
		public function delete_all_product_cart(){
			$query="DELETE FROM tbl_cart ";
			$result = $this->db->delete($query);
		}
		public function insert_order($customer_id,$shipid,$thanhtoan){
			$sId=session_id();
			$idship = $shipid;
			$query="SELECT * FROM tbl_cart WHERE sid='$sId'";
			$query1="SELECT * FROM tbl_customer WHERE id='$customer_id'";
			$get_cus_id=$this->db->select($query1)->fetch_assoc();
			$get_product=$this->db->select($query);
			if ($get_product) {
				while ($result=$get_product->fetch_assoc()) {
					$spid=$result['spId'];
					$username=$get_cus_id['name'];
					$soluong=$result['soluong'];
					$gia=$result['giasp']*$soluong;
					$image=$result['image'];
					$customer_id=$customer_id;
					$query_order = "INSERT into tbl_order(spId,username,customers_id,soluong_order,gia,image,shipid,thanhtoan) values('$spid','$username','$customer_id','$soluong','$gia','$image','$idship','$thanhtoan')";
					$insert_order = $this->db->insert($query_order);	
				
				}
			}
		}
		public function get_amount_price($customer_id){
			$query="SELECT gia FROM tbl_order where customers_id='$customer_id' ";
			$get_price=$this->db->select($query);
			return $get_price;
		}
		public function get_card_ordered($customer_id){
			$query="SELECT * FROM tbl_order,tbl_sanpham,tbl_ship where tbl_order.spId=tbl_sanpham.spId and tbl_order.shipid=tbl_ship.shipid and customers_id='$customer_id'  ";
			$get_price=$this->db->select($query);
			if($get_price)
				return $get_price;

		}
		public function check_order($customer_id){
			$sId = session_id();
			$query="SELECT *FROM tbl_order where customers_id='$customer_id' ";
			$result=$this->db->select($query);
			return $result;
		}
		public function get_inbox_cart(){

			$query="SELECT *FROM tbl_order,tbl_sanpham,tbl_customer,tbl_ship WHERE tbl_order.spId=tbl_sanpham.spId and tbl_order.customers_id=tbl_customer.id and tbl_order.shipid=tbl_ship.shipid order by date_order ";
			$get_inbox_cart=$this->db->select($query);
			return $get_inbox_cart;
		}
		public function shifted($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query="UPDATE tbl_order set status = '1' WHERE order_id='$id' and date_order='$time' and gia='$price'";
			$result=$this->db->update($query);
			if ($result) {
				$msg="Cập nhật thành công";
				return $msg;
			}else {$msg="Cập nhật thất bại"; return $msg;}

		}
		public function del_shifted($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query="DELETE FROM tbl_order WHERE order_id='$id' and date_order='$time' and gia='$price' ";
			$result=$this->db->update($query);
			if ($result) {
				$msg="Xóa thành công";
				return $msg;
			}else {$msg="Xóa thất bại"; return $msg;}
		}
		public function shifted_confirm($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query="UPDATE tbl_order set status = '2' WHERE customers_id='$id' and date_order='$time' and gia='$price'";
			$query1="SELECT * FROM tbl_order WHERE tbl_order.customers_id='$id' and date_order='$time' and gia='$price'";
			$query2="SELECT * FROM tbl_sanpham WHERE spId='$id'";
			$result=$this->db->update($query);
			$result1=$this->db->select($query1);
			if (isset($result1)) {
				$row=$result1->fetch_assoc();
				$sp_id=$row['spId'];
				$soluong_order=$row['soluong_order'];	
					$query1="UPDATE tbl_sanpham set soluong = soluong-'$soluong_order' where spId='$sp_id'";
					$kq=$this->db->update($query1);
					
			}
			
		}
		public function del_order_id($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query="UPDATE tbl_order set status = '3' WHERE order_id='$id' and date_order='$time' and gia='$price'";
			$result=$this->db->update($query);
			return $result;
		}
		public function delwish($proid,$cusid){
			$query="DELETE FROM tbl_wishlist WHERE spId='$proid' and customer_id='$cusid'";
			$result=$this->db->delete($query);
			if ($result) {
				$msg = "Xóa khỏi yêu thích thành công";
				return $msg;
			}
			else{
				$msg = "Xóa khỏi yêu thích không thành công";
				return $msg;
			}
		}
	

	}
	
?>