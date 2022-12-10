<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@1960&display=swap" rel="stylesheet">

</head>
<style>

</style>

<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%9%BA%B9p-2020.jpg);">
    <?php
    extract($onesp);
    ?>
    <div class="container">
        <div class="name-product">


            <?php
            $namepd = "$name_pd/$cpu/$ram/$o_cung/$VGA/$manhinh/$hdh/$color";

            echo '  
        <h2>' . $namepd . ' </h2>'

            ?>
        </div>
        <div class="body1">

            <!-- đổ php ảnh ở đây -->
            <div class="img-ct">

                <?php
                $hinh = $hinh_path . $img_pd;
                // extract($value);
                echo '<div class="img-ct1">
                                <img src="' . $hinh . '" alt="" width="400" id="main-img">
                                </div>';

                ?>



            </div>
            <!-- đổ text php -->
            <div class="text-ct">
                <?php
                 $namepd = "$name_pd/$cpu/$ram/$o_cung/$VGA/$manhinh/$hdh/$color";
                echo '

                <div class="masp">
                <p>Mã SP:<span> ' . $id_pd. '</span>  </p>
               </div>
                   

                    <h3>
                        ' . $namepd . '
                    </h3>
                    <div class="price">
                        <p>Giá Tiền Ưu Đãi:</p>
                        ₫' . $price_pd . '₫'. '
                    </div>

                    <h4>Thông số sản phẩm:</h4>
                    <hr>
                    <div class="text-pr">
                    <p class="gray">RAM: ' . $ram . '</p>
                   
                    <p class="white">Ổ cứng: ' . $o_cung . '</p>
                    <p class="gray">VGA: ' . $VGA . '</p>
                    <p  class="white"> Màn hình: ' . $manhinh . '</p>
                    <p class="gray"> HĐH: ' . $hdh . '</p>
                    <p class="white">Màu: ' . $color . '</p>
                    </div>
                    <div class="price">
                    <p>Giá Tiền Ưu Đãi:</p>
                    ₫' . $price_pd . '₫' . '
                </div>
                    <form action="./index.php?act=oder_pd" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_pd" id="" value="' . $id_pd . '">
                    <input type="hidden" name="hinhanh" id="" value="' . $img_pd . '">
                    <input type="hidden" name="gia" value="' . $price_pd . '">
                    <input type="hidden" name="ten" value="' . $name_pd . '">
                    <input type="submit" value="Add To Card" name="addtocard" class="buy">
                </form>
                
                
                ';

                ?>

            </div>
        <div class="yentam">
        <div class="mh">
            <h4>YÊN TÂM MUA HÀNG</h4>
                <p>● Trả bảo hành tận nơi sử dụng</p>
                <p>● Bảo hành tận nơi cho doanh nghiệp</p>
                <p>● Vệ sinh Laptop giá rẻ</p>
             </div>
              <div class="mp">
                <h4>MIỄN PHÍ GIAO HÀNG</h4>
           <p>● Giao hàng miễn phí toàn quốc</p>
           <p>● Nhận hàng và thanh toán tại nhà (ship COD)</p>
             </div>
        </div>

           
              
        </div>
     </div>
     
     <?php
        echo ' <div class="name-thongtin">
        <h2>Thông tin sản phẩm: ' . $name_pd . '</h2> 
        </div>'
     ?>
     <div class="product-tt">
   
      
        <?php 
         echo '  
        
         <div class="thongtin">
         <img src="src/img/product-tt.jpg" alt="">
             <p>'.  '-'  . $Thongtin . ' </p>
             </div>
             '
        ?>
       
      
     <div class="tintuc">
       
        <h2>Tin tức mới nhất</h2>
        <div class="hr"></div>
        <img src="src/img/product-tintuc.jpg" alt="">
        <h3>Số lõi hay tốc độ xung nhịp quan trọng hơn với CPU?</h3>
        <p>CPU thường đi kèm các thông số chính là số nhân, số luồng và tốc độ xung nhịp. Nhưng thông số nào quan trọng hơn để đánh giá sức mạnh của nó !</p>
     </div>
     </div>
        <div class="cmt">
            <iframe src="./view/cmt/cmtfom.php?id_pd=<?= $id_pd ?>" frameborder="0" width="100%" height="800px"></iframe>
        </div>





    </div>

        <script src="https://code.jquery.com/jquery-3.50.min.js"></script>
        <script>
            $(() => {
                $('p img'); {
                    let imgPath = $(this).attr('src');

                    $("main-img").attr('src', imgPath);
                }
            });
        </script>
        <div class="cmt">
            <iframe src="./view/cmt/cmtfom.php?id_pd=<?= $id_pd ?>" frameborder="0" width="50%" height="800px"></iframe>
        </div>


        <div class="ct-tuongtu">
            <h3>SẢN PHẨM TƯƠNG TỰ</h3>
            <div class="list_product_popalar">
                    
                <?php

                foreach ($spcl as $spcl) {
                    extract($spcl);
                    $link = "index.php?act=chitiet&id_pd=" . $id_pd;
                    $namepd = "$name_pd/$cpu/$ram/$o_cung/$VGA/$manhinh/$hdh/$color";
                    $hinh = $hinh_path . $img_pd;
                    echo '<div class="snip1583">
                        <div class="img-zoom">
                        <a href="'.$link.'"><img src="'.$hinh.'" alt="sample68" /></a>
                        </div>
    
                        <figcaption>
                            <h5>'.$namepd .'</h5>
                            <div class="price">'.$price_pd.'₫</div>
                        </figcaption>
                    </div>';
                }
                ?>

                <!-- <div class="snip1583">
                    <div class="img-zoom">
                        <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                    </div>

                    <figcaption>
                        <h5>Laptop Dell Vostro 3510 (P112F002BBL) (i5 1135G7 8GBRAM/512GB SSD/MX350 2G/15.6 inch FHD/Win11/Office HS21/Đen)21</h5>
                        <div class="price">₫18.290.000</div>
                    </figcaption>
                </div>
                <div class="snip1583">
                    <div class="img-zoom">
                        <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                    </div>

                    <figcaption>
                        <h5>Laptop Dell Vostro 3510 (P112F002BBL) (i5 1135G7 8GBRAM/512GB SSD/MX350 2G/15.6 inch FHD/Win11/Office HS21/Đen)</h5>
                        <div class="price">₫18.290.000</div>
                    </figcaption>
                </div>
                <div class="snip1583">
                    <div class="img-zoom">
                        <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                    </div>

                    <figcaption>
                        <h5>Laptop Dell Vostro 3510 (P112F002BBL) (i5 1135G7 8GBRAM/512GB SSD/MX350 2G/15.6 inch FHD/Win11/Office HS21/Đen)</h5>
                        <div class="price">₫18.290.000</div>
                    </figcaption>
                </div> -->
            </div>


</body>