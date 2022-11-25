<?php
session_start();
ob_start();
include "../model/pdo.php";
include "../model/login.php";
include "../view/user/header.php";

include "../global.php";

if ((isset($_GET['act'])) && ($_GET['act']!="")){
    $act = $_GET['act'];
    switch ($act) {
        case 'dangky':
            
            if((isset($_POST['dangky'])) &&($_POST['dangky'])){
                $email = $_POST['email'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $phone = $_POST['phone'];
                insert_taikhoan($email, $username, $pass,$phone);
               $thongbao = "Bạn đã đăng ký thành công !";
               echo "<script>alert('Đăng kí tài khoản thành công!')</script>";
            }
            // $acc_exist = acc_select_by_email($_GET['email']);
            // if (is_array($acc_exist)) {
            //     echo "<script>alert('Email đã đăng kí, nhập email khác')</script>";
            // }
            
            include "../view/dangky/register.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['username'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['username'] = $checkuser;
                    // echo "<script>alert('Đăng kí tài khoản thành công!')</script>";
                    header('location: ../index.php');
                    
                    $thongbao = "Bạn đã đăng nhập thành công!";
                } else {
                    $thongbao = "Tài Khoản không chính xác!";
                }
            }
            include "../view/dangky/login.php";
            break;
        case 'out':
            session_unset();
            header('location: ../index.php');
         break;

        
        default:
        include "./view/user/main.php";
            break;
    }
}else{
    include "../view/user/main.php";
}   
include "../view/user/footer.php";
?>