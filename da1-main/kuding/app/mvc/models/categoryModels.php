<?php
// 

function cate_select_all(){
    $sql = "SELECT * FROM categories
    ";
    return pdo_query($sql);
}
function category_select_all(){
    $sql = "SELECT * FROM categories
    ";
    // SELECT c.name,c.avatar, COUNT(p.id) qty FROM categories c JOIN products p ON p.cate_id=c.id GROUP BY c.name,c.avatar
    return pdo_query($sql);

}
function category_select_special(){
    $sql = "SELECT avatar,id,name FROM categories WHERE special=1 ORDER BY created_at DESC LIMIT 0,4
    ";
    // SELECT c.name,c.avatar, COUNT(p.id) qty FROM categories c JOIN products p ON p.cate_id=c.id GROUP BY c.name,c.avatar
    return pdo_query($sql);

}
function category_select_by_id($category_id){
    $sql = "SELECT * FROM categories WHERE id=$category_id" ;
    return pdo_query_one($sql);

}
function category_select_by_name($name){
    $sql = "SELECT * FROM categories WHERE name='$name'" ;
    return pdo_query_one($sql);

}
function category_exits($category_id){
    $sql = "SELECT count(*) FROM categories WHERE id=$category_id";
    return pdo_query_value($sql, $category_id) > 0;

}
function category_insert($name, $avatar,$special)
{
    $sql = "INSERT INTO categories(name,avatar,special) VALUES('$name','$avatar',$special)";
    pdo_execute($sql);
}
function category_update($id, $category_name, $avatar,$special)
{
    $sql = "UPDATE categories SET name='$category_name',avatar='$avatar',special=$special WHERE id=$id";
    pdo_execute($sql);
}
function category_delete($category_id)
{
    $sql = "DELETE FROM categories WHERE id=$category_id";
    pdo_execute($sql);

}