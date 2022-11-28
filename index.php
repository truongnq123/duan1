<?php
include "./view/header.php";
include "./model/pdo.php";
include "./model/user.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "../model/diachi.php";
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
        default:
            include "./view/main.php";
            break;
    }
} else {
    include "view/main.php";
}
include "view/footer.php";
