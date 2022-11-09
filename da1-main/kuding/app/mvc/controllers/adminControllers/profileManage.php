<?php
// prf admin
require_once './app/common/bridge.php';


$list_cate = cate_select_all();
$msg = '';
$err = array();
$err['passNew'] = '';
$err['pass'] = '';
// update info
if (isset($_POST['btnUpdate'])) {
    extract($_POST);
    profile_update($_SESSION['admin']['id'], $fullname, $birthday, $_SESSION['admin']['role_id'], $gender, $phone);
    header('location: profile?msg=Cập nhật thành công tài khoản!');
}
if (isset($_POST['btnChangePass'])) {
    extract($_POST);
    // check pas confirm
    $email = $_SESSION['admin']['email'];
    $acc = acc_select_by_email($email);
    $pass = md5($password);
    if ($acc['password'] != $pass) {
        // nếu pass cũ chính xác
        $err['pass'] = "Mật khẩu cũ không chính xác";
    } else {
        if ($new_password != $confirm_password) {
            $err['passNew'] = "Mật khẩu mới không khớp";
        } else {
            $pass_success = md5($new_password);
            acc_update_pass($_SESSION['admin']['id'], $pass_success);
            $msg = "Thay đổi mật khẩu thành công";
        }
    }
}
viewAdmin("layout", ['page' => 'profile', 'list_cate' => $list_cate, 'msg' => $msg, 'errPass' => $err['pass'],'errPassNew' => $err['passNew']]);