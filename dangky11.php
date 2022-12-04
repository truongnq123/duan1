<?php
session_start();
include "./model/pdo.php";
include "./model/login.php";
include "./model/login.php";

include "./view/header.php";


include "global.php";

if ((isset($_GET['act'])) && ($_GET['act']!="")){
    $act = $_GET['act'];
    switch ($act) {
        case 'dangky':
            if((isset($_POST['dangky'])) &&($_POST['dangky'])){
                $email = $_POST['email'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $username, $pass,$phone);
               $thongbao = "Bạn đã đăng ký thành công !";
            }
            include "./view/user/dangky/register.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['username'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;

                    header('location: index.php');
                    $thongbao = "Bạn đã đăng nhập thành công!";
                } else {
                    $thongbao = "Tài khoản đã tồn tại!";
                }
            }
            include "./view/dangky/login.php";
            break;
        case 'out':
            session_unset();
            header('location: index.php');
         break;

        
        default:
        include "./view/main.php";
            break;
    }
}else{
    include "./view/main.php";
}   
include "./view/footer.php";
?>