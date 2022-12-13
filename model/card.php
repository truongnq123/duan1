<?php
function viewcard($del)
{

    $i = 0;
    $tong = 0;
    global  $hinh_path;
    if ($del == 1) {
        $del_th = 'Xóa';
        $deleteproduct2 = '';
    } else {
        $del_th = '';
        $deleteproduct2 = '';
    }
    echo '
                    <div class="product-top">
                        <p>Sản phẩm</p>
                        <p>Đơn giá</p>
                        <p>Số lượng</p>
                        <p>Thành tiền</p>
                        <p>' . $del_th . '</p>
                    </div>
                    ';
    foreach ($_SESSION['MyCard'] as $card) {
        $hinh = $hinh_path . $card[0];
        $ttien = $card[3] * $card[2];
        $tong += $ttien;
        if ($del == 1) {
            $deleteProduct_td = '<a href="index.php?act=deleteCart&idcart=' . $i . '"><input class="" type="button" value="Delete"></a>';
        } else {
            $deleteProduct_td = '';
        }
        echo '
                        <div class="product-sp">
                            <div class="sp">
                                <img src="' . $hinh . '" alt="" width="80px">
                                <div>
                                    <span class="text">' . $card[1] . '</span>
                                </div>

                            </div>
                            <span class="price">' . $card[2] . '</span>
                            <span class="price">' . $card[3] . '</span>
                            <span class="price-end">' . $ttien  . '</span>
                            <span class="price-end">' . $deleteProduct_td  . '</span>
                        </div>';
        $i += 1;
    };
    echo '
                            <div  class="product-sp">
                            <p>' . $tong . '</p>
                            <p>' . $deleteproduct2 . '</p>
                            </div>
                        ';
}
function tong()
{
    $tong = 0;
    foreach ($_SESSION['MyCard'] as $card) {
        $ttien = $card[3] * $card[2];
        $tong += $ttien;
    };
    return $tong;
}
function insert_bill($iduser, $user_name, $user_email, $user_address, $user_phone, $pttt, $tongdonhang)
{
    $sql = "insert into bill(iduser,bill_name,bill_address,bill_phone,bill_pttt,bill_email,bill_total) values('$iduser','$user_name', '$user_address', '$user_phone','$pttt','$user_email','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($cart_user, $cart_product, $cart_img, $cart_name, $cart_price, $cart_amount, $cart_money, $cart_bill)
{
    $sql = "insert into cart (cart_user,cart_product,cart_img,cart_name,cart_price,cart_amount,cart_money,cart_bill) values('$cart_user','$cart_product', '$cart_img', '$cart_name', '$cart_price', '$cart_amount', '$cart_money','$cart_bill')";
    return pdo_execute($sql);
}


function loadone_bill($idbill)
{
    $sql = "select * from bill where bill_id=" . $idbill;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_bill($iduser)
{
    $sql = "select * from bill where iduser=" . $iduser;
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadall_bill_control()
{
    $sql = "select * from bill order by bill_id desc ";
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadall_cart($idbill)
{
    $sql = "select * from cart where cart_bill =" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill)
{
    $sql = "select * from cart where cart_bill =" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}
function delete_bill($bill_id){
    $sql = "delete from bill where bill_id =" . $bill_id;
    pdo_execute($sql);
}
function bill_chitiet($listbill)
{

    $i = 0;
    $tong = 0;
    global  $hinh_path;
    echo '
                    <div class="product-top">
                        <p>Sản phẩm</p>
                        <p>Số Lượng</p>
                        <p>Đơn Giá</p>
                        <p>Thành tiền</p>
                    </div>
                    ';
    foreach ($listbill as $card) {
        $hinh = $hinh_path . $card['cart_img'];
        $tong += $card['cart_money'];
        echo '
                        <div class="product-sp">
                            <div class="sp">
                                <img src="' . $hinh . '" alt="" width="80px">
                                <div>
                                    <span class="text">' . $card['cart_name'] . '</span>
                                </div>

                            </div>
                            <span class="price">' . $card['cart_amount'] . '</span>
                            <span class="price">' . $card['cart_price'] . '</span>
                            <span class="price-end">' . $tong  . '</span>
                        </div>';
        $i += 1;
    };
    echo '
                            <div  class="product-sp">
                            <p>' . $tong . '</p>
                            </div>
                        ';
}
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $value = "Don hang moi";
            break;
        case '1':
            $value = "Dang xu li";
            break;
        case '2':
            $value = "Dang giao Hang";
            break;
        case '3':
            $value = "Hoan Tat";
            break;
        default:
            $value = "Don hang moi";
            break;
    }
    return $value;
}
