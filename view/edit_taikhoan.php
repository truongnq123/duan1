
<div class="full">
<div class="full-1">

<div class="row boxcontent">

    <form action="./index.php?act=edit_taikhoan" method="POST" enctype="multipart/form-data" class="from-dn">
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
            <p>Tên đăng nhập</p>
            <input type="text" name="username" value="<?= $name_user ?>">
        </div>
        <div class="">
            <p>email</p>
            <input type="email" name="email" value="<?= $email ?>">
        </div>
        <div class="">
            <p>địa chỉ</p>
            <input type="text" name="address" value="<?= $address ?>">
        </div>
        <div class="">
            <p>điện thoại</p>
            <input type="text" name="phone" value="<?= $phone ?>">

        </div>
       
         
        <p>Ảnh</p>
        <div class="hinh1">
        <input type="file" name="hinh">
        </div>
      </div>
      <!-- <?=$img?> -->
      <p>Ngày sinh</p>
        <div class="ns-mk">
           
            <input type="date" name="birthday" value="<?=$age_user ?>">
            <div class="doimk">
    <a href="./index.php?act=change_password">Thay đổi mật khẩu</a>
    </div>
        </div>
      
        <div class="button">
            <input type="hidden" name="id_us" value="<?= $id_us ?>">
            <button type="submit" value="cập nhập" name="edit_taikhoan">cập nhập</button>

        </div>
    <div class="thongbao2">
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
        ?>
        </div>
    </form>
   
 

    </div> 
</div>