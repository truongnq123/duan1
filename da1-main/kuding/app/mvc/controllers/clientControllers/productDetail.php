<?php
require_once "./app/common/bridge.php";
// lấy list
$display = display_select_all();
$vourchers = vc_select_show();
$list_cate = cate_select_all();
// favo
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

$role = '';
$err = array();
$err['img'] = '';
$err['cmt'] = '';
// hành động
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
            
        case "viewDetail":
            $pro_imgs = pro_img_select_by_id($_GET['id']);
            $pros = product_select_by_id($_GET['id']);
            $cmts = cmt_select_by_product($_GET['id']);
            $id = $_GET['id'];
            // tăng viu
            increaseViewProduct($id);
            // lấy value_id của thuộc tính sp tương ứng;--> value thuộc tính lấy dc nó trả về kiểu array object
            $color_id = [];
            $size_id = [];
            // chuyển mảng 2 chieefu về thành chuỗi
            foreach (color_select_pro($id) as $c) {
                 array_push($color_id, $c['value_id']);
            }
            foreach (size_select_pro($id) as $s) {
                array_push($size_id, $s['value_id']);
            }
            // tạo 2 mảng rỗng để chứa name
            $color_name = [];
            $size_name = [];
            // lặp và lấy name bỏ vào mảng;
            foreach ($color_id as $c) {
                array_push($color_name,select_name_value_pro($c));// lại là mảng 3 chìu
            }
            foreach ($size_id as $s) {
                array_push($size_name,select_name_value_pro($s));// lại là mảng 3 chìu
            }
            // render slide bạn cũng thích-> lấy sp cùng danh mục
            $id_cate = pro_select_cate($id);
            $relate_pros = pro_select_relateProduct($id_cate);
            // cmt
            if (isset($_POST['btn_cmt'])) {
                // lấy img
                $content = $_POST['content'];
                $id = $_GET['id'];
                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['image'];
                if ($file['size'] != 0) {
                    if ($file['size'] > 2097152) {
                        $err['img'] = 'Chỉ cho phép tải ảnh dưới 2mb!';
                    } else {
                        $image = $file['name'];
                        $ext = pathinfo($image, PATHINFO_EXTENSION);
                        if (!in_array($ext, $ext_img)) {
                            $err['img'] = 'Ảnh tải lên phải là jpg, png hoặc jpeg';
                        }
                    }
                } else {
                    $image = '';
                }
                if (strlen($content) > 400) {
                    $err['cmt'] = 'Không thể bình luận quá 400 kí tự.';
                } elseif (strlen($content) <= 0) {
                    $err['cmt'] = "Bạn chưa nhập nội dung!";
                }
                // ko có er thì ms gán id và insert
                if (!array_filter($err)) {
                    if (isset($_SESSION['customer'])) {
                        $id_commenter = $_SESSION['customer']['id'];
                    } else {
                        $id_commenter = $_SESSION['admin']['id'];
                    }
                    move_uploaded_file($file['tmp_name'], "./public/images/upload/" . $image);
                    cmt_insert($content, $id_commenter, $id, $image, date("Y-m-d H:i:s"));
                    header("location: productDetail?action=viewDetail&id=" . $id);
                }
                if (strlen($content) > 400) {
                    $err['cmt'] = 'Không thể bình luận quá 400 kí tự.';
                } elseif (strlen($content) <= 0) {
                    $err['cmt'] = "Bạn chưa nhập nội dung!";
                }
            }
            // xóa cmt

            viewClient('layout', ['page' => 'product-details', 'list_img' => $pro_imgs, 'list_cate' => $list_cate, 'pros' => $pros, 'errCmt' => $err['cmt'], 'errImg' => $err['img'], 'list_cmt' => $cmts, 'vourchers' => $vourchers,'color'=>$color_name,'size'=>$size_name,'relate_pros'=>$relate_pros,'display'=>$display,'count_favo'=>$count_favo]);
            die;
            break;
        case "del_cmt":
            $id = $_GET['cmt_id'];
            $pro_id = $_POST['pro_id'];

            pdo_execute("DELETE FROM comments WHERE id='$id'");
            header('location: ');
            viewClient("master", ['page' => 'productDetails','vourchers' => $vourchers,'color'=>$color_name,'size'=>$size_name,'display'=>$display,'count_favo'=>$count_favo]);
            break;
    }
}

// gọi view
viewClient('layout', ['page' => 'product-details', 'list_img' => $pro_imgs, 'list_cate' => $list_cate, 'pros' => $pros, 'errCmt' => $err['cmt'], 'errImg' => $err['img'], 'list_cmt' => $cmts, 'vourchers' => $vourchers,'color'=>$color_name,'size'=>$size_name,'display'=>$display,'count_favo'=>$count_favo]);
