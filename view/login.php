
<div class="full">
<div class="full-1">
<div class="row boxcontent">
    <form action="./index.php?act=dangnhap" method="post" enctype="multipart/form-data" class="from-dn">
    <div class="boxtitle"> 
        <h2>Đăng Nhập:</h2>
        </div>
        <div class="dangky">
            <p>Tên đăng nhập:</p>
            <input type="text" name="nameuser" id="" placeholder="username" required>
        </div>
        <div class="dangky">
            <p>Mật Khẩu:</p>
            <input type="text" name="pass" id="" require  placeholder="password" required>
        </div>
        <div class="dk">
    <a href="./index.php?act=dangky" class="dk2">Đăng ký</a>
    <a href="./index.php?act=quenmk" class="quenmk">Quên mật khẩu</a>
    </div>
        <div class="button">
            <button type="submit" value="Đăng Nhập" name="dangnhap" require class="dn">Đăng Nhập</button>
        </div>
        <?php
        if (isset($thongbao) && ($thongbao) != "") {
            echo $thongbao;
        }
        ?>
    </form>
   
</div>
<?php
if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
}
?>
</div>
</div>
