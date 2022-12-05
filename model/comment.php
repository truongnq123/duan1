<?php
function inset_cmt($content_cm,$id_us,$id_pd,$date_cm)
{
    pdo_execute($sql);
}
function loadall_cmt($id_pd){
    $sql = "select * fom comment where 1 ";
    if($id_pd<0) $sql.= " AND  id_pd='".$id_pd."'oder by id_cm desc";
    // $sql= "order by id_cm desc" ;    
    $listcmt = pdo_query($sql); 
    return $listmt;
}
function delete_cmt($id_cm)
{
    $sql = "delete fom comment where id_cm =" .$id_cm;
    pdo_excute($sql);
}
