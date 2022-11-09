<?php
require_once './app/common/bridge.php';
callModel("productModels");
callModel("categoryModels");
// lấy list
$list_pro = product_select_all();
$size_values = size_select_all();
$color_values = color_select_all();
$list_cate = cate_select_all();

$err = array();
$err['img'] = '';
$err['cmt'] = '';
$err['imgs'] = '';
$msg = '';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "filter_pro_admin":
            $cate_id = $_GET['categories'];
            $pro_by_cate = product_select_by_category($cate_id);
            
            // lấy pro by id cate rôi push ra ds
            $conn = get_connection();
            $stmt = $conn->prepare("SELECT p.id pro_id,p.name as pr_name,p.price,p.discount,p.avatar,p.description,p.status,c.name as ca_name FROM products p INNER JOIN categories c ON p.cate_id = c.id WHERE p.cate_id=$cate_id ORDER BY p.created_at DESC ");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $row = $stmt->rowCount();
            // var_dump($result);die;
            // if row>0 -> echo
            $output = '';
            if ($row > 0) {
                $n = 1;
                foreach ($result as $item) :
                    if ($item['status']  == 0) :
                        $status = '<label class="badge badge-danger">Hết hàng</label>';
                    else :
                        $status = '<label class="badge badge-success">Còn hàng</label>';
                    endif;
                    $output .= ' <tr>
                        <td>' . $n . ';</td>
                        <td>' . $item['pr_name'] . '</td>
                        <td>' . $item['ca_name'] . '</td>
                        <td>' . $item['price'] . ' vnd</td>
                        <td><img src="./public/images/products/' . $item['avatar'] . '" alt=""></td>
                        <td>' . $item['discount'] . 'vnd</td>
                        <td>
                            ' . $status . '
                            </td>
                        <td>
                            <a href="product?action=update&id=' . $item['pro_id'] . '"><i class="fas fa-pen-square text-warning fa-2x "></i></a>
                            <a href="product?action=del&id=' . $item['pro_id'] . '" onclick="return confirm(' . 'Bạn chắc chắn muốn xóa sản phẩm?' . ')"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>
                        </td>
                    </tr>
                ';
                    $n++;
                endforeach;
            } else {
                $output = "Hết hàng";
            }

            echo $output;
            die;
            break;
        case "addProduct":
            if (isset($_POST['btn_add'])) {
                extract($_POST);
                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['avatar'];
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
                } else {
                    $err['img'] = "Ảnh chưa tải lên";
                }
                // ktra ảnh ct
                if ($_FILES['avatars']['size'] <= 0) {
                    $err['imgs'] = "Tải ít nhất 1 ảnh chi tiết";
                } elseif (count($_FILES['avatars']['name']) > 5) {

                    $err['imgs'] = "Chỉ được tải tối đa 5 ảnh chi tiết";
                }

                // thêm sp
                if (!array_filter($err)) {
                    $created_at = date("Y-m-d H:i:s");
                    // insert tbl products
                    move_uploaded_file($file['tmp_name'], "./public/images/products/" . $avatar);
                    $conn = get_connection();
                    $stmt = $conn->prepare("INSERT INTO products (name,cate_id,price,avatar,description,quantity,created_at) VALUES('$name',$category,$price,'$avatar','$desc',$quantity,'$created_at')");
                    $stmt->execute();
                    // lấy id vừa insert
                    $id_pro = $conn->lastInsertId();
                    // -- insert pro_attribute
                    // lặp value and isert 2
                    foreach ($size as $s) {
                        pro_attr_insert($id_pro, 2, $s);
                    }
                    foreach ($color as $c) {
                        pro_attr_insert($id_pro, 1, $c);
                    }
                    // add nhiều ảnh
                    $files = $_FILES['avatars'];
                    $file_names = $files['name'];
                    //    lặp + up 
                    foreach ($file_names as $key => $item) {
                        move_uploaded_file($files['tmp_name'][$key], "./public/images/products/" . $item);
                    }
                    // insert pro_img
                    foreach ($file_names as $item) {
                        pro_img_insert($item, $id_pro);
                    }
                    $msg = "Thêm thành công sản phẩm";
                }
            }
            viewAdmin("layout", ['page' => 'addProduct', 'list_cate' => $list_cate, 'errImg' => $err, 'errImgs' => $err['imgs'], 'errImg' => $err['img'], 'size_values' => $size_values, 'color_values' => $color_values, 'msg' => $msg]);
            break;

        case "update":
            $pros = product_select_by_id($_GET['id']);
            $id = $_GET['id'];
            // lấy value của thuộc tính sp tương ứng;--> value thuộc tính lấy dc nó trả về kiểu array object
            $color_id = [];
            $size_id = [];
            // chuyển mảng 2 chieefu về thành chuỗi
            foreach (color_select_pro($id) as $c) {
                array_push($color_id, $c['value_id']);
            }
            foreach (size_select_pro($id) as $s) {
                array_push($size_id, $s['value_id']);
            }
            // chuyển chuỗi vừa đổi -> mảng 1 chiều để so khớp bằng in_array

            if (isset($_POST['btn_update'])) {
                extract($_POST);
                // code update
                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['avatar'];
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
                if (empty($err['img'])) {
                    // update pro
                    product_update($id, $name, $category, $price, $discount, $avatar, $desc, $quantity, $special);
                    if ($file['size'] > 0) {
                        move_uploaded_file($file['tmp_name'], './public/images/products/' . $avatar);
                    }
                    // update attr value(xóa attr vl cũ, insert lại mới :)))
                    // xóa
                    pro_attr_del($id);
                    // lặp insert new attr value
                    foreach ($size as $s) {
                        pro_attr_insert($id, 2, $s);
                    }
                    foreach ($color as $c) {
                        pro_attr_insert($id, 1, $c);
                    }

                    header('location: product?msg=Cập nhật thành công sản phẩm!&action=update&id=' . $id);
                }
                // product_update($id,$name,$category,$price,$discount,$avatar,)
            }
            viewAdmin('layout', ['page' => 'updateProduct', 'pros' => $pros, 'list_cate' => $list_cate, 'size_values' => $size_values, 'color_values' => $color_values, 'color_id' => $color_id, 'size_id' => $size_id, 'errImg' => $err['img'], 'msg' => $msg]);
            break;
        case "del":
            $pros = product_select_by_id($_GET['id']);
            // xóa sp
            product_delete($_GET['id']);
            unlink("./public/images/products/" . $pros['avatar']);
            // xóa attr sp
            pro_attr_del($_GET['id']);
            // xóa ảnh detail
            pro_img_del($_GET['id']);
            header('Location: product?msg=Xóa thành công sản phẩm');
            break;
            // attr
        case "addAttrProduct":
            $attrs = attr_select_all();
            $list_attr_value = attr_value_select_all();
            $attr_values = attr_value_select_all();
            // $attr_id = attr_id_select_all();
            $err_at = '';
            // code add attr
            if (isset($_POST['btn_add_value'])) {
                $value = strtoupper($_POST['value']);
                $attr = $_POST['attr'];
                if ($attr == 1) {
                    // thêm cl
                    // check value đã tồn tại
                    foreach ($color_values as $c) {
                        if ($c['value'] == $value) {
                            $err_at = "Giá trị của thuộc tính đã tồn tại!";
                            break;
                        }
                    }
                } else {
                    // check sz esx
                    foreach ($size_values as $s) {
                        if ($s['value'] == $value) {
                            $err_at = "Giá trị của thuộc tính đã tồn tại!";
                            break;
                        }
                    }
                }
                // nếu k er thì insert
                if (empty($err_at)) {
                    attr_value_insert($attr, $value);
                    $msg = "Thêm thành công giá trị của thuộc tính";
                    header("location: product?action=addAttrProduct&msg=Thêm thành công giá trị");
                }
            }
            // code del attr_value
            if (isset($_GET['del'])) {
                $value_id = $_GET['del'];
                attr_value_del($value_id);
                header("location: product?action=addAttrProduct&msg=Xóa thành công giá trị");
            }

            viewAdmin('layout', ['page' => 'addAttr', 'attrs' => $attrs, 'list_attr_value' => $list_attr_value, 'msg' => $msg, 'err' => $err_at]);
            die;
            break;
    }
}
viewAdmin("layout", ['page' => 'listProducts', 'list_pro' => $list_pro, 'list_cate' => $list_cate]);
