<?php

function province_select_all(){
    $sql = "SELECT * FROM province";
    return pdo_query($sql);
}
// get tinh, huyen từ id

function province_select_id($id){
    $sql = "SELECT name FROM province WHERE provinceid='$id'";
    return pdo_query_value($sql);
}
function district_select_id($id){
    $sql = "SELECT name FROM district WHERE districtid='$id'";
    return pdo_query_value($sql);
}