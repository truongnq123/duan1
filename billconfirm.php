<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">


    <div class="top">
        <h1>Cảm ơn quý khách đã đặt hàng</h1>
    </div>
    <div class="container">
        <div class="product-full1">
            <div class="product-full">
                <div class="product-top">
                    <p>Sản phẩm</p>
                    <p>Đơn giá</p>
                    <p>Số lượng</p>
                    <p>Thành tiền</p>
                </div>
                <!-- đổ php vô đây nha -->
                <?php
                viewcard();
                ?>

            </div>
            <!-- from để đổ php nha -->
            <form class="product-khach" action="" method="POST" enctype="multipart/form-data">
                <h3>Địa chỉ giao hàng</h3>
                    
                <div>
                    <span>Họ tên</span>
                    <input type="text" name="name" id="name" placeholder="Họ và tên" value="<?=$name?>" disabled>
                </div>
                <br>
                <div>
                    <span>Số điện thoại</span>
                    <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?=$phone?>" disabled> 
                </div>
                <br>
                <div>
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="Nhập Email" value="<?=$email?>" disabled>
                </div>
                <br>
                <div>
                    <span>Địa chỉ</span>
                    <input type="text" name="adress" id="adress" placeholder="Nhập số nhà/tên đường" value="<?=$adress?>" disabled>
                </div>
            </form>
        </div>
        <?php


        ?>
    </div>
</body>