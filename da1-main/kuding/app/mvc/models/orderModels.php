<?php
// orders
function order_select_all()
{
    $sql  = "SELECT a.fullname,o.id,o.status,o.total_price,o.note,o.phone,o.created_at FROM orders o JOIN accounts a ON a.id=o.client_id ORDER BY o.created_at DESC";
    return pdo_query($sql);
}

function orderDetail_select_by_id($id)
{
    $sql  = "SELECT o.total_price, p.name,p.price,p.avatar,dt.color,dt.size,dt.quantity FROM orders o JOIN order_details dt ON dt.order_id=o.id JOIN products p ON p.id=dt.pro_id WHERE o.id=$id ORDER BY O.created_at DESC;
    ";
    return pdo_query($sql);
}
// lấy tt kh
function order_select_client($id)
{
    $sql  = "SELECT o.status,o.created_at,o.receiver,o.phone,o.address,o.note,o.id FROM orders o JOIN accounts a ON a.id=o.client_id WHERE o.id=$id;
    ";
    return pdo_query_one($sql);
}
// lấy đơn hàng của khách:))
function get_my_order($client_id){
    $sql = "SELECT * FROM orders where client_id=$client_id ORDER BY created_at DESC";
   return  pdo_query($sql);
}

function order_insert($client_id,$receiver, $total, $phone, $address,$note, $created_at)
{
    $sql = "INSERT INTO orders(client_id,receiver,total_price,phone,address,note,created_at) VALUES($client_id,$receiver,$total,'$phone','$address','$note','$created_at')";
    pdo_execute($sql);
}

function order_update_status($id,$status){
    $sql = "UPDATE orders SET status=$status WHERE id=$id";
    pdo_execute($sql);
}
// ============order detail
function orderDetail_insert($order_id,$pro_id	,$color,$size	,$quantity ,$price)
{
    $sql = "INSERT INTO order_details(order_id,pro_id,color,size,quantity,price) VALUES($order_id,$pro_id,'$color','$size',$quantity ,$price)";
    pdo_execute($sql);
}
//  xóa, hủy đơn
function order_del($id){
    $sql = "DELETE FROM orders WHERE id=$id";
    pdo_execute($sql);
}
function order_detail_del($id){
    $sql = "DELETE FROM order_details WHERE order_id=$id";
    pdo_execute($sql);
}