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
<div>a</div>

<form action="./index.php?act=change_password" method="POST">
    <div class="">
        <h3>mật khẩu cũ </h3>
        <input type="text" name="pass_old">
    </div>
    
    <div class="">
        <h3>mật khẩu mới </h3>
        <input type="text" name="pass_new" value="">
    </div>
    <div class="">
        <h3>nhập lại mật khẩu </h3>
        <input type="text" name="reapass" value="">
    </div>
    <?php
        if (isset($thongbao) && ($thongbao) != "") {
            echo $thongbao;
        }
        ?>
    <input type="text" name="id_us" value="<?= $id_us ?>">
    <input type="submit" value="cập nhập mật khẩu" name="capnhapmk">
    <p>nếu bạn quên mật khẩu thì hãy click vào đây!</p>  <a href="./index.php?act=quenmk">Quên mật khẩu</a>
   
</form>