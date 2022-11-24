</div>
<div class="add-new">
    <button id="button"><a href="">Add-new</a></button>
    <div class="clear"></div>
    <h1>Trang Add Danh mục</h1>
    <div class="list_pd">
        <!-- Chỗ để hiển thị list sản phẩm -->
        <form action="index.php?act=addhdh" method="post" enctype="multipart/form-data">
            <div class="ten_hang">
                <h3>ID CPU</h3>
                <input type="text" disabled>
            </div>
            <div class="ten_hang">
                <h1>Hệ điều hành</h1>
                <input type="text" required name="hedieuhanh">
            </div>
            <div class="button_user">
                <input type="submit" value="Thêm Mới" name="themmoi">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=listhdh"><input type="button" value="Danh Sách"></a>
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