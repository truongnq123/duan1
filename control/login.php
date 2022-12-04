<?php
session_start();
ob_start();
include "../model/pdo.php";
include "../model/login.php";

if ((isset($_POST['login'])) && ($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $role = checkadmin($username, $pass);
    $_SESSION['role']=$role;
    if ($role==1)
        header('location: index.php');
    else{
      $txt_erro="tên đăng nhập và mật khẩu không tồn tại";  
    }//  header('location: login.php');
}
// var_dump($_SESSION['role']);die();

?>
<div class="boxtitle"> Đăng nhập</div>
<div class="row boxcontent">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div>
            <input type="text" name="username" placeholder="Nhập tên đăng nhập">
        </div> <br>


        <div>
            <input type="password" name="pass" placeholder="Nhập mật khẩu">

        </div>

        <div>
            <button type="submit" name="login">Đăng nhập 1</button>
            <input type="submit" name="login" value="đăng nhập 2">
        </div>
        <a href="index.php?act=forgot-pass">forget password</a>
        <?php
        if (isset($txt_erro) && ($txt_erro != "")) {
            echo "<font color='red'>" .$txt_erro."</font>";
        }
        ?>
    </form>
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>