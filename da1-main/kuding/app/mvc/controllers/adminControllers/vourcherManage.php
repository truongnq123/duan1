<?php

require_once "./app/common/bridge.php";
callModel("vourcherModels");
// lấy list
$list_vour = vc_select_all();
$err = '';


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":

            if (isset($_POST['btn_add'])) {
                extract($_POST);
                // check loại giảm
                if ($cate_code == 'y') {
                    // % 1, time() tg dự phòng, date tự lấy tg hiện tại
                    // $codes = strtoupper($code);
                    // check mã code exsit?
                    $code_exist = vc_select_code($code);
                    if (is_array($code_exist)) {
                        $err = "Mã code đã tồn tại, vui lòng nhập mã khác!";
                    }else{
                        if (empty($err)) {
                            vc_insert($name_vour, $code, $sale, $quantity, 1, date('Y-m-d h:i:s a', time()), $expired_date);
                            header('location: vourcher?msg=Thêm thành công 1 mã giảm giá');
                        }
                    }
                } else {
                    // tiền 0
                    vc_insert($name_vour, $code, $sale, $quantity, 0, date('Y-m-d h:i:s a', time()), $expired_date);
                    header('location: vourcher?msg=Thêm thành công 1 mã giảm giá');
                }
            }

            viewAdmin('layout', ['page' => 'addVourcher', 'err' => $err]);
            break;
        case "list":

            viewAdmin('layout', ['page' => 'listVourcher', 'list_vour' => $list_vour]);
            break;
        case "del":
            // xóa ở vc
            vc_del($_GET['id']);
            // xóa ở vc detail
            vc_detail_del($_GET['id']);
            header('location: vourcher?msg=Xóa thành công 1 mã giảm giá!');
            break;
    }
}
viewAdmin('layout', ['page' => 'listVourcher', 'list_vour' => $list_vour]);
