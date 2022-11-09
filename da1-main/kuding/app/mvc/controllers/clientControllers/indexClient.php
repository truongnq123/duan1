<?php
require_once "./app/common/bridge.php";
// dd

$display = display_select_all();
$list_cate = cate_select_all();
// img cate banner
$cate_banner = category_select_special();
$pro_top10 = pro_select_top10();
// all qty sp
$qty_pros = pdo_query("SELECT id,quantity FROM products");


$pro_topview = pro_select_view();
// lấy list
$list_vour = vc_select_all();
// sp đặc biệt để hiển thị 
$pro_special = pro_select_special();
// lấy vourcher
$vourchers = vc_select_show();
// lấy new special
$news_special = news_select_special();
$news_special2 = news_select_special2();
// notifi favorite
if (isset($_SESSION['customer'])) {
    $client_id = $_SESSION['customer']['id'];
    $favo = favo_select_client($client_id);
    $count_favo = count($favo);
} elseif (isset($_SESSION['admin'])) {
    $client_id = $_SESSION['admin']['id'];
    $favo = favo_select_client($client_id);
    $count_favo = count($favo);
} elseif (isset($_SESSION['favorite'])) {
    $count_favo = count($_SESSION['favorite']);
} else {
    $count_favo = 0;
}

// xử lí nếu hết hạn voucher thì update status -> 0
if (is_array($list_vour)) {
    foreach ($list_vour as $vc) {
        // lặp + ktra nêú  ngày hiện tại => ngày hết hạn mã -> update hết hạn
        if (strtotime(date('Y-m-d H:i:s', time())) >= strtotime($vc['expired_date'])) {
            // update tình trạng về hết hiệu lực
            vc_update_status($vc['id'], 0);
        }
        // nếu số lượng =0 thì cập nhật status = 0;
        if ($vc['quantity'] == 0) {
            vc_update_status($vc['id'], 0);
        }
    }
}
// xử lí nếu hết số lg sản phẩm thì update status -> 0
if(count($qty_pros) > 0){
    foreach($qty_pros as $qty){
        if($qty['quantity'] <= 0){
            pdo_execute("UPDATE products SET status=0 WHERE id=".$qty['id']);
        }
    }
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        default:
            viewClient('layout', ['page' => 'homepage', 'list_cate' => $list_cate, 'pro_special' => $pro_special, 'vourchers' => $vourchers, 'pro_top10' => $pro_top10, 'pro_topview' => $pro_topview, 'news_special' => $news_special, 'news_special2' => $news_special2, 'cate_banner' => $cate_banner, 'count_favo' => $count_favo]);
            break;
    }
} else
    viewClient('layout', ['page' => 'homepage', 'list_cate' => $list_cate, 'pro_special' => $pro_special, 'vourchers' => $vourchers, 'pro_top10' => $pro_top10, 'pro_topview' => $pro_topview, 'news_special' => $news_special, 'news_special2' => $news_special2, 'cate_banner' => $cate_banner, 'display' => $display, 'count_favo' => $count_favo]);
