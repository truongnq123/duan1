<?php
include "../model/pdo.php";
include "../model/user.php";
include "../global.php";
include "headeram.php";
include "left.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'addkh':
            
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $role = $_POST["role"];
                $name_user = $_POST["name"];
                $img_user = $_FILES["hinh"]["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinhanh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                $age_user = $_POST['birthday'];
                $email = $_POST['email'];
                $active = $_POST['status'];
                $matkhau = $_POST['matkhau'];
                add_user($role,$name_user, $img_user, $age_user, $email, $active,$matkhau);
                // var_dump(add_user("",$name_user, $img_user, $age_user, $email, $active,$matkhau));die;
                $thongbao = "them thanh cong";
            }
            
            include "./view/khachhang.php";
            break;
        case 'listuser':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $keyw = $_POST['keyw'];
                $idkh = $_POST['idkh'];
            } else {
                $keyw = '';
                $idkh = 0;
            };
            $listkh = loadall_khach_hang($keyw,$idkh);
            include "./view/listkh.php";
            break;
            case 'xoauser':
                if (isset($_GET['id_us']) && ($_GET['id_us'] > 0)) {
                    delete_khachhang($_GET['id_us']);
                }
                $listkh = loadall_khach_hang("","");
                include './view/listkh.php';
                break;
// <<<<<<< HEAD

//         // ---------------------------------------------------------------đăng ký - Đăng nhập-----------------------------------------//
        
// =======
            
// >>>>>>> 8d349f0d34ccbae6fc88f50069e18ccc07feaf70
        default:
            include "home.php";
            break;
    }
}
include "footer.php";
