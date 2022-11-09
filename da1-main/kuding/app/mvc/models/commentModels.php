<?php
function cmt_insert($content, $client_id, $pro_id,$image,$time)
{
    $sql = "INSERT INTO comments(client_id,pro_id,content,image,created_at) VALUES ($client_id,$pro_id,'$content','$image','$time')";
    pdo_execute($sql);
}
//show comments
function cmt_select_by_product($id)
{
    $sql = "SELECT acc.fullname,cmt.content,cmt.image,cmt.created_at,cmt.id,acc.role_id FROM accounts acc JOIN comments cmt ON cmt.client_id=acc.id JOIN products p ON cmt.pro_id=p.id WHERE p.id='$id' ORDER BY cmt.created_at DESC";
   return pdo_query($sql);
}
function comment_exits($id_cmt){
    $sql = "SELECT COUNT(*) FROM comments WHERE cmt_id='$id_cmt'";
    return pdo_query_value($sql);
}

// show tổng hợp comments
function syn_comments(){
    return pdo_query("SELECT hh.id ,hh.name pro_name,COUNT(*) quantity,MIN(cmt.created_at) bl_cunhat,MAX(cmt.created_at) bl_moinhat FROM comments cmt JOIN products hh ON cmt.pro_id=hh.id GROUP BY hh.id ,hh.name HAVING quantity>0");
}
function syn_comments_by_cate($id){
    return pdo_query("SELECT lh.category_name, hh.product_id ,hh.product_name,COUNT(*) quantity,MIN(cmt.created_at) bl_cunhat,MAX(cmt.created_at) bl_moinhat FROM product_lists hh JOIN comments cmt ON cmt.product_id=hh.product_id JOIN product_categories lh ON lh.category_id=hh.category_id WHERE lh.category_id='$id' GROUP BY hh.product_id ,hh.product_name,lh.category_name HAVING quantity>0; ");
}

//  xóa cmt ;
function del_cmts(){
    
}