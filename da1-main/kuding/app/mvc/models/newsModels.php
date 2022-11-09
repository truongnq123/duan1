<?php
// add code
function news_insert($title,$shortdesc,$desc,$img_cate,$client_id,$special){
    $sql = "INSERT INTO news (title,shortdesc,content,image,client_id,special) VALUES ('$title','$shortdesc','$desc','$img_cate','$client_id','$special')";
    
    pdo_execute($sql);
}
function news_update($id,$title,$shortdesc,$desc,$img_cate,$client_id,$special){
    $sql = "UPDATE news SET title='$title',shortdesc='$shortdesc',content='$desc',image='$img_cate',client_id=$client_id,special=$special WHERE id=$id";
    pdo_execute($sql);
}

function news_select_all(){
    $sql = "SELECT a.fullname,n.id,n.title,n.shortdesc,n.content,n.image,n.created_at,n.update_at FROM news n JOIN accounts a ON a.id=n.client_id ORDER BY created_at ASC";
    return pdo_query($sql);
}
// đb
function news_select_special(){
    $sql = "SELECT * FROM news WHERE special=1 ORDER BY RAND() LIMIT 0,2";
    return pdo_query($sql);
}

function news_select_special2(){
    $sql = "SELECT * FROM news WHERE special=1 ORDER BY RAND() LIMIT 2,3";
    return pdo_query_one($sql);
}

function news_select_created_at(){
    $sql = "SELECT a.fullname,n.id,n.title,n.shortdesc,n.content,n.image,n.created_at,n.update_at FROM news n JOIN accounts a ON a.id=n.client_id ORDER BY created_at DESC LIMIT 0,4";
    return pdo_query($sql);
}

function news_select_by_id($id){
    $sql = "SELECT * FROM news WHERE id=$id ORDER BY created_at DESC LIMIT 0,4";
    return pdo_query_one($sql);
}
// del

function news_del($id){
    $sql = "DELETE FROM news WHERE id=$id";
    pdo_execute($sql);
}


?>