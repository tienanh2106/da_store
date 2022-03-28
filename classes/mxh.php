<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	class mxh
	{
		private $db;
		private $fm;

	
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
	    public function showmxh(){
	        $query = "SELECT * From tbl_mxh";
	        $ketqua = $this->db->select($query);
	        return $ketqua;
	    }
	    public function updatemxh($facebook,$twitter,$google){
	    	if($facebook!=''||$twitter!=''||$google!=''){
		    	$query = "UPDATE tbl_mxh set facebook='$facebook', twitter='$twitter', google='$google' where idmxh='1'";
		        $ketqua = $this->db->update($query);
		        if($ketqua){
		        	$thongbao = "<span class='success'>Sửa mạng xã hội thành công</span>";
					return $thongbao;
		        }
		        else{
		        	$thongbao = "<span class='error'>Sửa mạng xã hội không thành công</span>";
					return $thongbao;
		        }
	    	}else{
	    		$thongbao = "<span class='error'>Không được để trống</span>";
					return $thongbao;
	    	}
	    }
	}
?>