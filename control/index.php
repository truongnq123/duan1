<?php
include "../model/pdo.php";
include "../model/user.php";
include "../model/danhmuc.php";
include "../model/thongso.php";
include "../model/sanpham.php";
include "../global.php";
include "headeram.php";
include "left.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            /*-----------------------------------------------------------Phần của list danh muc ---------------------------------------------------------------------*/
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenhang = $_POST["tenhang"];
                add_danhmuc($tenhang);
                $thongbao = "them thanh cong";
            }
            include "./listproduct/addlist_pd.php";
            break;
        case 'listdm':
            $listdm = loadall_category();
            include "./listproduct/listdm.php";
            break;
            /*----------------------------------------------------- Phần của thông sô sản phẩm -----------------------------------------------------------------------*/
            /*------------phần của cpu-----------*/
        case 'addcpu':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tencpu = $_POST["tencpu"];
                add_cpu($tencpu);
                $thongbao = "them thanh cong";
            }
            include "./CPU/addcpu.php";
            break;
        case 'listcpu':
            $listcpu = loadall_cpu();
            include "./CPU/listcpu.php";
            break;
            /*------------phần của ram -----------*/
        case 'addram':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenram = $_POST["tenram"];
                add_ram($tenram);
                $thongbao = "them thanh cong";
            }
            include "./RAM/addram.php";
            break;
        case 'listram':
            $listram = loadall_ram();
            include "./RAM/listram.php";
            break;
            /*------------phần của ổ cứng -----------*/
        case 'addocung':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenocung = $_POST["tenocung"];
                add_ocung($tenocung);
                $thongbao = "them thanh cong";
            }
            include "./O_CUNG/add_ocung.php";
            break;
        case 'listocung':
            $listocung = loadall_ocung();
            include "./O_CUNG/list_ocung.php";
            break;
            /*------------phần của VGA -----------*/
        case 'addvga':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $VGA = $_POST["VGA"];
                add_VGA($VGA);
                $thongbao = "them thanh cong";
            }
            include "./VGA/addvga.php";
            break;
        case 'listvga':
            $listvga = loadall_VGA();
            include "./VGA/listvga.php";
            break;
            /*------------phần của màn hình -----------*/
        case 'addmanhinh':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $manhinh = $_POST["tenmanhinh"];
                add_manhinh($manhinh);
                $thongbao = "them thanh cong";
            }
            include "./manhinh/addmanhinh.php";
            break;
        case 'listmanhinh':
            $listmh = loadall_manhinh();
            include "./manhinh/listmanhinh.php";
            break;
            /*------------phần của hệ điều hành -----------*/
        case 'addhdh':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenhdh = $_POST["hedieuhanh"];
                add_manhinh($manhinh);
                $thongbao = "them thanh cong";
            }
            include "./HDH/addhdh.php";
            break;
        case 'listhdh':
            $listhdh = loadall_hdh();
            include "./HDH/listhdh.php";
            break;
            /*------------phần của màu -----------*/
        case 'addcolor':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $mau = $_POST["mau"];
                add_color($mau);
                $thongbao = "them thanh cong";
            }
            include "./color/addcolor.php";
            break;
        case 'listcolor':
            $listcolor = loadall_color();
            include "./color/listcolor.php";
            break;
            /*--------------------------------------------------------------Phần của sản phẩm------------------------------------------------------------------------*/
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name_pd = $_POST["tensp"];
                $price_pd = $_POST["price"];
                $img_pd = $_FILES["img"]["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinhanh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                $describe_pd = $_POST["mota"];
                $date_add_pd = $_POST["ngaynhapsanpham"];
                $catid = $_POST["mota"];
                $cpu_id = $_POST["cpu"];
                $ram_id = $_POST["ram"];
                $ID_o_cung = $_POST["ocung"];
                $id_VGA = $_POST["vga"];
                $id_man_hinh = $_POST["manhinh"];
                $id_HDH = $_POST["hdh"];
                $id_color = $_POST["mau"];
                product($name_pd, $price_pd, $img_pd, $describe_pd, $date_add_pd, $catid, $cpu_id, $ram_id, $ID_o_cung, $id_VGA, $id_man_hinh, $id_HDH, $id_color);
                $thongbao = "them thanh cong";
            }
            $listcpu = loadall_cpu();
            $listram = loadall_ram();
            $listocung = loadall_ocung();
            $listvga = loadall_VGA();
            $listmh = loadall_manhinh();
            $listhdh = loadall_hdh();
            $listcolor = loadall_color();
            $listdm = loadall_category();
            include "./sanpham/sanpham.php";
            break;
            /*--------------------------------------------------------------Phần của user -----------------------------------------------------------------------------*/
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
                add_user($role, $name_user, $img_user, $age_user, $email, $active, $matkhau);
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
            $listkh = loadall_khach_hang($keyw, $idkh);
            include "./view/listkh.php";
            break;
        case 'xoauser':
            if (isset($_GET['id_us']) && ($_GET['id_us'] > 0)) {
                delete_khachhang($_GET['id_us']);
            }
            $listkh = loadall_khach_hang("", "");
            include './view/listkh.php';
            break;

        default:
            include "home.php";
            break;
    }
}
include "footer.php";
