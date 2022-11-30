<div class="boxtitle"> Đăng nhập</div>
<div class="row boxcontent">
    <form action="index.php?act=dangnhap" method="POST">
        <div class="form-group">
            <label for="">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Nhập tên đăng nhập">
        </div> <br>
        <div class="form-group">
            <label for="">Pass</label>
            <input class="form-control" type="password" name="pass" placeholder="Nhập mật khẩu">
        </div>
        <div class="form-group">
            <input class="button" type="submit" value="Đăng nhập" name="dangnhap">
        </div>
        <a href="index.php?act=forgot-pass">forget password</a>
    </form>
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
    <!-- <?php if (isset($name_error)) { ?>
                <p><?php echo $name_error ?></p>
            
            <?php } ?> -->