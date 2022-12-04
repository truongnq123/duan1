<?php
function insert_cmt($content_cm,$id_us,$id_pd,$date_cm)
{
    $sql = "insert into comment(content_cm,id_us,id_pd,date_cm) values ('$content_cm',$id_us,'$id_pd','$date_cm')";
    pdo_execute($sql);
}
function loadall_cmt($id_pd){
    $sql = "select * from comment where 1 ";
    if($id_pd>0) $sql.= " AND  id_pd='".$id_pd."'order by id_cm desc";
    // $sql= "order by id_cm desc" ;    
    $listcmt = pdo_query($sql); 
    return $listcmt;
}
function delete_cmt($id_cm)
{
    $sql = "delete from comment where id_cm =" .$id_cm;
    pdo_execute($sql);
}
