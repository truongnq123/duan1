<?php
if (is_array($edit_user)) {
  extract($edit_user);
};
$hinhpath = "../upload/" . $img_user;
if (is_file($hinhpath)) {
  $img = "<img src='" . $hinhpath . "' height='90'>";
} else {
  $img = "no photo";
};
?>
</div>
<div class="add-new">
  <button type="button" id="button"><a href="">Update-user</a></button>
  <div class="clear"></div>
  <div class="product">
    <!-- Chỗ để hiển thị list sản phẩm -->
    <form action="index.php?act=update_user" method="post" enctype="multipart/form-data" class="user">
      <div class="hoten">
        <h4>Họ và Tên</h4>
        <input type="text" placeholder="Nhap ho va ten user" name="name" value="<?= $name_user?>" required>
      </div>
      <div class="img_user">
        <h4>Ảnh</h4>
        <input type="file" name="hinh">
        <?=$img?>
      </div>
      <div class="ngaysinh">
        <h4>Ngày Sinh</h4>
        <input type="date" name="birthday" value="<?= $age_user ?>" required>
      </div>
      <!-- <div class="pass">
        <h4>Mật Khẩu</h4>
        <input type="password" name="matkhau" required>
      </div> -->
      <div class="email">  
        <h4>Email</h4>
        <input type="email" placeholder="Nhap Email user" name="email" value="<?=$email ?>" class="email1">
      </div>
      <div class="">
            <h4>địa chỉ</h4>
            <input type="text" name="address" value="<?= $address ?>">
        </div>
        <div class="">
            <h4>điện thoại</h4>
            <input type="text" name="phone" value="<?= $phone ?>">

        </div>
      <div class="Vị Trí">
        <input type="radio" name="role" id="" value="0" required>Khách Hàng
      <input type="radio" name="role" id="" value="1" required>Quản lí
      </div>
      <div class="Trạng Thái">
        <input type="radio" name="status" id="" value="Kích Hoạt" required >Kích Hoạt
        <input type="radio" name="status" id="" value="Chưa Kích Hoạt" required>Chưa Kích Hoạt
      </div>
      <div class="button_user">

        <input type="text" name="id_us" value="<?=$id_us ?>" hidden>
        <input type="submit" value="Cap nhat" name="capnhap_user">
        <input type="reset" value="Nhập Lại">
      </div>
      <?php
      if (isset($thongbao) && ($thongbao) != "") {
        echo $thongbao;
      }
      ?>
    </form>
  </div>
</div>
</nav>
</div>