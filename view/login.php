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
<div class="boxtitle"> Đăng nhập</div>
<div class="row boxcontent">
    <form action="./index.php?act=dangnhap" method="post" enctype="multipart/form-data">
        <div class="dangky">
            <h3>Tên đăng nhập</h3>
            <input type="text" name="nameuser" id="">
        </div>
        <div class="dangky">
            <h3>Mật Khẩu</h3>
            <input type="text" name="pass" id="">
        </div>
        <div class="input">
            <input type="submit" value="Đăng Nhập" name="dangnhap">
        </div>
        <?php
        if (isset($thongbao) && ($thongbao) != "") {
            echo $thongbao;
        }
        ?>
    </form>
    <a href="./index.php?act=dangky"><button>Đăng ký</button></a>
    <a href="./index.php?act=quenmk">Quên mật khẩu</a>
</div>
<?php
if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
}
?>
