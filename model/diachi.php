<?php
function add_ttkh($name,$phone,$email,$adress)
{
    $sql = "insert into ttkh(name,phone,email,adress)values('$name','$phone','$email','$adress')";
    pdo_execute($sql);
}
?>