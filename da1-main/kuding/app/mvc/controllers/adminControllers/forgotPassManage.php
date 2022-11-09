<?php
require_once "./app/common/bridge.php";

$list_cate = cate_select_all();
$display = display_select_all();
$vourchers = vc_select_show();
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
// handle
$err = array();
$err['email'] = '';
$output = '';
if (isset($_POST['forgot_btn'])) {
    // code
    extract($_POST);

    if ($email == '') {
        $err['email'] = "Vui lòng nhập vào email của bạn đăng kí.";
    } else {
        $qr = pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
        // nếu là ng dùng mới có thể quên mk kiểu này
        if (is_array($qr)) {
            $id = $qr['id'];
            // newpass
            $output = random_string(6);
            // update lại pass mới
            $new_pass = md5($output);
            acc_update_pass($id, $new_pass);
        } else {
            $err['email'] = "Nhập đúng email mà bạn đã đăng kí!";
        }
    }
}
// call view
viewClient('layout', ['page' => 'forgot-pass', 'list_cate' => $list_cate, 'err' => $err['email'], 'output' => $output,'display'=>$display,'vourchers'=>$vourchers,'count_favo'=>$count_favo]);
