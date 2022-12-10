<?php

function loadall_bill()
{
    $spl = " select * from bill where 1";
    $san_pham = pdo_query($spl);
    return $san_pham;
}
function loadone_bill($id_bill)
{
    $sql = "select * from bill where id  =" . $id_bill;
    $update = pdo_query_one($sql);
    return $update;
}
function loadone_card($idcard)
{
    $sql = "select * from card where id  =" . $idcard;
    $update = pdo_query_one($sql);
    return $update;
}
?>