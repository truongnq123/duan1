<?php
function product($name_pd, $price_pd, $img_pd, $describle_pd, $date_add_pd, $cate_id, $cpu, $ram, $o_cung, $VGA, $manhinh, $hdh, $color)
{
    $spl = "insert into product(name_pd,price_pd,img_pd,describle_pd,date_add_pd,cate_id,cpu,ram,o_cung,VGA,manhinh,hdh,color) values
    ('$name_pd','$price_pd','$img_pd','$describle_pd','$date_add_pd','$cate_id','$cpu','$ram','$o_cung','$VGA','$manhinh','$hdh','$color')";
    pdo_execute($spl);
}
function delete_product($id_pd)
{
    $sql = "delete from product where id_pd =" . $id_pd;
    pdo_execute($sql);
}
function loadall_san_pham($keyw, $idkh)
{
    $spl = " select * from product where 1";
    if ($keyw != "") {
        $spl .= "and name_pd like '%" . $keyw . "%'";
    }
    if ($idkh > 0) {
        $spl .= "and id_pd = '" . $keyw . "'";
    }
    $san_pham = pdo_query($spl);
    return $san_pham;
}
function loadone_san_pham($id_pd)
{
    $sql = "select * from product where id_pd  =" . $id_pd;
    $update = pdo_query_one($sql);
    return $update;
}
function loadone_san_pham_name($name_pd)
{
    $sql = "select * from product where name_pd  =" . $name_pd;
    $update = pdo_query_one($sql);
    return $update;
}
// function checkemmail($mail)
// {
//     $sql = "select * from khach_hang where email  ='". $mail."'";
//     $update = pdo_query_one($sql);
//     return $update;
// }

    function update_sanpham($name, $price, $imgz, $describle, $date_add, $cate, $cpu_pd, $ram_pd, $o_cung_pd, $VGA_pd, $manhinh_pd, $hdh_pd, $color_pd, $id)
    {
        if ($imgz != "") {
            $sql = "update product set name_pd ='$name' ,price_pd ='$price' ,img_pd ='$imgz',describle_pd='$describle',date_add_pd ='$date_add',cate_id ='$cate',cpu = '$cpu_pd', ram = '$ram_pd', o_cung='$o_cung_pd', VGA='$VGA_pd', manhinh='$manhinh_pd', hdh='$hdh_pd', color='$color_pd' where id_pd ='$id'";
        } else {
            $sql = "update product set name_pd ='$name',price_pd ='$price',describle_pd ='$describle',date_add_pd ='$date_add',cate_id ='$cate',cpu = '$cpu_pd', ram = '$ram_pd', o_cung='$o_cung_pd', VGA='$VGA_pd', manhinh='$manhinh_pd', hdh='$hdh_pd', color='$color_pd' where id_pd ='$id'";
        }
        // echo $sql; die();
        pdo_execute($sql);
    
    }
// function checkuser($mk_kh,$ho_ten, $kichhoat, $hinh, $email, $vaitro)
// {
//     $sql = "select * from khach_hang where mk_kh  = '".$mk_kh."' AND email='".$email."'";
//     $kh= pdo_query_one($sql);
//     return $kh;
// }
function loadall_sanpham_home()
{
    $sql = "select * from product where 1 order by id_pd desc limit 0,9" ;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
