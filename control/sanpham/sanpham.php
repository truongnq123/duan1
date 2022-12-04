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
        <p>Tên sản phẩm</p>
        <input type="text" name="tensp" required>
      </div>
      <div class="img_sanpham">
        <p>Ảnh sản phẩm</p>
        <input type="file" name="img" required>
      </div>
      <div class="gia_sanpham">
        <p>Giá sản phẩm</p>
        <input type="text" min="0" name="price" required>
      </div>
      <div class="desc_sanpham">
        <p>Mô tả sản phẩm</p>
        <input type="text" name="mota" required>
      </div>
      <div class="desc_sanpham">
        <p>RAM</p>
        <select name="ram" id="">
        <option value="0" selected disabled>chọn ram</option>
          <option value="">8g</option>
          <option value="">16g</option>
          </select>
          
      
      </div>
      <div class="desc_sanpham">
        <p>CPU</p>
        <input type="text" name="cpu" id="">
      </div>
     
      <div class="desc_sanpham">
        <p>Ổ cứng</p>
        <select name="ocung" id="">
        <option value="0" selected disabled>chọn ổ cứng</option>
          <option value="">256GB SSD</option>
          <option value="">512GB SSD</option>
          </select>
      </div>
      <div class="desc_sanpham" >
        <p>VGA</p>
       <input type="text" name="VGA" id="">
      </div>
      <div class="desc_sanpham">
        <p>Màn Hình</p>
        <input type="text" name="manhinh" id="">
      </div>
      <div class="desc_sanpham">
        <p>Hệ điều hành</p>
        <select name="dh" id="">
        <option value="0" selected disabled>chọn hệ điều hành</option>
          <option value="">window 10</option>
          <option value="">window 11</option>
          </select>
          
      </div>
      <div class="desc_sanpham">
        <p>Màu</p>
       <input type="text" name="color" id="">
      </div>
      <div class="ngaynhap_sanpham" >
        <p>Ngày nhập sản phẩm</p>
        <input type="date" name="ngaynhapsanpham" id="" required>
      </div>
      <div class="button_user">
        <input type="submit" value="Thêm Mới" name="themmoi">
       
       
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