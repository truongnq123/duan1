<!-- handle -->
<?php
require_once "./app/common/bridge.php";

// dd
$display = display_select_all();
$list_acc = acc_select_all();
$list_cate = category_select_all();
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

$err = '';
$er = array();
$er['pass'] = '';
$err_pass = '';
$err_pass_old = '';
$msg = '';
if (isset($_GET['action'])) :
    switch ($_GET['action']) {

        case "loginClient":
            // lấy tt acc = email
            $email = $_GET['email'];
            $mk = $_GET['mk'];
            $acc_exist = acc_select_by_email($email);
            if ($_GET['remember'] == 'null') {
                // nếu k check thì hủy cc cũ
                setcookie('emailClient', '', time() - 60, '/');
                setcookie('passwordClient', '', time() - 60, '/');
                if (is_array($acc_exist)) {
                    // ktra nếu đúng tk admin thì lỗi(admin login trang riêng)
                    if ($acc_exist['role_id'] == 1) {
                        // check pass
                        $pass = md5($_GET['mk']);
                        if ($pass == $acc_exist['password']) {
                            $_SESSION['customer'] = $acc_exist;
                            unset($_SESSION['admin']);
                            echo "<script>location.reload()</script>";
                        } else {
                            echo "Mật khẩu không chính xác!";
                        }
                    } else {
                        echo "Tài khoản không chính xác!";
                    }
                } else
                    echo "Tài khoản không chính xác!";
                die;
            } else {
                if (is_array($acc_exist)) {
                    // ktra nếu đúng tk admin thì lỗi(admin login trang riêng)
                    if ($acc_exist['role_id'] == 1) {
                        // check pass
                        $pass = md5($_GET['mk']);
                        if ($pass == $acc_exist['password']) {
                            setcookie('emailClient', $email, time() + 2592000, '/');
                            setcookie('passwordClient', $mk, time() + 2592000, '/');
                            $_SESSION['customer'] = $acc_exist;
                            unset($_SESSION['admin']);
                            echo "<script>location.reload()</script>";
                            echo "<script>alert('Đăng nhập thành công!')</script>";
                        } else {
                            echo "Mật khẩu không chính xác!";
                        }
                    } else {
                        echo "Tài khoản không chính xác!";
                    }
                } else
                    echo "Tài khoản không chính xác!";
                die;
            }


            break;
        case "register":
            // khách hàng đăng kí
            $gender = 0;
            if ($_GET['male'] == "check") {
                $gender = 0;
            } else {
                $gender = 1;
            }
            // ktra email đã tồn tại
            $acc_exist = acc_select_by_email($_GET['email']);
            if (is_array($acc_exist)) {
                echo "<script>alert('Email đã đăng kí, nhập email khác')</script>";
            } else {
                //   mh pass
                $pass = md5($_GET['mk']);
                acc_insert($_GET['fullname'], $_GET['birthday'], $_GET['email'], $pass, 1, $gender,$_GET['phone']);
                echo "<script>alert('Đăng kí tài khoản thành công!')</script>";
            }
            die;
            break;
        case "viewProfileClient":
            // code update profile cá nhân
            if (isset($_POST['btn_update'])) {
                extract($_POST);
                profile_update($_SESSION['customer']['id'], $fullname, $birthday, 1, $gender, $phone);
                session_destroy();
                header('location: homepage?msg=Cập nhật tài khoản thành công! Vui lòng đăng nhập lại.');
            } elseif (isset($_POST['btn_change_pass'])) {
                extract($_POST);
                // check pas confirm
                $email = $_SESSION['customer']['email'];
                $acc = acc_select_by_email($email);
                $pass = md5($password);
                if ($acc['password'] != $pass) {
                    $er['pass'] = "Mật khẩu cũ không chính xác";
                } else {
                    // nếu pass cũ chính xác
                    if ($password_new != $password_comfim) {
                        $err_pass_old = "Mật khẩu mới không khớp";
                    } else {
                        if (empty($err_pass_old) && empty($er['pass'])) {
                            $pass_success = md5($password_new);
                            acc_update_pass($_SESSION['customer']['id'], $pass_success);
                            $msg = "Thay đổi mật khẩu thành công";
                        }
                    }
                }
            }
            // fllow đơn hàng 
            $my_orders = get_my_order($_SESSION['customer']['id']);
            viewClient('layout', ['page' => 'profile','display'=>$display, 'errPass' => $er['pass'], 'err_pass' => $err_pass_old, 'list_cate' => $list_cate, 'msg' => $msg, 'vourchers' => $vourchers,'my_orders'=>$my_orders,'count_favo'=>$count_favo]);
            die;

            break;
        case "logoutClient":
            unset($_SESSION['customer']);
            header('location: homepage');
            echo "<script>alert('Bạn đã đăng xuất thành công!')</script>";
            break;
            // case "logout":
            //     // admin thêm khách hàng/nv
            //     session_destroy();
            //     echo "<script>window.location.replace(\"index?msg=Đăng xuất thành công!\")</script>;";
            //     die;
            //     break;

    }
endif;