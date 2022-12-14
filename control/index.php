<?php
session_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    include "../model/pdo.php";
    include "../model/user.php";
    include "../model/danhmuc.php";
    include "../model/thongke.php";
    include "../model/card.php";
    include "../model/sanpham.php";
    include "../model/comment.php";
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
                    $img_pd = $_FILES["anh"]["name"];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["hinhanh"]["name"])) . " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                    add_danhmuc($tenhang, $img_pd);
                    $thongbao = "them thanh cong";
                }
                include "./listproduct/addlist_pd.php";
                break;
            case 'listdm':
                $listdm = loadall_category();
                include "./listproduct/listdm.php";
                break;
            case 'xoadm':
                if (isset($_GET['id_ct']) && ($_GET['id_ct'] > 0)) {
                    delete_dm($_GET['id_ct']);
                }
                $listdm = loadall_category();
                include "./listproduct/listdm.php";
                break;
            case 'editdm':
                if (isset($_GET['id_ct']) && ($_GET['id_ct'] > 0)) {
                    $editct = loadone_dm($_GET['id_ct']);
                }
                $listdm = loadall_category();
                include './listproduct/updatedm.php';
                break;
            case 'updatedm':
                if (isset($_POST['deocapnhat']) && ($_POST['deocapnhat'])) {
                    // var_dump($name_pd, $price_pd, $img, $describle_pd, $date_add_pd, $cate_id, $cpu, $ram, $o_cung, $VGA, $manhinh, $hdh, $color, $id_pd);
                    $name_ct = $_POST['tenhang'];
                    $img_ct = $_FILES["anh"]["name"];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["hinhanh"]["name"])) . " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                    $id_ct = $_POST['id_ct'];
                    update_dm($name_ct, $img_ct, $id_ct);
                    $thongbao = "cap nhat deo thanh cong ";
                }
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
                    $Thongtin = $_POST["thongtin"];
                    add_product($name_pd, $price_pd, $img_pd, $describle_pd, $date_add_pd, $cate_id, $cpu, $ram, $o_cung, $VGA, $manhinh, $hdh, $color, $Thongtin);
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
                    $thongtin = $_POST['thongtin'];
                    $id = $_POST['id_pd'];
                    update_sanpham($name, $price, $imgz, $describle, $date_add, $cate, $cpu_pd, $ram_pd, $o_cung_pd, $VGA_pd, $manhinh_pd, $hdh_pd, $color_pd, $thongtin, $id,);
                    $thongbao = "cap nhat thanh cong ";
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
            case 'suauser':
                if (isset($_GET['id_us']) && ($_GET['id_us'] > 0)) {
                    $edit_user = loadone_khach_hang($_GET['id_us']);
                }
                // var_dump($editpd); die;
                $listkhachhang =  loadall_khach_hang("", 0);
                include './view/updateuser.php';
                break;
            case 'update_user':
                if (isset($_POST['capnhap_user']) && ($_POST['capnhap_user'])) {
                    // var_dump($name_pd, $price_pd, $img, $describle_pd, $date_add_pd, $cate_id, $cpu, $ram, $o_cung, $VGA, $manhinh, $hdh, $color, $id_pd);
                    $img_user = $_FILES["hinh"]["name"];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["hinhanh"]["name"])) . " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                    $age_user = $_POST['birthday'];
                    $name_user = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $role = $_POST["role"];
                    $active = $_POST['status'];
                    $id_us = $_POST['id_us'];
                    update_taikhoan($img_user, $age_user, $name_user, $email, $phone, $address, $role, $active, $id_us);
                    $thongbao = "Câp nhật thông tin thành công!";
                }
                $listkh =  loadall_khach_hang("", 0);
                include './view/listkh.php';
                break;
                // ---------------------------------------------------------------đăng ký - Đăng nhập-----------------------------------------//


                /*------------------------------------------------------------------------ Dia chi cua khach hang*/

            case 'listcmt':
                if (isset($_GET['id_cm']) && ($_GET['id_cm'] > 0)) {
                    delete_product($_GET['id_cm']);
                }
                $listcmt = loadall_cmt(0);
                include "../control/cmt/listcmt.php";
                break;

            case 'xoacmt':
                if (isset($_GET['id_cm']) && ($_GET['id_cm'] > 0)) {
                    delete_cmt($_GET['id_cm']);
                }
                $listcmt = loadall_cmt();
                include './cmt/listcmt.php';
                break;
            case 'thongke':
                $list_thongke = load_list_thongke();
                include "./thongke/list_thongke.php";
                break;
            case 'bieudo';
                $list_thongke = load_list_thongke();
                include "./thongke/bieudo.php";
                break;
            case 'listdonhang':
                $listdonhang = loadall_bill_control();
                include "./donhang/listdonhang.php";
                break;
            case 'xoabill':
                if (isset($_GET['bill_id']) && ($_GET['bill_id'] > 0)) {
                    delete_bill($_GET['bill_id']);
                }
                $listdonhang = loadall_bill_control();
                include './donhang/listdonhang.php';
                break;
            case 'thoat':
                session_unset();
                header('Location: login.php');
                break;
            default:
                include "home.php";
                break;
        }
    }
    include "footer.php";
} else {
    header('location: login.php');
}
