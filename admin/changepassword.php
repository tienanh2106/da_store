<?php include_once 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/kiemtramatkhau.php';?>
<?php
    $id = session::get('adminId');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {

        $admin_pass_old = $_POST['admin_pass_old'] ;
        $admin_pass_new = $_POST['admin_pass_new'] ;
        $conf_admin_pass_new = $_POST['conf_admin_pass_new'];
        if($admin_pass_old == null || $admin_pass_new == null || $conf_admin_pass_new == null)
        {
            echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ');</script>";
        }
        elseif($admin_pass_new == $admin_pass_old || $admin_pass_old == $conf_admin_pass_new)
        {
            echo "<script type='text/javascript'>alert('Mật khẩu cũ và mật khẩu mới không được trùng nhau');</script>";
        }
        elseif($admin_pass_new != $conf_admin_pass_new)
        {
            echo "<script type='text/javascript'>alert('Vui lòng xác nhận lại mật khẩu mới');</script>";
        }
        else
        {

            $admin = new admin();
            $update_matkhau = $admin -> update_matkhau($admin_pass_old,$admin_pass_new,$id);
            if($update_matkhau)
            {
                echo "<script type='text/javascript'>alert('$update_matkhau');</script>";
            }
        }
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thay đổi mật khẩu</h2>
        <div class="block">  
         <form action="" method="post">
            <table class="form">                    
                <tr>
                    <td>
                        <label>Mật Khẩu Cũ</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Điền mật khẩu cũ..."  name="admin_pass_old" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mật Khẩu Mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Điền mật khẩu mới..." name="admin_pass_new" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Xác nhận mật Khẩu Mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Điền mật khẩu mới..." name="conf_admin_pass_new" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>