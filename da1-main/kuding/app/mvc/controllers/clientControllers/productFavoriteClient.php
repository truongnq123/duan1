<?php
require_once './app/common/bridge.php';

// dd
$display = display_select_all();
$vourchers = vc_select_show();

// lấy list favorite
$list_favo = [];
if (isset($_SESSION['admin'])) {
    unset($_SESSION['favorite']);

    $client_id = $_SESSION['admin']['id'];
    $list_favo = favo_select_client($client_id);
    // get attr

    $count_favo = count($list_favo);
} else if (isset($_SESSION['customer'])) {
    unset($_SESSION['favorite']);
    
    $client_id = $_SESSION['customer']['id'];
    $list_favo = favo_select_client($client_id);
    // get attr
    
    $count_favo = count($list_favo);
} elseif (isset($_SESSION['favorite'])) {
    $list_favo = $_SESSION['favorite'];
    $count_favo = count($list_favo);
}else{
    $count_favo = 0;

}


// echo "<pre>";
// print_r($arr_pro_id);die;

$list_cate = cate_select_all();
$size_values = size_select_all();
$color_values = color_select_all();

$err = array();
// tạo 2 mảng rỗng để chứa name
$color_name = [];
$size_name = [];
$msg = '';
// echo "<pre>";
// var_dump($_SESSION['favorite']);die;
if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        case "del":
            $id = $_GET['id'];
            // ktra lưu ss hay db
            if (isset($_SESSION['favorite'])) {
                unset($_SESSION['favorite'][$id]);
            } else {
                favo_del($client_id, $id);
            }
            header('location: productFavoriteClient?msg=Xóa thành công');
            break;
        case 'add':
            // thu thập data từ ajax gửi vào
            $id = $_GET['pro_id'];
            // show
            $pros = product_select_by_id($id);
            // laasy attr value sp
            $color_id = [];
            $size_id = [];
            // chuyển mảng 2 chieefu về thành chuỗi

           
            foreach (color_select_pro($id) as $c) {
                array_push($color_id, $c['value_id']);
            }
            foreach (size_select_pro($id) as $s) {
                array_push($size_id, $s['value_id']);
            }

            // lặp và lấy name bỏ vào mảng;
            foreach ($color_id as $c) {
                array_push($color_name, select_name_value_pro($c)); // lại là mảng 3 chìu
            }
            foreach ($size_id as $s) {
                array_push($size_name, select_name_value_pro($s)); // lại là mảng 3 chìu
            }

            // neeus chua login thi luu ss
            if (!isset($_SESSION['customer']) && !isset($_SESSION['admin'])) {
                $quantity = 1;
                if (isset($_SESSION['favorite'][$id])) {
                    $msg = "Sản phẩm đã được bạn lưu trước đó!";
                } else {
                    $item = [
                        'pro_id' => $pros['id'],
                        'name' => $pros['name'],
                        'price' => $pros['price'] - $pros['discount'],
                        'avatar' => $pros['avatar'],
                        'color_name' => $color_name,
                        'size_name' => $size_name,
                    ];
                    $_SESSION['favorite'][$id] = $item;
                    $msg = "Thêm thành công sản phẩm yêu thích!";

                }
              
            } else {
                // huyr ss favo
                unset($_SESSION['favorite']);
                $favo_exist = favo_select_by_pro($id);
                $msg = "Sản phẩm đã được bạn lưu trước đó!";
                if (count($favo_exist) != 0) {
                    // đã tồn tại, méo thêm nữa
                } else {
                    // da login luu database
                    favo_insert($id, $client_id);
                    $msg =  "Thêm thành công sản phẩm yêu thích!";
                }
            }

            echo $msg;
            die;

            break;
    }
}
viewClient("layout", ['page' => 'favorite', 'display' => $display, 'list_cate' => $list_cate, 'vourchers' => $vourchers, 'color_name' => $color_name, 'size_name' => $size_name, 'list_favo' => $list_favo,'count_favo'=>$count_favo,'count_favo'=>$count_favo,'msg'=>$msg]);
