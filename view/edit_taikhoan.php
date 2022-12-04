
<div class="full">
<div class="full-1">

<div class="row boxcontent">
    <form action="./index.php?act=edit_taikhoan" method="POST" enctype="multipart/form-data" class="from-dn">
        <?php
        if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
            extract($_SESSION['user']);
            var_dump($email);
            var_dump($id_us);
            var_dump($address);
        }
        ?>
        <div class="boxtitle"> 
        <h2>Cập nhập thông tin:</h2>
        </div>
        
    <div class="">
            <h3>Tên đăng nhập:</h3>
            <input type="text" name="username" placeholder="username" value="<?=$name_user ?>">
        </div>
        <div class="">
            <h3>email:</h3>
            <input type="email" name="email" placeholder="email" value="<?=$email ?>">
        </div>
        <div class="">
            <h3>địa chỉ:</h3>
            <input type="text" name="address" placeholder="address" value="<?=$address ?>">
        </div>
        <div class="">
            <h3>điện thoại:</h3>
            <input type="text" name="phone" placeholder="phone" value="<?=$phone ?>">
            
        </div>
      
        <div class="button">
            <input type="hidden" name="id_us" value="<?=$id_us?>">
            <button type="submit" value="cập nhập" name="edit_taikhoan">cập nhập </button>
        </div>
    </form>
    
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
    
</div>
</div>
</div>