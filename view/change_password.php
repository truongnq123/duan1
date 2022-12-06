<div class="full">
    <div class="full-1">

<form action="./index.php?act=change_password" method="POST" class="from-dn">
    <div class="">
        <p>Mật khẩu cũ: </p>
        <input type="text" name="pass_old">
    </div>
    
    <div class="">
        <p>mật khẩu mới: </p>
        <input type="text" name="pass_new" value="">
    </div>
    <div class="">
        <p>nhập lại mật khẩu: </p>
        <input type="text" name="reapass" value="">
    </div>
    <?php
        if (isset($thongbao) && ($thongbao) != "") {
            echo $thongbao;
        }
        ?>
        <div class="button">
        <input type="text" name="id_us" hidden value="<?= $id_us ?>">
    <button type="submit" value="cập nhập mật khẩu" name="capnhapmk">
    cập nhập mật khẩu</button>
    <div class="thongbao2">
    <a href="./index.php?act=quenmk">Quên mật khẩu</a>
    </div>
    
        </div>
  
   
</form>
</div>
    </div>