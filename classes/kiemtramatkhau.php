<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php 
    /**
     * 
     */
    class admin
    {
        private $db;
        private $fm;

        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function update_matkhau($admin_pass_old,$admin_pass_new,$id)
        {   
            $admin_pass_new = mysqli_real_escape_string($this->db->link, md5($admin_pass_new));
            $admin_pass_old = mysqli_real_escape_string($this->db->link, md5($admin_pass_old));
            $id = mysqli_real_escape_string($this->db->link, $id);
            
            
                $query = "SELECT * FROM tbl_customer WHERE id = '$id' AND password = '$admin_pass_old'" ;
                $ketqua = $this->db->select($query);
                if($ketqua)
                {
                    $query_update = "UPDATE tbl_customer SET password = '$admin_pass_new' where id = '$id'" ;
                    $ketqua_update = $this->db->update($query_update);
                    if($ketqua_update)
                    {
                        $thongbao = "Cập nhật mật khẩu thành công";
                        return $thongbao;
                    }
                    else
                    {
                        $thongbao = "Cập nhật mật khẩu không thành công";
                    return $thongbao;
                    }
                }               
                else
                {
                    $thongbao = "Mật khẩu cũ sai";
                    return $thongbao;
                }
        }
        
    }
?>