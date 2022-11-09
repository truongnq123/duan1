<!-- handle -->
<?php
require_once "./app/common/bridge.php";
$list_acc = acc_select_all();
$err = '';
$er = array();
$er['pass'] = '';
$err_pass = '';
$er['email'] = '';
$err_pass_old = '';
$msg = '';
if (isset($_GET['action'])) :
    switch ($_GET['action']) {
        case "loginAdmin":
            if (isset($_POST['btnLogin'])) {
                extract($_POST);
                // lấy tt acc về check
                // case ng dùng check remember
                if (isset($remember)) {
                    $acc_exsits = pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
                    $pass = md5($password);
                    // check email
                    if (is_array($acc_exsits)) {
                        // check pass
                        if ($pass == $acc_exsits['password']) {
                            // 2592000(30 ngay)
                            setcookie('emailAdmin', $email, time() + 2592000, '/');
                            setcookie('passwordAdmin', $password, time() + 2592000, '/');
                            $_SESSION['admin'] = $acc_exsits;
                            unset($_SESSION['customer']);
                            header("location: admin");
                            die;
                        } else
                            $err = "Tài khoản hoặc mật khẩu không chính xác!";
                    } else
                        $err = "Tài khoản hoặc mật khẩu không chính xác!";
                } else { // ko check rmb
                    setcookie('emailAdmin', '', time() - 60, '/');
                    setcookie('passwordAdmin', '', time() - 60, '/');
                    $acc_exsits = pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
                    $pass = md5($password);
                    if (is_array($acc_exsits)) {
                        // check pass
                        if ($pass == $acc_exsits['password']) {
                            $_SESSION['admin'] = $acc_exsits;
                            unset($_SESSION['customer']);
                            header("location: admin");
                            die;
                        }
                        $err = "Mật khẩu sai!";
                    } else
                        $err = "Tài khoản hoặc mật khẩu không chính xác!";
                }
            }
            viewAdmin('login', ['err' => $err]);
            die;
            break;



        case "add":
            if (isset($_POST['btn_add'])) {
                extract($_POST);
                // check acc exist;
                $acc_exsits = acc_select_by_email($email);
                if (is_array($acc_exsits)) {
                    $er['email'] = "Email đã được đăng kí, vui lòng nhập email mới";
                } else {
                    // md5 pass
                    $pass = md5($password);
                    acc_insert($fullname, $birthday, $email, $pass, $role, $gender,$phone);
                    header('location: account?action=addAccount&msg=Tạo thành công tài khoản!');
                }
            }
            viewAdmin("layout", ['page' => 'addAccount', 'errMail' => $er['email']]);
            break;

        case "update":
            $id = $_GET['id'];
            $acc_detail = acc_select_by_id($id);
            if (isset($_POST['btn_update'])) {
                extract($_POST);
                // check acc exist;
                // md5 pass
                $pass = md5($password);
                acc_update($id,$fullname, $birthday, $pass, $role, $gender,$phone);
                header('location: account?action=updateAccount&msg=Cập nhật thành công tài khoản!');
            }
            viewAdmin("layout", ['page' => 'updateAccount',  'accDetail' => $acc_detail]);
            break;
        case "del":
            acc_delete($_GET['id']);
            header('location: account?msg=Xóa thành công 1 tài khoản!');
            break;
        case "logout":
            // admin thêm khách hàng/nv
            session_destroy();
            echo "<script>window.location.replace(\"index?msg=Đăng xuất thành công!\")</script>;";
            die;
            break;
        default:
            viewAdmin('layout', ['page' => 'listAccount', 'list_acc' => $list_acc]);
            break;
    }
endif;


viewAdmin("layout", ['page' => 'listAccount', 'msg' => $msg, 'err' => $err, 'list_acc' => $list_acc]);
