<?php
session_start();
ob_start();

include "../model/pdo.php";
include "../model/login.php";

if ((isset($_POST['login'])) && ($_POST['login'])) {
    $name_user = $_POST['username'];
    $pass = $_POST['pass'];
    $role = checkadmin($name_user, $pass);
    $_SESSION['role'] = $role;
    if ($role == 1)
        header('location: index.php');
    else {
        $txt_erro = "tên đăng nhập và mật khẩu không tồn tại";
    } //  header('location: login.php');
}


?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .hinh1 input {
        background-color: white;
        height: 20px;
        padding-top: 15px;
    }

    .full {
        width: 500px;
        margin: auto;
        background-color: white;
        margin-top: 200px;
        padding-bottom: 40px;
    }

    .full-1 {
        margin-top: 200px;
        width: 400px;
        margin: auto;
        margin-left: 100px;
    }

    .from-dn {
        margin-top: -200px;
        padding-top: 20px;
    }

    .from-dn input {
        width: 300px;
        height: 50px;

        border: 1px solid #f2f2f2;
        margin-top: 5px;
        background: #f2f2f2;
        padding-left: 10px;
        font-family: "Roboto", sans-serif;
        font-size: 14px;

    }

    .from-dn input:focus {
        background: #f2f2f2;
        border: 1px solid #f2f2f2;
    }

    .from-dn p {
        font-size: 15px;
        font-weight: 400;
        font-family: "Roboto", sans-serif;
    }

    .button button {
        background-color: #91c32f;
        width: 300px;
        height: 50px;
        font-family: "Roboto", sans-serif;
        font-size: 14px;
        margin-top: 5px;
        border: 1px solid #91c32f;
        color: #FFFFFF;
        font-family: "Roboto", sans-serif;
        margin-top: 8px;
    }

    .quenmk a {
        font-family: "Roboto", sans-serif;
    }

    .quenmk {
        color: #91c32f;

    }

    .dk1 {
        margin-top: 10px;
        display: grid;
        grid-template-columns: 0.5fr 1fr;
        gap: 20px;
        width: 300px;
    }

    .dn-dk {
        color: black;
    }

    .dn-tb {
        color: #91c32f;
    }

    .nhap input {
        width: 300px;
        height: 50px;

        border: 1px solid #f2f2f2;
        margin-top: 5px;
        background: #f2f2f2;
        padding-left: 10px;
        font-family: "Roboto", sans-serif;
        font-size: 14px;
    }

    .forgot_text {
        width: 90%;
        text-align: center;
        padding-top: 20px;
        margin: auto;
        font-family: "Roboto", sans-serif;
        margin-bottom: 10px;
        font-weight: 400;
    }

    .mk {
        width: 100%;
        font-family: "Roboto", sans-serif;
        font-weight: 400;
        font-size: 17px;
        color: red;
        margin-left: 60px;
        margin-top: 10px;

    }

    .boxtitle {
        width: 300px;

    }

    .boxtitle h2 {
        color: #91c32f;
        font-family: "Roboto", sans-serif;
        text-align: center;

        margin-bottom: 10px;
    }

    .thongbao2 {
        color: red;
        font-size: 20px;
        text-align: center;
        text-decoration: none;
        margin-left: -90px;
        margin-top: 10px;
    }

    .doimk a {
        color: #91c32f;
        font-size: 18px;
    }

    .ns-mk {
        display: grid;
        grid-template-columns: 0.4fr 1fr;
        gap: 70px;
    }


    .name {
        color: red;
    }
</style>
<div class="full">
    <div class="full-1">
        <div class="row boxcontent">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="from-dn">

                <div class="dangky">
                    <h3>Tên đăng nhập</h3>
                    <input type="text" name="username" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="dangky">
                    <h3>Mật Khẩu</h3>
                    <input type="password" name="pass" placeholder="Nhập mật khẩu">

                </div>

                <div class="button">
                    <input type="submit" name="login" value="đăng nhập " class="dn">
                </div>
                <div class="thongbao">
                    <?php
                    if (isset($thongbao) && ($thongbao) != "") {
                        echo $thongbao;
                    }
                    ?>
                    <?php
                    if (isset($txt_erro) && ($txt_erro != "")) {
                        echo "<font color='red'>" . $txt_erro . "</font>";
                    }
                    ?>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
<!-- <div class="boxtitle"> Đăng nhập</div>
<div class="row boxcontent">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div>
            <input type="text" name="username" placeholder="Nhập tên đăng nhập">
        </div> <br>


        <div>
            <input type="password" name="pass" placeholder="Nhập mật khẩu">

        </div>

        <div>
        
            <input type="submit" name="login" value="đăng nhập 2">
        </div>
        <?php
        if (isset($txt_erro) && ($txt_erro != "")) {
            echo "<font color='red'>" . $txt_erro . "</font>";
        }
        ?>
    </form>
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?> -->