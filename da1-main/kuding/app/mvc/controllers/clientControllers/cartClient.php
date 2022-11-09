<?php
require_once "./app/common/bridge.php";

$display = display_select_all();
$list_cate = cate_select_all();
$vourchers = vc_select_show();
// favo
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

// lấy sp đề xuất
$recommended = pdo_query("SELECT * FROM products ORDER BY RAND() LIMIT 0,10");
$msg = '';
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        case "del":
            // get pro id
            $id = $_GET['id'];
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['cart_id'] == $id) {
                    unset($_SESSION['cart'][$key]);
                }
            }
            header('location: cartClient?action=viewList&msg=Hủy thành công 1 sản phẩm ra giỏ hàng!');
            die;
            break;
    }
}
// POST
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'update_cart':
            $id = $_POST['cart_id'];
            // get qty pros
            $qty_pro = pdo_query_value("SELECT quantity FROM products WHERE id=" . $_POST['pro_id']);

            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['cart_id'] == $id) {
                    // check slg hợp lệ
                    if ($qty_pro >= $_POST['quantity']) :
                        $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
                        $msg = "Cập nhật thành công số lượng sản phẩm";
                    else :
                        $msg = "Không thể tăng thêm số lượng mua vì hiện tại chỉ còn ".$qty_pro." sản phẩm";
                    endif;
                    break;
                }
            }
            break;

        default:
            // thêm mới item
            $id = $_POST['pro_id'];
            $pros = product_select_by_id($id);

            if (isset($_SESSION['cart'])) {
                $item_array_id = array_column($_SESSION['cart'], 'id');
                // case chưa tôn tại sp trong cart
                $count = count($_SESSION['cart']);
                if (!in_array($id, $item_array_id)) {
                    // tạo item giỏ hàng
                    $item = [
                        'cart_id' => $count += 1,
                        'id' => $pros['id'],
                        'name' => $pros['name'],
                        'price' => $pros['price'] - $pros['discount'],
                        'avatar' => $pros['avatar'],
                        'color' => $_POST['color'],
                        'size' => $_POST['size'],
                        'quantity' => $_POST['quantity']
                    ];
                    $_SESSION['cart'][$count] = $item;
                }
                // đã tồn tại loại sp đó
                else {
                    // khác attr thì thêm mới
                    // nếu đã exist, cùng attr-> increase qty
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if ($value['id'] == $id) {
                            // cùng attr -> increase qty
                            if ($value['size'] == $_POST['size'] && $value['color'] == $_POST['color']) {
                                $_SESSION['cart'][$key]['quantity'] += $_POST['quantity'];
                                break;
                            } else {
                                // add new item
                                $item = [
                                    'cart_id' => $count += 1,
                                    'id' => $pros['id'],
                                    'name' => $pros['name'],
                                    'price' => $pros['price'] - $pros['discount'],
                                    'avatar' => $pros['avatar'],
                                    'color' => $_POST['color'],
                                    'size' => $_POST['size'],
                                    'quantity' => $_POST['quantity']
                                ];
                                $_SESSION['cart'][$count] = $item;
                                break;
                            }
                        }
                    }
                }
            }
            // not exist ss cart-> add new
            else {
                $item = [
                    'cart_id' => 0,
                    'id' => $pros['id'],
                    'name' => $pros['name'],
                    'price' => $pros['price'] - $pros['discount'],
                    'avatar' => $pros['avatar'],
                    'color' => $_POST['color'],
                    'size' => $_POST['size'],
                    'quantity' => $_POST['quantity']
                ];
                $_SESSION['cart'][0] = $item;
            }

            // echo "<pre>";
            // print_r($_SESSION['cart']);
            // die;

            break;
    }
}
viewClient('layout', ['page' => 'cart', 'list_cate' => $list_cate, 'msg' => $msg, 'vourchers' => $vourchers, 'display' => $display, 'recommened' => $recommended, 'count_favo' => $count_favo]);
