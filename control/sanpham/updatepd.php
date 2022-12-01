<?php
if (is_array($editpd)) {
  extract($editpd);
};
$hinhpath = "../upload/" . $img_pd;
if (is_file($hinhpath)) {
  $img = "<img src='" . $hinhpath . "' height='90'>";
} else {
  $img = "no photo";
};
?>
</div>
<div class="add-new">
  <button id="button"><a href="">Add-new</a></button>
  <div class="clear"></div>
  <div class="product">
    <!-- Chỗ để hiển thị list sản phẩm -->
    <form action="index.php?act=update" method="POST" enctype="multipart/form-data">
      <div class="categoryid">
        <h1>Category </h1>
        <select name="category" id="select">
          <option value="0" selected disabled>hay chon hang</option>
          <?php
          foreach ($listdm as  $category) {
            extract($category);
            if ($cate_id == $id_ct) {
              echo '<option value="' . $id_ct . '" selected>' . $name_ct . '</option>';
            } else {
              echo '<option value="' . $id_ct . '">' . $name_ct . '</option>';
            }
          }
          ?>
        </select>
      </div>
      <div class="ten_sanpham">
        <h1>Tên sản phẩm</h1>
        <input type="text" name="tensanpham" value="<?= $name_pd ?>">
      </div>
      <div class="img_sanpham">
        <h1>Ảnh sản phẩm</h1>
        <input type="file" name="img_pd">
        <?= $img ?>
      </div>
      <div class="gia_sanpham">
        <h1>Giá sản phẩm</h1>
        <input type="text" min="0" name="price" value="<?= $price_pd ?>">
      </div>
      <div class="desc_sanpham">
        <h1>Mô tả sản phẩm</h1>
        <input type="text" name="mota" value="<?= $describle_pd ?>">
      </div>
      <div class="desc_sanpham">
        <h1>CPU</h1>
        <input type="text" name="cpu" id="" value="<?= $cpu ?>">
      </div>
      <div class="desc_sanpham">
        <h1>RAM</h1>
        <input type="text" name="ram" id="" value="<?= $ram ?>">
      </div>
      <div class="desc_sanpham">
        <h1>Ổ cứng</h1>
        <input type="text" name="ocung" id="" value="<?= $o_cung ?>">
      </div>
      <div class="desc_sanpham">
        <h1>VGA</h1>
        <input type="text" name="VGA" id="" value="<?= $VGA ?>">
      </div>
      <div class="desc_sanpham">
        <h1>Màn Hình</h1>
        <input type="text" name="manhinh" id="" value="<?= $manhinh ?>">
      </div>
      <div class="desc_sanpham">
        <h1>Hệ điều hành</h1>
        <input type="text" name="hdh" id="" value="<?= $hdh ?>">
      </div>
      <div class="desc_sanpham">
        <h1>Màu</h1>
        <input type="text" name="color" id="" value="<?= $color ?>">
      </div>
      <div class="ngaynhap_sanpham">
        <h1>Ngày nhập sản phẩm</h1>
        <input type="date" name="ngaynhapsanpham" id="" value="<?= $date_add_pd ?>">
      </div>
      <div class="button_user">
        <input type="text" name="cate_id" id="" value="<?= $cate_id ?>" hidden>
        <input type="text" name="id_pd" value="<?= $id_pd ?>" hidden>
        <input type="submit" value="Cap nhat" name="deocapnhat">
        <input type="reset" value="Nhập Lại">
      </div>
      <?php
      if (isset($thongbao) && ($thongbao) != " ") {
        echo $thongbao;
      }
      ?>
    </form>
  </div>
</div>
</nav>
</div>