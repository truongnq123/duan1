<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">


    <div class="top">
        <h1>Cảm ơn quý khách đã đặt hàng</h1>
    </div>

    <div class="container">
        <?php
        if (isset($bill) && (is_array($bill))) {
            extract($bill);
        }

        ?>
        <div class="product-full">
            <div class="product-top">
                <h1>MÃ Đơn Hàng</h1>
                <p><?= $bill['bill_id']; ?></p>
            </div>
        </div>
        <div class="product-full1">
            <div class="chi_tiet">
                <?php
                bill_chitiet($billct)
                ?>
            </div>
            <!-- from để đổ php nha -->
            <form class="product-khach" action="" method="POST" enctype="multipart/form-data">
                <h3>Địa chỉ giao hàng</h3>

                <div>
                    <span>Họ tên</span>
                    <p><?= $bill['bill_name']; ?></p>
                </div>
                <br>
                <div>
                    <span>Số điện thoại</span>
                    <p><?= $bill['bill_phone']; ?></p>

                </div>
                <br>
                <div>
                    <span>Email</span>
                    <p><?= $bill['bill_email']; ?></p>

                </div>
                <br>
                <div>
                    <span>Địa chỉ</span>
                    <p><?= $bill['bill_address']; ?></p>

                </div>
            </form>
        </div>

    </div>
</body>