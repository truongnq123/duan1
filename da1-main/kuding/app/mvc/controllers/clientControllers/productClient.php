<?php
require_once './app/common/bridge.php';
// lấy list
$vourchers = vc_select_show();

$list_cate = cate_select_all();
$list_pro = product_select_all();
$size_values = size_select_all();
$color_values = color_select_all();
$display = display_select_all();
// get notifi favorite
if(isset($_SESSION['customer'])){
    $client_id = $_SESSION['customer']['id'];
    $favo = favo_select_client($client_id);
    $count_favo = count($favo);
}elseif(isset($_SESSION['admin'])){
    $client_id = $_SESSION['admin']['id'];
    $favo = favo_select_client($client_id);
    $count_favo = count($favo);
}elseif(isset($_SESSION['favorite'])){
    $count_favo = count($_SESSION['favorite']);
}else{
    $count_favo = 0;
}
// xử lí nếu sp đã tồn tại favo thì cho icon heart màu đỏ

$err = array();
$err['img'] = '';
$err['cmt'] = '';
$err['imgs'] = '';
$msg = '';
$filter='';
$keys='';
$title = 'Tất cả sản phẩm';

$qr = "SELECT * FROM products WHERE status=1 ";
$total_records = count_recored("SELECT * FROM products WHERE status=1 ");
//  cate
if (isset($_GET['filtercate'])) {
    $filter = '&filtercate='.$_GET['filtercate'];
    $id_cate = $_GET['filtercate'];
    $total_records = pro_count_recored_cate($id_cate);
    $qr .= " AND cate_id='$id_cate'";
    $title = category_select_by_id($_GET['filtercate'])['name'];

} 
// nếu tìm kiếm
elseif (isset($_GET['keyword']) && isset($_GET['filter-cate'])) {

    $keys = '&filter-cate='.$_GET['filter-cate'].'&keyword='.$_GET['keyword'];
    $keyword = $_GET['keyword'];
    $id_cate = $_GET['filter-cate'];
    $title = "Kết quả tìm kiếm '$keyword'";

    if($id_cate == 'all'){
        $total_records = count_recored("SELECT * FROM products WHERE status=1 AND name LIKE '%$keyword%' ");
        $qr .= " AND name LIKE '%$keyword%' ";
    }else{
        $total_records = pro_count_recored_cate($id_cate);
        $qr .= " AND cate_id='$id_cate' AND name LIKE '%$keyword%' ";

    }
} else {
    // default
    $title = "Tất cả sản phẩm";
}
// nếu lọc giá
if(isset($_POST['btn_filter_price'])){
    extract($_POST);

    $qr .= 'AND price BETWEEN '.$min_price.' AND '.$max_price.'';
    $total_records = count_recored($qr);
}

//  search
// phân trang
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 15;
// tổng trang
$total_page = ceil($total_records / $limit);
// trang bắt đầu
$start = ($current_page - 1) * $limit;

// lấy count in ra mh
$count = count(pdo_query($qr));
$qr .= " LIMIT $start,$limit";
$db = get_connection();
$stmt = $db->prepare($qr);
$stmt->execute();
$result = $stmt->fetchAll();
if($count <= 0){
    $msg = "Không tìm thấy sản phẩm phù hợp";
}


viewClient('layout', ['page' => 'product', 'list_cate' => $list_cate, 'title' => $title, 'vourchers' => $vourchers, 'list_pro' => $result, 'total_page' => $total_page, 'current_page' => $current_page,'msg'=>$msg,'count'=>$count,'display'=>$display,
'keys'=>$keys,'filter'=>$filter,'count_favo'=>$count_favo]);
die;