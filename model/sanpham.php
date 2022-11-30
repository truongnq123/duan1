<?php
function product($name_pd,$price_pd,$img_pd,$describle_pd,$date_add_pd,$cate_id,$cpu,$ram,$o_cung,$VGA,$manhinh,$hdh,$color){
    $spl = "insert into product(name_pd,price_pd,img_pd,describle_pd,date_add_pd,cate_id,cpu,ram,o_cung,VGA,manhinh,hdh,color) values
    ('$name_pd','$price_pd','$img_pd','$describle_pd','$date_add_pd','$cate_id','$cpu','$ram','$o_cung','$VGA','$manhinh','$hdh','$color')";
    pdo_execute($spl);
}
function delete_product($id_pd)
{
    $sql = "delete from product where id_pd =".$id_pd;
    pdo_execute($sql);
}
function loadall_san_pham($keyw,$idkh){
    $spl =" select * from product where 1";
    if ($keyw !=""){
        $spl .= "and name_pd like '%".$keyw ."%'";

    }
    if($idkh > 0){
        $spl .= "and id_pd = '".$keyw . "'";
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
// function checkemmail($mail)
// {
//     $sql = "select * from khach_hang where email  ='". $mail."'";
//     $update = pdo_query_one($sql);
//     return $update;
// }
function update_sanpham($name_pd,$price_pd,$img,$describle_pd,$date_add_pd,$cate_id,$cpu,$ram,$o_cung,$VGA,$manhinh,$hdh,$color,$id_pd)
{
    if ($img!="") {
        $sql = "update khach_hang set name_pd ='$name_pd' ,price_pd ='$price_pd' ,img_pd ='$img',describle_pd='$describle_pd',date_add_pd ='$date_add_pd',cate_id ='$cate_id',cpu = '$cpu', ram = '$ram', o_cung='$o_cung', VGA='$VGA', manhinh='$manhinh', hdh='$hdh', color='$color' where id_pd ='$id_pd'";
    } else {
        $sql = "update khach_hang set name_pd ='$name_pd',price_pd ='$price_pd',describle_pd ='$describle_pd',date_add_pd ='$date_add_pd',cate_id ='$cate_id',cpu = '$cpu', ram = '$ram', o_cung='$o_cung', VGA='$VGA', manhinh='$manhinh', hdh='$hdh', color='$color' where id_pd ='$id_pd'";
    }
    // echo $sql; die;
    pdo_execute($sql);

}
// function checkuser($mk_kh,$ho_ten, $kichhoat, $hinh, $email, $vaitro)
// {
//     $sql = "select * from khach_hang where mk_kh  = '".$mk_kh."' AND email='".$email."'";
//     $kh= pdo_query_one($sql);
//     return $kh;
// }
?>
