<?php
session_start();
include "./view/header.php";
include "./model/pdo.php";
include "./model/user.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/diachi.php";
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
                include "./view/main.php";
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
            include "./thanhtoanmomo.php";
            break;
        case 'dangky':
            if ((isset($_POST['dangky'])) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $username, $pass);
                $thongbao = "Bạn đã đăng ký thành công !";
            }
            include "./view/dangky/register.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['username'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;

                    header('location: ../index.php');
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
} else {
    include "./view/main.php";
}
include "./view/footer.php";
