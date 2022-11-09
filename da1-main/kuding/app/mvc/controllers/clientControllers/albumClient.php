<?php
require_once "./app/common/bridge.php";

$display = display_select_all();
$vourchers = vc_select_show();
$list_cate = cate_select_all();
// favo
if(isset($_SESSION['customer'])){
    $client_id = $_SESSION['customer']['id'];
    $favo = favo_select_client($client_id);
    $count_favo = count($favo);
}elseif(isset($_SESSION['admin'])){
    $client_id = $_SESSION['admin']['id'];
    $favo = favo_select_client($client_id);
    $count_favo = count($favo);
}elseif(isset($_SESSION['favorite'])){
    $count_favo = count($_SESSION['favorite']);
}else{
    $count_favo = 0;
}



viewClient('layout',['page'=>'album','vourchers'=>$vourchers,'list_cate'=>$list_cate,'display'=>$display,'count_favo'=>$count_favo]);