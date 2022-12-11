<?php
function viewcard(){
    $i = 0;
                $tong = 0;
                global  $hinh_path;
                foreach ($_SESSION['Card'] as $card) {
                    $hinh = $hinh_path . $card[0];
                    $ttien = $card[3] * $card[2];
                    $tong += $ttien;

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
                    </div>';
                    $i += 1;
                };
                echo '
                        <div  class="product-sp">
                        <p>' . $tong . '</p>
                        </div>
                    ';
}
function tong(){
    $tong = 0;
    foreach ($_SESSION['Card'] as $card) {
        $ttien = $card[3] * $card[2];
        $tong += $ttien;

       
    };
    
}
function add_bill($name, $phone, $email, $adress, $bill_pttt, $ngaydathang,$total){
    $spl = "insert into bill(name, phone, email, adress, bill_pttt, ngaydathang,total) values
    ('$name', '$phone', '$email', '$adress', '$bill_pttt', '$ngaydathang','$total')";
    pdo_execute($spl);
}
function add_card($id_us, $id_pd, $img, $name, $price, $soluong,$thanhtien){
    $spl = "insert into card(id_us, id_pd, img, name, price, soluong,thanhtien) values
    ('$id_us', '$id_pd', '$img', '$name', '$price', '$soluong','$thanhtien')";
    pdo_execute($spl);
}
?>
