<?php
include "../../model/pdo.php";
include "../../model/comment.php";
session_start();
$id_pd = $_REQUEST['id_pd'];
$listcmt = loadall_cmt($id_pd);
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .boxcmt table {
        width: 100%;
    }

    .boxcmt table td:nth-child(1) {
        width: 10%;
    }

    .boxcmt table td:nth-child(2) {
        width: 25%;
    }

    .boxcmt table td:nth-child(3) {
        width: 5%;
    }
</style>

<body>

    <div class="box_cmt">
        <div class="div" style="color: white; font-size: 30px; background-color: gray; text-align: center;">Bình Luận </div>
        <hr>
        <?php
        if (isset($_SESSION['user'])) {
        ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="id_pd" value="<?= $id_pd ?>">
                <input type="text" name="content_cm" id="" required size="100px">
                <input type="submit" name="gui" value="Gửi">
            </form>
        <?php
        } else {
        ?>
            <h1 style="color: red; text-align: center;">Vui lòng đăng nhập để được bình luận !</h1>
        <?php } ?>
        <hr>
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
        }

        if (isset($_POST['gui']) && ($_POST['gui'])) {
            $content_cm = $_POST['content_cm'];
            $id_pd = $_POST['id_pd'];
            // $name_user  = $_POST['name_user'];
            $id_us = $_SESSION['user']['id_us'];
            $date_cm = date('H:i d/m/y');
            insert_cmt($content_cm, $id_us, $id_pd, $date_cm);
            header("Loacation:" . $_SERVER['HTTP_REFERER']);
        }
        ?>

    </div>


    <div class="boxcmt" style="border: 1px solid black; ">
        <table>
            <?php
            if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
                foreach ($listcmt as $cmt) {
                    extract($cmt);
                    echo '<tr><td>' . $id_us . ':' . '</td>';
                    echo '<td>' . $content_cm . '</td>';
                    // echo '<td>' . $id_ac . '</td>';
                    // echo '<td>' . $id_pd . '</td>';
                    echo '<td>' . $date_cm . '</td></tr>';
                }
            }else{
                foreach ($listcmt as $cmt) {
                    extract($cmt);
                    echo '<tr><td>' . $id_us . ':' . '</td>';
                    echo '<td>' . $content_cm . '</td>';
                    // echo '<td>' . $id_ac . '</td>';
                    // echo '<td>' . $id_pd . '</td>';
                    echo '<td>' . $date_cm . '</td></tr>';
                }
            }
            
            ?>
        </table>
    </div>



</body>

</html>