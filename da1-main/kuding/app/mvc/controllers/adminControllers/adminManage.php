<?php
require_once "./app/common/bridge.php";

if (!isset($_SESSION['admin'])) {
    header("location: account?action=loginAdmin");
} else
    $time_stamp = date('Y-m-d H:i:s');
//  xử lí thống kê render ra index admin
// + doanh thu 
$doanh_thu_nam = pdo_query_value("SELECT SUM(total_price) as doanhthu FROM orders WHERE status=2 AND  YEAR(created_at) = YEAR('$time_stamp')");
// doanh thu theo 12 tháng trong năm
$doanh_thu_thang = pdo_query("SELECT MONTH(created_at) as thang,SUM(total_price) as doanhthu FROM orders WHERE status=2 AND YEAR(created_at)=YEAR('$time_stamp')  GROUP BY MONTH(created_at) ORDER BY MONTH(created_at) ASC");
// + Lợi nhuận trước thuế


// THỐNG KÊ ĐƠN HÀNG IN NOW
$total_order = pdo_query_value("SELECT count(*) FROM orders");
$total_order_year = pdo_query_value("SELECT count(*) FROM orders WHERE YEAR(created_at)=YEAR('$time_stamp')");
// tổng hợp đơn

// đơn bị hủy
$cancel_order = pdo_query_value("SELECT count(*) FROM orders WHERE status=3 AND YEAR(created_at)=YEAR('$time_stamp')");
// số đơn hàng đang xử lí
$processing_order = pdo_query_value("SELECT count(*) FROM orders WHERE status=1 AND YEAR(created_at)=YEAR('$time_stamp')" );
// số đơn hàng đang xử lí
$sent_order = pdo_query_value("SELECT count(*) FROM orders WHERE status=2 AND YEAR(created_at)=YEAR('$time_stamp')");
// số đơn hàng chưa xử lí
$unprocess_order = pdo_query_value("SELECT count(*) FROM orders where status=0 AND YEAR(created_at)=YEAR('$time_stamp')");
// đơn chờ xn

// % đơn hàng chưa process
$percent_un_order = number_format($unprocess_order / $total_order * 100, 2, '.', ',');

// tổng sl sp theo danh mục
$qty_product_cate = pdo_query("SELECT c.name ,COUNT(p.id) as 'quantity' FROM products p,categories c WHERE c.id=p.cate_id GROUP BY c.name;
");
// tổng all sp
$qty_all_pros = pdo_query_value("SELECT COUNT(id) FROM products");
// sp sp bán chạy trong năm

// list bán ra trong năm
$dh_ban_ra = pdo_query("SELECT COUNT(o.id) as qty,MONTH(o.created_at) as 'month' FROM orders o WHERE o.status=2 AND YEAR(o.created_at)=2021 GROUP BY MONTH(o.created_at);
");

// nếu là nv 
if($_SESSION['admin']['role_id'] == 2){
    header('location: order');
}else{
    viewAdmin("layout", [
        'page' => 'index',
        'total_orders' => $total_order,
        'total_orders_year' => $total_order_year,
        'unprocess_order' => $unprocess_order,
        'percent_un_order' => $percent_un_order,
        'doanh_thu_nam' => $doanh_thu_nam,
        'doanh_thu_thang' => $doanh_thu_thang,
        'qty_all_pros' => $qty_all_pros,
        'cancel_order' => $cancel_order,
        'processing_order' => $processing_order,
        'sent_order' => $sent_order,
        'qty_product_cate'=>$qty_product_cate,
        'dh_ban_ra'=>$dh_ban_ra,
    
    
    ]);
}



