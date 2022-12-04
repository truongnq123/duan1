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
    <!-- <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error'];  var_dump($_GET['error']); ?></p>
     	<?php } ?>
         <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_POST['error']; ?></p>
     	<?php } ?>
        <?php ?> -->
        <div class="dangky">
            <h3>Tên đăng nhập</h3>
            <input type="text" name="nameuser" id="" required>
        </div>
        <div class="dangky">
            <h3>Mật Khẩu</h3>
            <input type="pass" name="pass" id="" required>
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

