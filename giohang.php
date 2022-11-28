

<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">
    <?php
    extract($onesp);

    ?>
    <script>
        function tongtien() {
            var price = document.querySelector('.price');
            var quantity = document.querySelector('.nb');
            var tong = price * quantity;

        }
    </script>

    <div class="top">
        <h1>Giỏ Hàng</h1>
    </div>
    <div class="container">
        <div class="product-full1">
            <div class="product-full">
                <div class="product-top">
                    <p>Sản phẩm</p>
                    <p>Đơn giá</p>
                    <p>Số lượng</p>
                    <p>Thành tiền</p>
                    <p>Xóa </p>
                </div>
                <!-- đổ php vô đây nha -->
                <?php
                $hinh = $hinh_path . $img_pd;

                echo '
                
                <div class="product-sp">
                    <div class="sp">
                        <img src="' . $hinh . '" alt="" width="80px">
                        <div>
                            <span class="text">' . $name_pd . '</span>
                            <p> Mã sp: <span class="ma">' . $id_pd . '</span> </p>
                        </div>

                    </div>
                    <span class="price">' . $price_pd . '</span>
                    <input type="number" class="nb" onchange="" min="0">
                    <span class="price-end"></span>
                    <form action="" class="form">
                        <button><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
                '
                ?>

            </div>
            <!-- from để đổ php nha -->
            <form class="product-khach" action="index.php?act=diachi" method="POST" enctype="multipart/form-data">
                <h3>Địa chỉ giao hàng</h3>

                <div>
                    <span>Họ tên</span>
                    <input type="text" name="name" id="name" placeholder="Họ và tên">
                </div>
                <br>
                <div>
                    <span>Số điện thoại</span>
                    <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại">
                </div>
                <br>
                <div>
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="Nhập Email">
                </div>
                <br>
                <div>
                    <span>Địa chỉ</span>
                    <input type="text" name="adress" id="adress" placeholder="Nhập số nhà/tên đường">
                </div>
                <input type="submit" name="themmoi" value="Đặt hàng">
            </form>
        </div>
        <?php


        ?>
    </div>
</body>
