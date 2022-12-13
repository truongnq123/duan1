<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">


    <div class="top">
        <h1>Giỏ Hàng</h1>
    </div>
    <div class="container">
        <div class="product-full1">
            <div class="product-full">
                <form action="index.php?act=submit">
                    <?php
                    viewcard(1);
                    ?>
                    <input type="submit" name="update_click" value="update-click">
                </form>
            </div>
        </div>
    
        <div class="mb bill text-center">
            <a class="mr" href="index.php?act=bill">
                <input type="button" class="btn btn-success" value="TIẾP TỤC ĐẶT HÀNG">
            </a>
            <a href="index.php?act=deleteCart">
                <input type="button" class="btn btn-success" value="XÓA GIỎ HÀNG">
            </a>
            </form>
        </div>
    </div>
</body>