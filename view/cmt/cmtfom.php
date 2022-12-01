<?php
include "./model/pdo.php";
include "./model/comment.php";
session_start();
$id_pd = $_REQUEST['id_pd'];
$listcmt= loadall_cmt($id_pd);
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <hr>
    <div class="box_cmt">
        <div class="div">Bình Luận </div>
        <hr>
        <div class="v_cmt">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="text" name="content" required>
                <input type="submit" name="gui" value="gui">
            </form>
        </div>
        <hr>
    <?php
        if(isset($_POST['gui'])&&($_POST['gui'])){
            $content_cm=$_POST['content_cm'];
            $id_pd=$_POST['id_pd'];
            $id_us=$_SESSION['us']['id'];
            $date_cm=date('h:i:sa d/m/Y');
            insert_cmt($content_cm,$id_pd, $id_us,$date_cm);
            header("Loacation: ".$_SERVER ['HTTP_REFERER']);
        }
    ?>

    </div>
    <div class="box_cmt1">
        <?php
        foreach ($listcmt as $cm){
            extract($cm);
            echo '<tr><td>'.$content_cm.'</td>';
            echo '<td>'.$id_us.'</td>';
            echo '<td>'.$date_cm.'</td></tr>';
            
            
        }
        ?>
    </div>


</body>

</html>