<?php
require_once "./app/common/bridge.php";


// lấy tổng hợp cmt
$syn_cmts = syn_comments();
$msg = '';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "viewDetail":
            $id = $_GET['id']; // id sp
            $cmt_of_pros = cmt_select_by_product($id);

            if (isset($_POST['btn_del_cmt'])) {
                $cmt_id = $_POST['cmt_id'];
                if (is_array($cmt_id)) :
                    foreach ($cmt_id as $id) :
                        pdo_execute("DELETE FROM comments WHERE id='$id'");
                    endforeach;
                    $msg = "Xóa thành công các bình luận!";
                else :
                    pdo_execute("DELETE FROM comments WHERE id='$cmt_id'");
                    $msg = "Xóa thành công một bình luận!";
                endif;
                header('location: comment?action=viewDetail&id='.$id);
            }

            viewAdmin('layout', ['page' => 'cmtDetail', 'cmt_of_pros' => $cmt_of_pros, 'msg' => $msg]);
            break;
        case "del":
            $pro_id = $_GET['pro_id'];
            $cmt_id = $_GET['cmt_id'];
            $cmt = pdo_query_one("SELECT * FROM comments WHERE id=" . $cmt_id);
            pdo_execute("DELETE FROM comments WHERE id=$cmt_id");
            unlink("./public/images/upload/" . $cmt['image']);
            header('location: productDetail?action=viewDetail&id=' . $pro_id);

            break;

        default:
            viewAdmin('layout', ['page' => 'listComment', 'syn_cmts' => $syn_cmts]);
            break;
    }
}

viewAdmin('layout', ['page' => 'listComment', 'syn_cmts' => $syn_cmts]);
