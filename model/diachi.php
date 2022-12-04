<?php
function add_bill($name,$phone,$email,$adress,$bill_pttt,$ngaydathang,$total)
{
    $sql = "insert into bill(name,phone,email,adress,bill_pttt,ngaydathang,total)values('$name','$phone','$email','$adress','$bill_pttt','$ngaydathang','$total')";
    return pdo_execute_return_lastInsertID($sql);
}

// function total(){
//     $tong = 0;

//     foreach($_SESSION['Card'] as $card){
//         $tien = $card[3] * card[4];
//         $tong += $tien; 
// }
// return $tong;
// }
?>

