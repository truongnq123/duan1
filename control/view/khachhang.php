</div>
<div class="add-new">
  <button type="button" id="button"><a href="">Add-new</a></button>
  <div class="clear"></div>
  <div class="product">
    <!-- Chỗ để hiển thị list sản phẩm -->
    <form action="index.php?act=addkh" method="post" enctype="multipart/form-data">
      <div class="hoten">
        <h4>Họ và Tên</h4>
        <input type="text" placeholder="Nhap ho va ten user" name="name" required>
      </div>
      <div class="img_user">
        <h4>Ảnh</h4>
        <input type="file" name="hinh">
      </div>
      <div class="ngaysinh">
        <h4>Ngày Sinh</h4>
        <input type="date" name="birthday" required>
      </div>
      <div class="ngaysinh">
        <h4>Mật Khẩu</h4>
        <input type="password" name="matkhau" required>
      </div>
      <div class="hoten">
        <h4>Email</h4>
        <input type="email" placeholder="Nhap Email user" name="email" required>
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
        <input type="submit" value="Thêm Mới" name="themmoi">
        <input type="reset" value="Nhập Lại">
        <a href="index.php?act=listuser"><input type="button" value="Danh Sách"></a>
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