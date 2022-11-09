<?php
require_once "./app/common/bridge.php";
callModel("displayModels");

$er= '';
$display = display_select_all();
if(isset($_POST['btn_update'])){
    extract($_POST);
    $ext_img = ['png'];
    $file = $_FILES['logo'];
    if ($file['size'] != 0) {
        if ($file['size'] > 3097152) {
            $er = 'Chỉ cho phép tải ảnh dưới 3mb!';
        } else {
            $logo = $file['name'];
            $ext = pathinfo($logo, PATHINFO_EXTENSION);
            if (!in_array($ext, $ext_img)) {
                $er = 'Ảnh tải lên phải là png';
            }
        }
    }
    if(empty($er)){
        if($file['size']){
            move_uploaded_file($file['tmp_name'],"./public/images/layout/".$logo);
        }
        display_update($web_name,    $logo,    $title_intro,    $content_intro,    $fb_url, $insta_url,    $twitter_url,    $pinterest_url);
        header('location: display?msg=Chỉnh sửa thành công giao diện!');
    }

}

viewAdmin('layout',['page'=>'display','er'=>$er,'display'=>$display]);
