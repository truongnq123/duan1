<?php
function product($name_pd,$price_pd,$img_pd,$describe_pd,$date_add_pd,$cate_id,$cpu,$ram,$o_cung,$VGA,$manhinh,$hdh,$color){
    $spl = "insert into product(name_pd,price_pd,img_pd,describle_pd,date_add_pd,cate_id,cpu,ram,o_cung,VGA,manhinh,hdh,color) values
    ('$name_pd','$price_pd','$img_pd','$describe_pd','$date_add_pd','$cate_id','$cpu','$ram','$o_cung','$VGA','$manhinh','$hdh','$color')";
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