<?php
session_start();
ob_start();
include "./view/header.php";
include "./model/pdo.php";
include "./model/danhmuc.php";
include "./model/card.php";
// include "./control/thanhtoan/xulithanhtoan-atm.php";
include "./model/sanpham.php";
include "./model/comment.php";
include "./model/user.php";
include "./global.php";
if (!isset($_SESSION['MyCard'])) {
    $_SESSION['MyCard'] = [];
}
$listproduct = loadall_sanpham_home();
$category = loadall_category();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'chitiet':
            if (isset($_GET['id_pd']) && ($_GET['id_pd'] > 0)) {
                $id_pd = $_GET['id_pd'];
                $onesp = loadone_san_pham($id_pd);
                extract($onesp);
                $spcl = load_sanphamcungloai($id_pd, $cate_id);
                include "./chitiet.php";
            } else {
                include "./view/main.php";
            }
            break;
        case 'billconfirm':
            if (isset($_POST['tructiep']) && ($_POST['tructiep'])) {
                if (isset($_SESSION['user'])) {
                    $iduser = $_SESSION['user']['id_us'];
                } else $id_us = 0;
                // if(isset($_SESSION['users'])) {$iduser = $_SESSION['user']['user_id'];}
                $user_name = $_POST["name"];
                $user_email = $_POST["email"];
                $user_address = $_POST["adress"];
                $user_phone = $_POST["phone"];
                $pttt = $_POST["tructiep"];
                $tongdonhang = tong();
                // Tạo bill
                $idbill = insert_bill($iduser, $user_name, $user_email, $user_address, $user_phone, $pttt, $tongdonhang);
                // var_dump($idbil);die;
                // Insert into cart: $session['mycart'] $idbill
                // $cardsp = [$hinh, $ten, $price, $soluong, $thanhtien, $id_pd];
                // var_dump($idbill);die;

                foreach ($_SESSION['MyCard'] as $cart) {
                    insert_cart($_SESSION['user']['id_us'], $cart[5], $cart[0], $cart[1], $cart[2], $cart[3], $cart[4], $idbill);
                }
                $_SESSION['card'] = [];
            }

            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include "./billconfirm.php";
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
                    $thongbao = "Tài khoản không chính xác xin hãy nhập lại!";
                }
            }
            include "./view/login.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['edit_taikhoan']) && ($_POST['edit_taikhoan'])) {
                $name_user = $_POST['username'];
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
                update_taikhoan($img_user, $age_user, $name_user, $email, $phone, $address, "", "", $id_us);

                $_SESSION['user'] = checkuser_edit($id_us, "", $name_user, $img_user, $age_user, $email, "", $matkhau, $address, $phone);
                $thongbao = "Câp nhật thông tin thành công!";
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
                $checkuser = checkuser("", $name_user, "", "", "", "", $matkhau);
                if (is_array($checkuser)) {
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
            header('Location: index.php');
            break;
        case 'addtocard':
            if (isset($_POST['addtocard']) && ($_POST['addtocard'])) {
                $id_pd = $_POST['id_pd'];
                $hinh = $_POST['hinhanh'];
                $price = $_POST['gia'];
                $ten = $_POST['ten'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                $cardsp = [$hinh, $ten, $price, $soluong, $thanhtien, $id_pd];
                array_push($_SESSION['MyCard'], $cardsp);
            }
            include "./view/giohang.php";
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
        case 'deleteCart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['MyCard'], $_GET['idcart'], 1);
            } else {
                $_SESSION['MyCard'] = [];
            }

            header('Location: ./index.php?act=giohang');
            break;

        case 'giohang':
            include './view/giohang.php';
            break;
        case 'bill':
            include './view/bill.php';
            break;
        case 'cungloai':
            if (isset($_GET['id_ct']) && ($_GET['id_ct']) >= 0) {
                $cate_id = $_GET['id_ct'];
                $listproduct = cunghang($cate_id);
                loadall_sanpham_home();
            }
            include './view/main.php';
            break;
        case 'timkiem':
            if (isset($_POST['searchpd']) && ($_POST['searchpd'])) {
                $ten_hh = $_POST['timkiem'];
            } else {
                $ten_hh = " ";
            }
            $sanpham = search_home($ten_hh);
            extract($sanpham);
            include 'allproduct.php';
            break;
        case 'mybill':
            $listbill = loadall_bill($_SESSION['user']['id_us']);
            include './view/mybill.php';
            break;
            // case 'momo-qr':
            //     if (isset($_POST['momo-qr']) && ($_POST['momo-qr'])) {
            //         $tongdonhang = tong();
            //         include "./control/thanhtoan/xulithanhtoan.php";
            //     }
            //     break;
            // case 'momo-atm':
            //     if (isset($_POST['momo-atm']) && ($_POST['momo-attm'])) {
            //         include "./control/thanhtoan/xulithanhtoan.php";
            //     }
            //     break;
            // case 'submit':
            //     if (isset($_POST['update_click'])) {
            //         function tinhtien()
            //         {
            //             $price = $_POST['price'];
            //             $quantity = $_POST['quantity'];
            //             foreach ($_SESSION['MyCard'] as $cart) {
            //                 $price=   $cart[2];
            //                 $quantity= $cart[3];
            //             }
            //             return  $cart[2];$cart[3];
            //         }
            //     }
            //     include './view/giohang.php';
            //     break;
        default:
            include "./view/main.php";
            break;
    }
} else {
    include "./view/main.php";
}
include "./view/footer.php";
