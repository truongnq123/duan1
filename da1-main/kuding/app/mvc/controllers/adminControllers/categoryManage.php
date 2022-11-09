<?php
require_once "./app/common/bridge.php";
callModel('categoryModels');
$list_cate = category_select_all();
$err = array();
$er = '';
$err['img'] = '';
$msg = '';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "addCategory":
            if (isset($_POST['btn_add'])) {
                extract($_POST);

                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['img_cate'];
                if ($file['size'] != 0) {
                    if ($file['size'] > 2097152) {
                        $er = 'Chỉ cho phép tải ảnh dưới 2mb!';
                    } else {
                        $avatar = $file['name'];
                        $ext = pathinfo($avatar, PATHINFO_EXTENSION);
                        if (!in_array($ext, $ext_img)) {
                            $er = 'Ảnh tải lên phải là jpg, png hoặc jpeg';
                        }
                    }
                }
                if (empty($er)) {
                    if ($file['size'] > 0) {
                        // up ảnh new
                        move_uploaded_file($file['tmp_name'], './public/images/categories/' . $avatar);
                        // xóa ảnh cũ
                    }
                    category_insert($name_cate, $avatar, $special);

                    header('location: category?action=addCategory&msg=Thêm thành công danh mục sản phẩm mới!');
                }
            }
            viewAdmin('layout', ['page' => 'addCategories', 'err' => $er, 'msg' => $msg]);
            break;

        case "update":
            $id = $_GET['id'];
            $cate_detail = category_select_by_id($id);
            if (isset($_POST['btn_update'])) {
                extract($_POST);
                // cate detail

                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['img_cate'];
                if ($file['size'] != 0) {
                    if ($file['size'] > 2097152) {
                        $err['img'] = 'Chỉ cho phép tải ảnh dưới 2mb!';
                    } else {
                        $avatar = $file['name'];
                        $ext = pathinfo($avatar, PATHINFO_EXTENSION);
                        if (!in_array($ext, $ext_img)) {
                            $err['img'] = 'Ảnh tải lên phải là jpg, png hoặc jpeg';
                        }
                    }
                }
                if (!array_filter($err)) {
                    if ($file['size'] > 0) {
                        // up ảnh new
                        move_uploaded_file($file['tmp_name'], './public/images/categories/' . $avatar);
                        // xóa ảnh cũ
                    }
                    category_update($id, $name_cate, $avatar, $special);
                    // if(file_exists("./public/images/products/" . $cate_detail['avatar'])){
                    //     unlink("./public/images/products/" . $cate_detail['avatar']);
                    // }

                   header('location: category?msg=Chỉnh sửa thành công danh mục sảnp phẩm!');
                }
            }
            viewAdmin('layout', ['page' => 'updateCategory', 'cate_detail' => $cate_detail, 'errImg' => $err['img'], 'msg' => $msg]);
            break;

        case "del":
            category_delete($_GET['id']);
             if(file_exists("./public/images/categories/" . $cate_detail['avatar'])){
                        unlink("./public/images/categories/" . $cate_detail['avatar']);
                    }
            header('location: category?msg=Xóa thành công 1 danh mục!');

            break;
    }
}


viewAdmin('layout', ['page' => 'listCategories', 'list_cate' => $list_cate]);
