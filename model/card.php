<?php
function viewcard($del){
   
    $i = 0;
                $tong = 0;
                global  $hinh_path;

                if($del == 1){
                    $xoasp_td = '<a href="index.php?act=delcard&idcart=' . $i . '" ><input type="button" value="Xoa"></a>';
                }else{
                    $xoasp_td = '';
                }
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
                        '.$xoasp_td.'
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

       
    }
    return $tong;
    
}
function add_bill($name, $phone, $email, $adress, $bill_pttt, $ngaydathang,$total)
{
    $sql = "insert into bill(name,phone,email,adress,bill_pttt,ngaydathang,total)values('$name','$phone','$email','$adress','$bill_pttt','$ngaydathang','$total')";
    return pdo_execute_return_lastInsertID($sql);
}
function insert_card($id_us, $img, $name, $price, $soluong,$id_pd,$thanhtien,$id_bill)
{
    $sql = "insert into card(id_us,  img, name, price, soluong,id_pd,thanhtien,id_bill)values('$id_us',  '$img', '$name', '$price',' $soluong','$id_pd','$thanhtien','$id_bill')";
    return pdo_execute($sql);
}
function loadone_bill($id_bill)
{
    $sql = "select * from bill where id_bill  =" . $id_bill;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadone_card($id)
{
    $sql = "select * from cart where id_bill  =" . $id;
    $cart = pdo_query_one($sql);
    return $cart;
}
 
function  show_chitiet_donhang($listbill){
    $i = 0;
    global  $hinh_path;
    foreach ($listbill as $card) {
        $hinh = $hinh_path . $card['img'];
        $ttien = $card['thanhtien'];
        

        echo '
        
        <div class="product-sp">
            <div class="sp">
                <img src="' . $hinh . '" alt="" width="80px">
                <div>
                    <span class="text">' . $card['name'] . '</span>
                </div>

            </div>
            <span class="price">' . $card['price'] . '</span>
            <input type="number" class="nb" onchange="" min="1"  placeholder="1" value="">
            <span class="price-end">' . $card['soluong']  . '</span>
        </div>';
        $i += 1;
    };
    echo '
            <div  class="product-sp">
            <p>' . $ttien. '</p>
            </div>
        ';
}
