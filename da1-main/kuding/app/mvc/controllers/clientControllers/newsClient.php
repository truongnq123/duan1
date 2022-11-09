<?php
require_once "./app/common/bridge.php";

$display = display_select_all();
$list_cate = cate_select_all();
$vourchers = vc_select_show();
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
// list news
$list_news = news_select_all();
$list_news_new = news_select_created_at();
// tin liên quan
$list_news_relate = pdo_query("SELECT * FROM news ORDER BY RAND() LIMIT 3");


if(isset($_GET['action'])){
    switch($_GET['action']){
        case "viewDetail":
            $news_detail = news_select_by_id($_GET['id']);

            
            viewClient('layout',['page'=>'post','vourchers'=>$vourchers,'list_cate'=>$list_cate,'news_detail'=>$news_detail,'display'=>$display,'list_news_relate'=>$list_news_relate,'count_favo'=>$count_favo]);
            break;
    }
}

viewClient("layout",['page'=>'list-news','list_cate'=>$list_cate,'list_news'=>$list_news,'list_news_new'=>$list_news_new,'vourchers'=>$vourchers,'display'=>$display,'count_favo'=>$count_favo]);