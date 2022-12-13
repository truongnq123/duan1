<?php
if (is_array($editct)) {
    extract($editct);
};
$hinhpath = "../upload/" . $img_ct;
if (is_file($hinhpath)) {
    $img = "<img src='" . $hinhpath . "' height='90'>";
} else {
    $img = "no photo";
};
?>

</div>
<div class="add-new">
    <div class="clear"></div>
    <h1>Trang Update Danh mục</h1>
    <div class="list_pd">
        <!-- Chỗ để hiển thị list sản phẩm -->
        <form action="index.php?act=updatedm" method="post" enctype="multipart/form-data">
            <div class="ten_hang">
                <h1>Tên Hãng</h1>
                <input type="text" name="tenhang" value="<?= $name_ct ?>">
            </div>
            <div class="ten_hang">
                <h1>Ảnh</h1>
                <input type="file" name="anh">
                <?= $img ?>
            </div>
            <div class="button_user">
                <input type="hidden" name="id_ct" value="<?= $id_ct ?>" >
                <input type="submit" value="Cap nhat" name="deocapnhat">
                <a href="index.php?act=listdm"><input type="button" value="Danh Sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao) != "") {
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>
</nav>
</div>