<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">


    <div class="top">
        <h1>Cảm ơn quý khách đã đặt hàng</h1>
    </div>
    <?php
        if(isset($bill) && is_array($bill) ){
            extract($bill);
            var_dump($bill);die();
        }   
    ?>
    <div class="container">
        <h1>Thông tin đơn hàng</h1>
        <h1>Mã đơn hàng </h1>
           <span> DUM - <?=$bill['id_bill']?>
        </span><span>Ngày đặt hàng : <?=$bill['ngaydathang']?></span>
        <span>Tổng tiền : <?=$bill['total']?></span>
</span>Phương thức thanh toán : <?=$bill['bill_pttt']?></span>
        <div class="product-full1">
            <div class="product-full">
            
                <!-- đổ php vô đây nha -->
                <?php
                show_chitiet_donhang($listbill);
                // viewcard(0);
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