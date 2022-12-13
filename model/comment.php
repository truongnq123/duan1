<?php
function insert_cmt($content_cm, $id_us, $id_pd, $date_cm)
{
    $sql = "insert into comment(content_cm,id_us,id_pd,date_cm) values
    ('$content_cm','$id_us','$id_pd','$date_cm')";
    pdo_execute($sql);
}
function loadall_cmt()
{
    $sql = "select * from comment order by id_cm desc ";
    $listcomment = pdo_query($sql);
    return $listcomment;
}
function delete_cmt($id_cm)
{
    $sql = "delete from comment where id_cm =" . $id_cm;
    pdo_execute($sql);
}
