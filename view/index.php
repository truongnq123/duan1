<?php
// session_start();
// ob_start();
include "../model/pdo.php";
include "../model/login.php";
include "../view/user/header.php";

include "../global.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangky':
            $username_err = $email_err = $pass_err = $phone_err = "";
            $username = $email = $pass = $phone = "";
            if($_SERVER["REQUEST_METHOD"]== "POST"){
                if(empty($_POST["username"])){
                     $username_err ="chưa nhập tên đăng nhập";
                }
            }
            if((isset($_POST['dangky'])) && ($_POST['dangky'])) {
                
                $email = $_POST['email'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $phone = $_POST['phone'];
                insert_taikhoan($email, $username, $pass, $phone);
                $thongbao = "Bạn đã đăng ký thành công !";
                echo "<script>alert('Đăng kí tài khoản thành công!')</script>";
            }

            include "../view/dangky/register.php";
            break;
        case 'dangnhap':

            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $username = $_POST['username'];
                $pass = $_POST['pass'];
               $kq=checkuser($username,$pass);
               $role=$kq[0]['role'];
               if($kq[0]['role']==1){
                   $_SESSION['role']=$role;
                   header('location: ../control/index.php');
               }else{
                $_SESSION['role']=$role;
                $_SESSION['id_ac']=$kq[0]['id_ac'];
                $_SESSION['username']=$kq[0]['username'];
                header('location:../index.php');
       
               }
            }
            include "../view/dangky/login.php";
            break;
            
        case 'out':
            session_unset();
            header('location: ../index.php');
            break;

        case 'forgot-pass':
            include "../view/dangky/forgot-pass.php";
            break;


        default:
            include "../view/user/main.php";
            break;
    }
} else {
    include "../view/user/main.php";
}
include "../view/user/footer.php";