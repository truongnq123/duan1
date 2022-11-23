<?php
function product($name_pd,$price_pd,$img_pdt,$tyep_pd,$describe_pd,$view_pd)
{
    $spl = "insert into user(name_pd,price_pd,img_pdt,tyep_pd,describe_pd,view_pd) values ('$name_pd','$price_pd','$img_pdt','$tyep_pd','$describe_pd','$view_pd')";
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