
<?php
function add_bill($name, $phone, $email, $adress, $bill_pttt, $ngaydathang)
{
    $sql = "insert into bill(name,phone,email,adress,bill_pttt,ngaydathang)values('$name','$phone','$email','$adress','$bill_pttt','$ngaydathang')";
    return pdo_execute_return_lastInsertID($sql);
}

function total()
{
    $tong = 0;

    foreach ($_SESSION['Card'] as $card) {
        $ttien = $card[3] * $card[2];
        $tong += $ttien;
        return $tong;
    }
} 
?>

