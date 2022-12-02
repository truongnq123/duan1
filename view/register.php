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
<div class="boxtitle"> ĐĂNG KÍ THÀNH VIÊN</div>
<div class="row boxcontent">
    <form action="./index.php?act=dangky" method="POST" enctype="multipart/form-data">
        <div class="dangky">
            <h3>email</h3>
            <input type="email" name="email">
        </div>
        <div class="dangky">
            <h3>tên đăng nhập</h3>
            <input type="text" name="nameuser">
        </div>
        <div class="dangky">
            <h3>mật khẩu</h3>
            <input type="password" name="pass">
        </div>
        <div class="dangky">
            <h3>Nhap lai mat khau</h3>
            <input type="password" name="repass">
        </div>
        <div class="dangky">
            <input type="submit" value="Đăng Ký" name="dangky">
        </div>
    </form>
    <a href="index.php?act=dangnhap"><button>Đăng nhập</button></a>
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
</div>
