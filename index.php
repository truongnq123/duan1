<?php
include "./view/user/header.php";
include "./view/user/main.php";
include "./model/pdo.php";
include "./model/user.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "global.php";
$listproduct = loadall_san_pham("","");
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            
            break;
            case 'chitietsanpham':
                
                break;
        
        default:
            include "home.php";
            break;
    }
}
include "./view/user/footer.php";
include "global.php";
?>

