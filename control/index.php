<?php
include "../model/pdo.php";
include "../model/user.php";
include "../model/danhmuc.php";
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
                $describle_pd = $_POST["mota"];
                $date_add_pd = $_POST["ngaynhapsanpham"];
                $cate_id = $_POST["category"];
                $cpu = $_POST["cpu"];
                $ram = $_POST["ram"];
                $o_cung = $_POST["ocung"];
                $VGA = $_POST["VGA"];
                $manhinh = $_POST["manhinh"];
                $hdh = $_POST["hdh"];
                $color = $_POST["color"];
                product($name_pd, $price_pd, $img_pd, $describle_pd, $date_add_pd, $cate_id, $cpu, $ram, $o_cung, $VGA, $manhinh, $hdh, $color);
                // product($name_pd,$price_pd,$img_pd,$describe_pd,$date_add_pd,$cate_id,$cpu,$ram,$o_cung,$VGA,$manhinh,$hdh,$color);
                $thongbao = "them thanh cong";
            }
            $listdm = loadall_category();
            include "./sanpham/sanpham.php";
            break;
        case 'listproduct':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $keyw = $_POST['keyw'];
                $idkh = $_POST['idkh'];
            } else {
                $keyw = '';
                $idkh = 0;
            };
            $listpd = loadall_san_pham($keyw, $idkh);
            include "./sanpham/listpd.php";
            break;
        case 'xoapd':
            if (isset($_GET['id_pd']) && ($_GET['id_pd'] > 0)) {
                delete_product($_GET['id_pd']);
            }
            $listpd = loadall_san_pham("", "");
            include "./sanpham/listpd.php";
            break;
        case 'editpd':
            if (isset($_GET['id_pd']) && ($_GET['id_pd'] > 0)) {
                $editpd = loadone_san_pham($_GET['id_pd']);
            }
            // var_dump($editpd); die;
            $listdm = loadall_category();
            include './sanpham/updatepd.php';
            break;
        case 'update':
            if (isset($_POST['deocapnhat']) && ($_POST['deocapnhat'])) {
                // var_dump($name_pd, $price_pd, $img, $describle_pd, $date_add_pd, $cate_id, $cpu, $ram, $o_cung, $VGA, $manhinh, $hdh, $color, $id_pd);
                $name = $_POST['tensanpham'];
                $price = $_POST['price'];
                $imgz = $_FILES["img_pd"]["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img_pd"]["name"]);
                if (move_uploaded_file($_FILES["img_pd"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinhanh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                $describle = $_POST['mota'];
                $date_add = $_POST['ngaynhapsanpham'];
                $cate = $_POST['category'];
                $cpu_pd = $_POST['cpu'];
                $ram_pd = $_POST['ram'];
                $o_cung_pd = $_POST['ocung'];
                $VGA_pd = $_POST['VGA'];
                $manhinh_pd = $_POST['manhinh'];
                $hdh_pd = $_POST['hdh'];
                $color_pd = $_POST['color'];
                $id = $_POST['id_pd'];
                update_sanpham($name, $price, $imgz, $describle, $date_add, $cate, $cpu_pd, $ram_pd, $o_cung_pd, $VGA_pd, $manhinh_pd, $hdh_pd, $color_pd, $id);
                $thongbao = "cap nhat deo thanh cong day dmm";
            }

            // var_dump( $_POST);
            // var_dump($editmahh);
            $listpd = loadall_san_pham('', 0);
            $listdm = loadall_category();
            include './sanpham/listpd.php';
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

            //         // ---------------------------------------------------------------đăng ký - Đăng nhập-----------------------------------------//

            // =======


            /*------------------------------------------------------------------------ Dia chi cua khach hang*/
            case 'listcmt':
                $listcmt = loadall_cmt($id_cm,$id_pd,$content_cm,$date_cm);
                include "./control/cmt/listcmt.php";
                break;

            case 'xoacmt':
                if (isset($_GET['id_cm']) && ($_GET['id_cm'] > 0)) {
                    delete_cmt($_GET['id_cm']);
                }
                $listcmt = loadall_cmt("", "");
                include './control/cmt/listcmt.php';
                break;

        default:
            include "home.php";
            break;
    }
}
include "footer.php";
