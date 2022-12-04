<div class="full">
<div class="full-1">
<div class="row boxcontent">
    <form action="./index.php?act=dangky" method="POST" enctype="multipart/form-data" class="from-dn">
    <div class="boxtitle"> 
        <h2>Đăng KÍ:</h2>
        </div>
        <div class="dangky">
            <p>Gmail:</p>
            <input type="email" name="email" placeholder="Gmail" required>
        </div>
        <div class="dangky">
            <p>Tên đăng nhập:</p>
            <input type="text" name="nameuser" placeholder="username" required>
        </div>
        <div class="dangky">
            <p>Mật khẩu:</p>
            <input type="password" name="pass" placeholder="password" required>
        </div>
        <div class="dangky">
            <p>Nhập lại mật khẩu:</p>
            <input type="password" name="repass" placeholder="re-enter password" required>
        </div>
        <div class="dk1">
    <a href="index.php?act=dangnhap" class="dn-dk">Đăng nhập</a>
    <div class="dn-tb">
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
    </div>
    </div>
        <div class="button">
            <button type="submit" value="Đăng Ký" name="dangky">
            Đăng ký</button>
        </div>
    </form>
  
</div>
</div>
</div>
