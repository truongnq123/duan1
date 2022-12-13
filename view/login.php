<div class="full">
    <div class="full-1">
        <div class="row boxcontent">

            <form action="./index.php?act=dangnhap" method="post" enctype="multipart/form-data" class="from-dn" style="margin-top: 300px;">

                <div class="dangky">
                    <h3>Tên đăng nhập</h3>
                    <input type="text" name="nameuser" id="" required>
                </div>
                <div class="dangky">
                    <h3>Mật Khẩu</h3>
                    <input type="pass" name="pass" id="" required>

                </div>
                <div class="dk">
                    <a href="./index.php?act=dangky" class="dk2">Đăng ký</a>
                    <a href="./index.php?act=quenmk" class="quenmk">Quên mật khẩu</a>
                </div>
                <div class="button">
                    <button type="submit" value="Đăng Nhập" name="dangnhap" require class="dn">Đăng Nhập</button>
                </div>
                <div class="thongbao">
                    <?php
                    if (isset($thongbao) && ($thongbao) != "") {
                        echo $thongbao;
                    }
                    ?>
                </div>
            </form>

        </div>
    </div>
</div>
</div>