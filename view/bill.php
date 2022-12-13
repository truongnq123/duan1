<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">

    <form class="product-khach" action="index.php?act=billconfirm" method="post" enctype="multipart/form-data">
        <div class="top">
            <h1>THÔNG TIN GIỎ HÀNG</h1>
        </div>
      
        <div class="container">
            <div class="product-full1">
         
                <div class="product-full">
                    <?php
                    viewcard(0);
                    ?>
                </div>
                <!-- from để đổ php nha -->

                <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['name_user'];
                    $adress = $_SESSION['user']['address'];
                    $phone = $_SESSION['user']['phone'];
                    $email = $_SESSION['user']['email'];
                } else {
                    $name = "";
                    $adress = "";
                    $phone = "";
                    $email = "";
                }

                ?>
             
                    <div class="product-full-2">
                <div>
                    <span>Họ tên</span>
                    <input type="text" name="name" id="name" placeholder="Họ và tên" value="<?= $name ?>">
                </div>
                <br>
                <div>
                    <span>Số điện thoại</span>
                    <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?= $phone ?>">
                </div>
                <br>
                <div>
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="Nhập Email" value="<?= $email ?>">
                </div>
                <br>
                <div>
                    <span>Địa chỉ</span>
                    <input type="text" name="adress" id="adress" placeholder="Nhập số nhà/tên đường" value="<?= $adress ?>">
                </div>
                <div class="radio">
                    <table>
                        
                           <input style="width: 20px; padding-top:20px;" type="radio" name="pttt"  value="0" checked>Thanh toán trực tiếp</td>
                            <input type="radio" style="width: 20px;" name="pttt" value="1">QR-Code MOMO</td>
                            <input type="radio" style="width: 20px;" name="pttt" value="2">ATM-MOMO</td>
                       
                    </table>
                </div>
                <button type="submit" name="dathang" value="Đặt hàng">
                Đặt hàng</button>
            </div>

        </div>
        </div>
    </form>
</body>