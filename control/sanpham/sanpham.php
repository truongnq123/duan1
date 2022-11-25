</div>
<div class="add-new">
  <button id="button"><a href="">Add-new</a></button>
  <div class="clear"></div>
  <div class="product">
    <!-- Chỗ để hiển thị list sản phẩm -->
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
      <div class="categoryid">
        <h1>Category id</h1>
        <select name="category" id="select" required>
          <option value="0" selected disabled>hay chon hang</option>
          <?php
          foreach ($listdm as  $category) {

            extract($category);
            echo '<option value="' . $id_ct . '">' . $name_ct . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="ten_sanpham">
        <h1>Tên sản phẩm</h1>
        <input type="text" name="tensp" required>
      </div>
      <div class="img_sanpham">
        <h1>Ảnh sản phẩm</h1>
        <input type="file" name="img" required>
      </div>
      <div class="gia_sanpham">
        <h1>Giá sản phẩm</h1>
        <input type="text" min="0" name="price" required>
      </div>
      <div class="desc_sanpham">
        <h1>Mô tả sản phẩm</h1>
        <input type="text" name="mota" required>
      </div>
      <div class="desc_sanpham">
        <h1>CPU</h1>
        <select name="cpu" id="" required>
          <option value="0" selected disabled>Hãy chọn CPU</option>
          <?php
          foreach ($listcpu as  $cpu) {

            extract($cpu);
            echo '<option value="' . $id_cpu . '">' . $name_cpu . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="desc_sanpham">
        <h1>RAM</h1>
        <select name="ram" id="" required>
          <option value="0" selected disabled>Hãy chọn Ram</option>
          <?php
          foreach ($listram as  $ram) {

            extract($ram);
            echo '<option value="' . $id_ram . '">' . $ram . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="desc_sanpham">
        <h1>Ổ cứng</h1>
        <select name="ocung" id="" required>
          <option value="0" selected disabled>Hãy chọn ổ cứng</option>
          <?php
          foreach ($listocung as  $ocung) {

            extract($ocung);
            echo '<option value="' . $ID_o_cung . '">' . $O_cung . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="desc_sanpham" >
        <h1>VGA</h1>
        <select name="vga" id="" required>
          <option value="0" selected disabled>Hãy chọn VGA</option>
          <?php
          foreach ($listvga as  $vga) {

            extract($vga);
            echo '<option value="' . $id_VGA . '">' . $vga . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="desc_sanpham">
        <h1>Màn Hình</h1>
        <select name="manhinh" id="" required>
          <option value="0" selected disabled>Hãy chọn màn hình</option>
          <?php
          foreach ($listmh as  $mh) {

            extract($mh);
            echo '<option value="' . $id_man_hinh . '">' . $man_hinh . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="desc_sanpham">
        <h1>Hệ điều hành</h1>
        <select name="hdh" id="" required>
          <option value="0" selected disabled>Hãy chọn hệ điều hành</option>
          <?php
          foreach ($listhdh as  $hdh) {

            extract($hdh);
            echo '<option value="' . $id_HDH . '">' . $HDH . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="desc_sanpham">
        <h1>Màu</h1>
        <select name="mau" id="select" required>
          <option value="0" selected disabled>Hãy chọn màu</option>
          <?php
          foreach ($listcolor as  $mau) {

            extract($mau);
            echo '<option value="' . $id_color . '">' . $color . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="ngaynhap_sanpham" >
        <h1>Ngày nhập sản phẩm</h1>
        <input type="date" name="ngaynhapsanpham" id="" required>
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