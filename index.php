<?php
include "view/header.php";
include "./model/pdo.php";
include "./model/user.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./global.php";
$listproduct = loadall_sanpham_home();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            
            break;
            case 'chitiet':
                include "chitiet.php";
                break;
        
        default:
            include "./view/main.php";
            break;
    }
}else{
    include "view/main.php";
}
include "view/footer.php";
