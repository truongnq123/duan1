<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">


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
                $i = 0;
                $tong = 0;
                $xoacard = '<a href="index.php?act=delcard&idcart='.$i.'" ><input type="button" value="Xoa"></a>';
                    
                    
                    echo '
                    <div class="product-sp">
                        <div class="sp">
                            <img src="' . $hinh . '" alt="" width="80px">
                            <div>
                                <span class="text">' . $card[1] . '</span>
                            </div>

                        </div>
                        <span class="price">' . $card[2] . '</span>
                        <input type="number" class="nb" onchange="" min="1"  placeholder="1" value="">
                        <span class="price-end">' . $ttien  . '</span>
                        <p>' . $xoacard . '</p>
                    </div>';
                    $i += 1;
                    echo'
                        <div  class="product-sp">
                        <p>'.$tong.'</p>
                        </div>
                    ';
                ?>

            </div>
            <!-- from để đổ php nha -->
            <form class="product-khach" action="./index.php?act=billconfirm" method="POST" enctype="multipart/form-data">
                <h3>Địa chỉ giao hàng</h3>
                    <?php
                        if (isset($_SESSION['bill'])) {
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