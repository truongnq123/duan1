<?php

function favo_insert($pro_id,$client_id){
    $sql = "INSERT INTO pro_favorites SET pro_id=$pro_id,client_id=$client_id";
    pdo_execute($sql);
}
function favo_select_client($client){
    $sql = "SELECT pv.pro_id,p.name,pv.id,p.price,p.avatar FROM pro_favorites pv JOIN products p ON p.id=pv.pro_id WHERE pv.client_id=$client";
    return pdo_query($sql);
}
// select by id pro
function favo_select_by_pro($id){
    $sql = "SELECT id FROM pro_favorites WHERE pro_id=$id";
    return pdo_query($sql);
}
function favo_del($client_id,$pro_id){
    $sql = "DELETE FROM pro_favorites WHERE pro_id=$pro_id AND client_id=$client_id";
    pdo_execute($sql);
}
