<?php
session_start();
ob_start();
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
            // if(isset($_POST['nameuser'])&& isset($_POST['pass'])){
            //     function validate($data){
            //         $data = trim($data);
            //         $data = stripslashes($data);
            //         $data = htmlspecialchars($data);
            //         return $data;

            //         $name_user_err=validate($_POST['nameuser']);
            //         $pass_err=validate($_POST['pass']);

            //         if(empty($name_user_err)){
            //             header('location: .view/login.php?error=chưa nhập tên đăng nhập');
            //         }else if(empty($pass_err)){
            //             header('location: .view/login.php?error=chưa nhập mật kh');
            //         }
            //      }
            // }
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $name_user = $_POST['nameuser'];
                $matkhau = $_POST['pass'];
                $checkuser = checkuser("", $name_user, "", "", "", "", $matkhau);

                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    $thongbao = "Bạn đã đăng nhập thành công!";
                    header("Location: ./index.php");
                } else {
                    $thongbao = "Tài khoản không chính xác xin hãy nhập lại!";
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
                $id_us = $_POST['id_us'];
                $age_user = $_POST['birthday'];

                $img_user = $_FILES["hinh"]["name"];
                $target_dir = "./upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinhanh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_taikhoan($img_user, $age_user, $id_us, $name_user, $email, $phone, $address);
                $_SESSION['user'] = checkuser_edit($id_us,"", $name_user, $img_user, $age_user, $email, "", $matkhau, $address, $phone);
                $thongbao = "Câp nhật thông tin thành công!";
                // echo '<script>alert("cập nhập thành công") </script>';
                // header('location: index.php?act=edit_taikhoan');
                // header('location: ./view/edit_taikhoan.php');
                
            }
            include "./view/edit_taikhoan.php";
            $thongbao = "tài khoản bạn đã cập nhật";
            break;
        case 'change_password':
            if (isset($_POST['capnhapmk']) && ($_POST['capnhapmk'])) {
                $id_us = $_POST['id_us'];
                $pass_old = $_POST['pass_old'];
                $pass_new = $_POST['pass_new'];
                $reapass = $_POST['reapass'];
                // $checkpass =  checkpass("", "", "", "", "", "", $pass_old, $id_us);
                $checkuser = checkuser("", $name_user, "", "", "", "", $matkhau);
                if (is_array($checkuser)) {
                    // $_SESSION['user']['matkhau'] === $_POST['pass_old'];
                    // $thongbao = "mật khẩu cũ không chính xác ";
                    if ($_SESSION['user']['matkhau'] === $_POST['pass_old']) {
                        if ($_POST['pass_new'] === $_POST['reapass']) {
                            update_pass($id_us, $pass_new);
                            $thongbao = "Thay đổi thành Công ( ghi nhớ mật khẩu vừa rồi thoát ra đăng nhập lại)  !";
                        } else {
                            $thongbao = "Pass và repass không khớp !";
                        }
                    } else {
                        $thongbao = "mật khẩu cũ không đúng !";
                    }
                }
            }
            include "./view/change_password.php";
            break;
        case 'out':
            session_unset();
            header('Location: ./index.php');
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = " mật khẩu của bạn là:" . $checkemail['matkhau'];
                    // include "./view/forgot-pass.php";
                } else {
                    $thongbao = "Email này không tồn tại";
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
