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
    <link rel="stylesheet" href="../../src/css/cmt.css">
   
   
</head>



<body>

<div class="box_cmt">
        <h2 class="bl" style=" text-align: center;">Bình Luận </h2>
      <div class="hr"></div>
        <?php
        if (isset($_SESSION['user'])) {
        ?>
        
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="id_pd" value="<?= $id_pd ?>">
                <input class="kgui" type="text" name="content_cm" id="" required placeholder="Mời bạn bình luận ">
                <br>
                <div class="gui1">

                <input type="submit" name="gui" value="Gửi" class="gui">
                </div>
               
            </form>
        <?php
        } else {
        ?>
            <h1 style="color: red; text-align: center;">Vui lòng đăng nhập để được bình luận !</h1>
        <?php } ?>
        <div class="hr"></div>
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

   


    
        
 
  
<?php
            if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
             
                foreach ($listcmt as $cmt) {
                    extract($cmt);
                  echo'  <div class="cmt">
                    <div class="cmt1">
                    <div class="pro-cmt1">
                       <div class="Anh">
                        <span>A</span>
                       </div>
                       <div class="text">
                        <p>'.' Anh: '. $id_us . ' </p>
                       </div>
                       <div class="time">
                        <p>' . $date_cm . '</p>
                       </div>
                    </div> 
                    <div class="pro-cmt">
                         <p>' . $content_cm . '</p>
                    </div>
                    </div>
                </div>';

                    
                  
                    
                }
                
            }else{
                foreach ($listcmt as $cmt) {
                    extract($cmt);
                    echo'  <div class="cmt">
                    <div class="cmt1">
                    <div class="pro-cmt1">
                       <div class="Anh">
                        <span>A</span>
                       </div>
                       <div class="text">
                        <p>Anh:'. $id_us . ' </p>
                       </div>
                       <div class="time">
                        <p>' . $date_cm . '</p>
                       </div>
                    </div> 
                    <div class="pro-cmt">
                         <p>' . $content_cm . '</p>
                    </div>
                    </div>
                </div>';
                   
                }
            }
            
            ?>
   
            
</body>

</html>