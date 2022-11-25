<?php
function product($name_pd,$price_pd,$img_pd,$describe_pd,$date_add_pd,$catid,$cpu_id,$ram_id,$ID_o_cung,$id_VGA ,$id_man_hinh,$id_HDH,$id_color)
{
    $spl = "insert into product(name_pd,price_pd,img_pd,describe_pd,date_add_pd,catid,cpu_id,ram_id,ID_o_cung,id_VGA ,id_man_hinh,id_HDH,id_color) values ('$name_pd','$price_pd','$img_pd','$describe_pd','$date_add_pd','$catid','$cpu_id','$ram_id','$ID_o_cung','$id_VGA' ,'$id_man_hinh','$id_HDH','$id_color')";
    pdo_execute($spl);
}
function loadall_san_pham($keyw,$idkh){
    $spl =" select * from product where 1";
    if ($keyw !=""){
        $spl .= "and name_pd like '%".$keyw ."%'";

    }
    if($idkh > 0){
        $spl .= "and id_us = '".$keyw . "'";
    }
    $san_pham = pdo_query($spl);
    return $san_pham;
    
}
?>