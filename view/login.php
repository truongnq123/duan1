<div class="boxtitle"> Đăng nhập</div>
<div class="row boxcontent">
    <form action="./index.php?act=dangnhap" method="POST" enctype="multipart/form-data">

        tên đăng nhập<input type="text" name="username">
        </div><br>
            <div class="dangky">
                mật khẩu<input type="password" name="pass">
            </div> <br>
        <div>
        <input type="submit" value="Đăng nhập" name="dangnhap" style="width:100px;height: 50px;border-radius: 10px;background-color: #5bc0de;margin-right: 1000px">
        </div>
</form>
<div>
    <a href="./index.php?act=dangky"><input type="submit" value="Đăng ký" name="dangnhap" style="width:100px;height: 50px;border-radius: 10px;background-color: #5bc0de;margin-right: 1000px"></a>
</div <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
        ?>