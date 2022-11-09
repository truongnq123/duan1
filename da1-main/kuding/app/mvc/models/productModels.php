<?php
function product_select_all()
{
    $sql = "SELECT p.id pro_id,p.name as pr_name,p.price,p.discount,p.avatar,p.description,p.status,c.name as ca_name FROM products p INNER JOIN categories c ON p.cate_id = c.id ORDER BY p.created_at DESC";
    return pdo_query($sql);
}
// select top 10 pro  by category
function pro_select_top10_cate($id){
    $sql = "SELECT * FROM products WHERE cate_id=$id";
    pdo_query($sql);
}
function product_select_by_id($id)
{
    $sql = "SELECT * FROM products WHERE id=$id";
    return pdo_query_one($sql);
}
function pro_img_select_by_id($id)
{
    $sql = "SELECT * FROM pro_imgs WHERE pro_id=$id";
    return pdo_query($sql);
}

//  get attr
function attr_select_all()
{
    $sql = "SELECT * FROM attributes";
    return pdo_query($sql);
}
function attr_id_select_all()
{
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT id FROM attributes");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function size_select_all()
{
    $sql = "SELECT * FROM attr_values WHERE attr_id=2";
    return pdo_query($sql);
}
function color_select_all()
{
    $sql = "SELECT * FROM attr_values WHERE attr_id=1";
    return pdo_query($sql);
}
function attr_value_select_all()
{
    $sql = "SELECT av.value,a.name,av.id FROM attr_values av JOIN attributes a ON a.id=av.attr_id ORDER BY created_at DESC;";
    return pdo_query($sql);
}
// del attr vl
function attr_value_del($id){
    $sql = "DELETE FROM attr_values WHERE id=$id";
    pdo_execute($sql);
}
// lấy value attr pro

function color_select_pro($id_pro)
{
    $sql = "SELECT value_id FROM pro_attributes WHERE pro_id=$id_pro AND attr_id=1";
    return pdo_query($sql);
}
function size_select_pro($id_pro)
{
    $sql = "SELECT value_id FROM pro_attributes WHERE pro_id=$id_pro AND attr_id=2";
    return pdo_query($sql);
}
// lấy value attr từ id
function attr_value_select_id($id)
{
    $sql = "SELECT value FROM attr_values WHERE id=$id ";
    return pdo_query_value($sql);
}

// show name value attr
function select_name_value_pro($id_value)
{
    $sql = "SELECT av.id,av.value FROM attr_values av WHERE av.id=$id_value;";
    return pdo_query($sql);
}

function product_select_by_category($id)
{
    $sql = "SELECT * FROM products WHERE cate_id=$id ORDER BY created_at DESC";
    return pdo_query($sql);
}


// lấy sp đặc biệt;
function pro_select_special()
{
    $sql = "SELECT * FROM products WHERE special=1 ORDER BY RAND() LIMIT 0,3";
    return pdo_query($sql);
}
// lấy 10 sp mới nhât
function pro_select_top10()
{
    $sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT 0,10";
    return pdo_query($sql);
}
// lấy 10 sp dc xem nhiều nhất
function pro_select_view()
{
    $sql = "SELECT * FROM products ORDER BY view DESC LIMIT 0,10";
    return pdo_query($sql);
}
// 10 sp liên quan đến id
function pro_select_relateProduct($id)
{
    $sql = "SELECT p.id,p.name,p.avatar,p.price FROM products p JOIN categories c ON p.cate_id=c.id WHERE c.id=$id LIMIT 0,10";
    return pdo_query($sql);
}
//
function pro_select_cate($id)
{
    $sql = "SELECT cate_id FROM products WHERE id=$id";
    return pdo_query_value($sql);
} 
// sp liên quan -> sp cùng danh mục
// function relateProduct($cate_id)
// {
//     $sql = "SELECT * FROM product_lists pl INNER JOIN products pc ON pl.category_id=pc.category_id WHERE pc.category_id=$cate_id
//     ORDER BY pl.created_at DESC LIMIT 0,5";
//     return pdo_query($sql);
// }


function pro_img_insert($url, $pro_id)
{
    $sql = "INSERT INTO pro_imgs (url,pro_id) VALUES('$url','$pro_id')";
    pdo_execute($sql);
}
function product_insert($name, $cate, $price, $avatar, $description,$qty)
{
    $sql = "INSERT INTO products (name,cate_id,price,avatar,description,quantity) VALUES('$name',$cate,$price,'$avatar','$description',$qty)";
    pdo_execute($sql);
}
// add view
//  tăng view
function increaseViewProduct($id)
{
    $sql = "UPDATE products SET view = view + 1 WHERE id='$id'";
    pdo_execute($sql);
}
// add pro_attribute
function pro_attr_insert($pro_id, $attr_id, $value_id)
{
    $sql = "INSERT INTO pro_attributes (pro_id,attr_id,value_id) VALUES($pro_id,$attr_id,$value_id)";
    pdo_execute($sql);
}
function attr_value_insert($attr_id, $value)
{
    $sql = "INSERT INTO attr_values (attr_id,value) VALUES($attr_id,'$value')";
    pdo_execute($sql);
}
// // update pro_attr_value
// function pro_attr_update($pro_id, $attr_id,$value)
// {
//     $sql = "UPDATE pro_attributes SET value_id='$value' WHERE pro_id='$pro_id' AND attr_id=$attr_id";
//     pdo_execute($sql);
// }
// add attr
function attr_insert($value)
{
    $sql = "INSERT INTO attributes (name) VALUES('$value')";
    pdo_execute($sql);
}

// lấy value value từ pro_attr
function get_value_pro()
{
}

function product_update($id, $name, $cate, $price, $discount, $image, $description,$qty, $special)
{
    $sql = "UPDATE products SET name='$name',cate_id='$cate',price='$price',discount='$discount',avatar='$image',description='$description',quantity=$qty,special=$special WHERE id=$id ";
    pdo_execute($sql);
}
function product_delete($id)
{
    if (is_array($id)) {
        foreach ($id as $id) {
            $sql = "DELETE FROM products WHERE id='$id'";
            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM products WHERE id='$id'";
        pdo_execute($sql);
    }
}
function pro_attr_del($id)
{
    $sql = "DELETE FROM pro_attributes WHERE pro_id='$id'";
    pdo_execute($sql);
}
function pro_img_del($id)
{
    $sql = "DELETE FROM pro_imgs WHERE pro_id='$id'";
    pdo_execute($sql);
}

//  trả về số bản ghi vs cate

function pro_count_recored_cate($id){
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM products WHERE status=1 AND cate_id=$id");
    $stmt->execute();
    $stmt->fetchAll();
    $count = $stmt->rowCount();
    return $count;

}