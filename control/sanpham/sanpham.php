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
        <input type="text" name="cpu" id="">
      </div>
      <div class="desc_sanpham">
        <h1>RAM</h1>
        <input type="text" name="ram" id="">
      </div>
      <div class="desc_sanpham">
        <h1>Ổ cứng</h1>
        <input type="text" name="ocung" id="">
      </div>
      <div class="desc_sanpham" >
        <h1>VGA</h1>
       <input type="text" name="VGA" id="">
      </div>
      <div class="desc_sanpham">
        <h1>Màn Hình</h1>
        <input type="text" name="manhinh" id="">
      </div>
      <div class="desc_sanpham">
        <h1>Hệ điều hành</h1>
        <input type="text" name="hdh" id="">
      </div>
      <div class="desc_sanpham">
        <h1>Màu</h1>
       <input type="text" name="color" id="">
      </div>
      <div class="ngaynhap_sanpham" >
        <h1>Ngày nhập sản phẩm</h1>
        <input type="date" name="ngaynhapsanpham" id="" required>
      </div>
      <div class="button_user">
        <input type="submit" value="Thêm Mới" name="themmoi">
        <input type="reset" value="Nhập Lại">
        <a href="index.php?act=listproduct"><input type="button" value="Danh Sách"></a>
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