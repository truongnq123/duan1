<?php
session_start();
include "./view/header.php";
include "./model/pdo.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/diachi.php";
include "./model/user.php";
include "./global.php";
$listproduct = loadall_sanpham_home();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':

            break;
        case 'chitiet':
            if (isset($_GET['id_pd']) && ($_GET['id_pd'] > 0)) {
                $id_pd = $_GET['id_pd'];
                $onesp = loadone_san_pham($id_pd);
                extract($onesp);
                include "./chitiet.php";
            } else {
                include "view/main.php";
            }
            break;
        case 'oder_pd':
            if (isset($_GET['id_pd']) && ($_GET['id_pd'] > 0)) {
                $id_pd = $_GET['id_pd'];
                $onesp = loadone_san_pham($id_pd);
                extract($onesp);
                include "./giohang.php";
            } else {
                include "./view/main.php";
            }
            break;
        case 'diachi':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $adress = $_POST["adress"];
                add_ttkh($name, $phone, $email, $adress);
                $thongbao = "them thanh cong";
            }
            include "thanhtoanmomo.php";
            break;
        case 'dangky':
            if ((isset($_POST['dangky'])) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $name_user = $_POST['nameuser'];
                $matkhau = $_POST['pass'];
                $repass = $_POST['repass'];
                if ($_POST['pass'] === $_POST['repass']) {
                    add_user("", $name_user, "", "", $email, "", $matkhau, $repass);
                    $thongbao = "Bạn đã đăng ký thành công !";
                } else {
                    $thongbao = "Pass và repass không khớp !";
                }
            }
            include "./view/register.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $name_user = $_POST['nameuser'];
                $matkhau = $_POST['pass'];
                $checkuser = checkuser("", $name_user, "", "", "", "", $matkhau);

                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    $thongbao = "Bạn đã đăng nhập thành công!";
                    header("Location: ./index.php");
                } else {
                    $thongbao = "Tài khoản đã tồn tại!";
                }
            }
            include "./view/login.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['edit_taikhoan']) && ($_POST['edit_taikhoan'])) {
                $name_user = $_POST['username'];
                // $matkhau = $_POST['pass'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                update_taikhoan($id_us, $name_user, $email, $phone, $address);
                $_SESSION['user'] = checkuser_edit("", $name_user, "", "", $email, "", $matkhau, $address, $phone);
                // echo '<script>alert("cập nhập thành công") </script>';
                $thongbao = "tài khoản bạn đã cập nhật";
                header('location: index.php?act=edit_taikhoan');
            }
            include "./view/edit_taikhoan.php";
            break;


        case 'out':
            session_unset();
            header('Location: ./index.php');
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail=checkemail($email);
                if(is_array($checkemail)){
                    $thongbao= " mật khẩu của bạn là:" .$checkemail['matkhau'];
                    // include "./view/forgot-pass.php";
                }else{
                    $thongbao= "Email này không tồn tại";
                    include "./view/forgot-pass.php";
                }
            }
            include "./view/forgot-pass.php";
            break;
        default:
            include "./view/main.php";
            break;
    }
} else {
    include "view/main.php";
}
include "./view/footer.php";
