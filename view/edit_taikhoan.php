<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div class="boxtitle"> Cập nhập thông tin</div>
<div class="row boxcontent">
    <form action="./index.php?act=edit_taikhoan" method="POST" enctype="multipart/form-data">
        <!-- <?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                    var_dump($email);
                    var_dump($id_us);
                    var_dump($address);
                }
                ?> -->
        <?php
        $hinhpath = "./upload/" . $img_user;
        if (is_file($hinhpath)) {
            $img = "<img src='" . $hinhpath . "' height='90'>";
        } else {
            $img = "no photo";
        };
        ?>
        <div class="">
            <h3>Tên đăng nhập</h3>
            <input type="text" name="username" value="<?= $name_user ?>">
        </div>
        <div class="">
            <h3>email</h3>
            <input type="email" name="email" value="<?= $email ?>">
        </div>
        <div class="">
            <h3>địa chỉ</h3>
            <input type="text" name="address" value="<?= $address ?>">
        </div>
        <div class="">
            <h3>điện thoại</h3>
            <input type="text" name="phone" value="<?= $phone ?>">

        </div>
        <div class="">
            <!-- <h3>ảnh</h3>
            <input type="file" name="img_user">
            
        </div> -->
        <h4>Ảnh</h4>
        <input type="file" name="hinh">
      </div>
      <?=$img?>
        <div class="">
            <h3>Ngày sinh</h3>
            <input type="date" name="birthday" value="<?=$age_user ?>">
            
        </div>
        <!-- <div class="">
            <h3>mật khẩu</h3>
            <input type="password" name="pass">
        </div> -->
        <!-- <div class="">
            <h3>Nhap lai mat khau</h3>
            <input type="password" name="repass">
        </div> -->
        <div class="">
            <input type="hidden" name="id_us" value="<?= $id_us ?>">
            <input type="submit" value="cập nhập" name="edit_taikhoan">
        </div>
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
        ?>
    </form>
    <a href="./index.php?act=change_password">thay đổi mật khẩu</a>

    


</div>