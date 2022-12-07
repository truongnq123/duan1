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
   *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
   }
   body{
    width: 100%;
   }
    .box_cmt{
    border: 1px solid #333e48;
    width: 100%;
    background-color: white;
    border-radius: 5px;
    }
 
    
   .kgui{
    margin-top: 15px;
    width: 97%;
    height: 80px;
    margin-left: 10px;
    border-radius: 5px;
    border: 1px solid #333e48;
    padding-left: 5px;

   }
   /* .kgui:focus{
    border: 1px solid #333e48;
   } */
   .gui{
    margin-top: 10px;
   text-align: center;
    width: 150px;
    height: 40px;
    border-radius: 5px;
    background-color: #91c32f;
    color: white; 
    border: 1px solid  #91c32f;
    font-size: 18px;
    font-family: "Roboto", sans-serif;
    margin-bottom: 10px;

   }
   .Anh{
    width: 64px;
    height: 64px;
    background: #ddd;
    text-align: center;
    color: #666;
    font-size: 20px;
    line-height: 64px;
    font-weight: 600;
    text-shadow: 1px 1px 0 rgb(255 255 255 / 20%);
    border-radius: 9999px;
    margin-top: 20px;
    margin-left: 40px;
   }
   .cmt{
    margin-top: 10px;
    margin-bottom: 10px;
    border: 1px solid #333e48;
    width: 97%;
    margin-left: 10px;
    border-radius: 5px;
    padding-bottom:20px ;
   
   }
   .cmt1{
    display:grid;
   grid-template-columns: 0.2fr 1fr;
   gap: 30px;
   }
   .text{
    margin-top: 5px;
    font-weight: 600;
    word-break: break-all;
    margin-left: 20px;
    text-align: center;
    margin-bottom: 5px;
   }
   .time{
    text-align: center;
    margin-left: 20px;
    font-size: 12px;
    color: #999;
    text-transform: uppercase;
   }
   .pro-cmt p{
    margin-top: 60px;
    font-size: 20px;
    font-weight: 500;
   }
   .bl{
    color: red;
    font-size: 20px;
    font-weight: 400;
    margin-top: 20px;
    margin-bottom: 20px;

   }
   body{
    margin-top: 50px;
    
    
   }
   .gui1{
    text-align: right;
    margin-right: 15px;
   }
</style>

<body>

<div class="box_cmt">
        <p class="bl" style=" text-align: center;">Bình Luận </p>
        <hr>
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
                        <p>'.' <p>Anh</p> '. $id_us . ' </p>
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
                        <p>'. $id_us . ' </p>
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