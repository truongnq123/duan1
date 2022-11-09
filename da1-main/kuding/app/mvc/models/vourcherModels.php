<?php

// add code
function vc_insert($name, $code, $discount, $quantity, $cate_code, $active_date, $expired_date)
{
    $sql = "INSERT INTO vourchers (name,code,discount,quantity,cate_code,active_date,expired_date) VALUES ('$name','$code',$discount,$quantity,$cate_code,'$active_date','$expired_date')";
    pdo_execute($sql);
}
// insert tt client used vc to vc detail
function vc_detail_insert($vourcher_id,$user_id,$created_at)
{
    $sql = "INSERT INTO voucher_detail (vourcher_id,user_id,created_at) VALUES ($vourcher_id,$user_id,	'$created_at')";
    pdo_execute($sql);
}
// update
function vc_update_status($id, $status)
{
    $sql = "UPDATE vourchers SET status=$status WHERE id=$id";
    pdo_execute($sql);
}


// select

function vc_select_all()
{
    $sql = "SELECT * FROM vourchers ORDER BY active_date DESC";

    return pdo_query($sql);
}
// lấy 2 vc hiển thị banner
function vc_select_show()
{
    $sql = "SELECT code,cate_code,discount FROM vourchers WHERE status=1 ORDER BY active_date DESC LIMIT 0,1";

    return pdo_query_one($sql);
}
// lấy theo mã code

function vc_select_code($code)
{
    $sql = "SELECT * FROM vourchers WHERE code='$code' AND status=1";

    return pdo_query_one($sql);
}
//  lấy client trong cx detail

function vc_detail_select_client($vc_id,$client_id)
{
    $sql = "SELECT * FROM voucher_detail WHERE vourcher_id='$vc_id' AND user_id=$client_id";

    return pdo_query_one($sql);
}
// del

function vc_del($id)
{
    $sql = "DELETE FROM vourchers WHERE id=$id";
    pdo_execute($sql);
}
// vc detail del
function vc_detail_del($vc_id)
{
    $sql = "DELETE FROM voucher_detail WHERE vourcher_id=$vc_id";
    pdo_execute($sql);
}
// trừ sl vc 
function vc_update_qty($code)
{
    $sql = "UPDATE vourchers SET quantity=quantity-1 WHERE code='$code'";
    pdo_execute($sql);
}
