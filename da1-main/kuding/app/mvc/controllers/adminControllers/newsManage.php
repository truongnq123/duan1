<?php

require_once "./app/common/bridge.php";
callModel("newsModels");
$err = array();
$err['img'] = '';
$msg = '';
$list_news = news_select_all();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "list":

            viewAdmin('layout', ['page' => 'listNews', 'list_news' => $list_news]);
            break;
        case "add":
            if (isset($_POST['btn_add'])) {
                extract($_POST);
                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['avatar'];
                if ($file['size'] != 0) {
                    if ($file['size'] > 2097152) {
                        $err['img'] = 'Chỉ cho phép tải ảnh dưới 2mb!';
                    } else {
                        $avatar = $file['name'];
                        $ext = pathinfo($avatar, PATHINFO_EXTENSION);
                        if (!in_array($ext, $ext_img)) {
                            $err['img'] = 'Ảnh tải lên phải là jpg, png hoặc jpeg';
                        }
                    }
                } else {
                    $err['img'] = "Ảnh chưa tải lên";
                }
                if (empty($err['img'])) {
                    if ($file['size'] > 0) {
                        move_uploaded_file($file['tmp_name'], './public/images/upload/' . $avatar);
                    }
                    news_insert($title, $shortdesc, $desc, $avatar, $_SESSION['admin']['id'], $special);
                    $msg = 'Thêm tin tức thành công !';
                }
            }
            viewAdmin('layout', ['page' => 'addNews', 'msg' => $msg, 'err' => $err['img'], 'list_news' => $list_news]);
            break;

        case "update":
            if (isset($_POST['btn_update'])) {
                extract($_POST);
                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['avatar'];
                if ($file['size'] != 0) {
                    if ($file['size'] > 2097152) {
                        $err['img'] = 'Chỉ cho phép tải ảnh dưới 2mb!';
                    } else {
                        $avatar = $file['name'];
                        $ext = pathinfo($avatar, PATHINFO_EXTENSION);
                        if (!in_array($ext, $ext_img)) {
                            $err['img'] = 'Ảnh tải lên phải là jpg, png hoặc jpeg';
                        }
                    }
                }
                if (empty($err['img'])) {
                    if ($file['size'] > 0) {
                        // up ảnh new
                        move_uploaded_file($file['tmp_name'], './public/images/upload/' . $avatar);
                        // xóa ảnh cũ
                    }
                    news_update($_GET['id'],$title, $shortdesc, $desc, $avatar, $_SESSION['admin']['id'], $special);

                    $msg = 'Sửa thành công tin tức!';
                }
            }
            $newsDetail = news_select_by_id($_GET['id']);

            viewAdmin('layout', ['page' => 'updateNews', 'newsDetail' => $newsDetail, 'msg' => $msg, 'err' => $err['img'], 'list_news' => $list_news]);
            break;

        case "del":
            news_del($_GET['id']);
            $img = news_select_by_id($_GET['id']);
            unlink('./public/images/upload/' . $img['avatar']);
            $msg = "Xóa thành công 1 tin tức!";

            header('location: news?msg=Xóa thành công tin tức');

            break;
        default:
            viewAdmin('layout', ['page' => 'listNews', 'list_news' => $list_news]);
            break;
    }
}
viewAdmin('layout', ['page' => 'listNews', 'list_news' => $list_news]);
