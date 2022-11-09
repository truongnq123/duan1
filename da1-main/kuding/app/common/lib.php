<?php
function callModel($model)
{
    require_once "./app/mvc/models/" . $model . ".php";
}
function viewClient($view, $data = [])//$data để gọi page con
{
    require_once "./app/mvc/views/viewClients/" . $view . ".php";
}
function viewAdmin($view, $data = [])//$data để gọi page con
{
    require_once "./app/mvc/views/viewAdmins/" . $view . ".php";
}

// save_value
function save_value($label_field) {
    // hai dấu $ để khai báo chuỗi $label
    global $$label_field;
    if (isset($$label_field))
        echo $$label_field;
}
// count recorred
function count_recored($sql){
    $conn = get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->fetchAll();
    $count = $stmt->rowCount();
    return $count;

}
// random quên mật khẩu
function random_string($length)
{
    $str = '';
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    // lặp + lấy ngẫu nhiên bằng rand()
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }
    return $str;
}

