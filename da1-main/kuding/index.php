<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// session_destroy();
// xử lí request url
function urlProcess()
{
    if (isset($_GET['url'])) {
        return explode('/', trim($_GET['url']));
    }
}
$controller = 'indexClient';
$action = "show";
$params = [];
$url = urlProcess();
if(isset($url[1])){
    include_once "./app/mvc/views/viewClients/404-err.php";
    die;
}
// kiểm tra và require controller phù hợp
if (isset($url[0])) {
    // admin
    if (file_exists("./app/mvc/controllers/adminControllers/" . $url[0] . "Manage.php")) {
        $controller = $url[0];
        require_once "./app/mvc/controllers/adminControllers/" . $controller . "Manage.php";
    }
    // client
     elseif(file_exists("./app/mvc/controllers/clientControllers/" . $url[0] . ".php")) {
        $controller = $url[0];
        require_once "./app/mvc/controllers/clientControllers/" . $controller . ".php";
    }
    else {
        require_once "./app/mvc/controllers/clientControllers/" . $controller . ".php";
    }
} else {
    require_once "./app/mvc/controllers/clientControllers/" . $controller . ".php";
}
// 2 

