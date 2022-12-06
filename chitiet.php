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


                <p>
                    <img src="./src/img/ct1.jpg" alt="" width="90">
                    <img src="./src/img/ct2.jpg" alt="" width="90">
                    <img src="./src/img/ct3.jpg" alt="" width="90">
                    <img src="./src/img/ct4.jpg" alt="" width="90">

                </p>
            </div>
            <!-- đổ text php -->
            <div class="text-ct">
                <?php

                echo '
                    <h3>
                        ' . $name_pd . '
                    </h3>
                    <div class="price">
                        <p>Giá Tiền Ưu Đãi:</p>
                        ₫' . $price_pd . '
                    </div>
                    <h4>Thông số sản phẩm:</h4>

                    <p>RAM: ' . $ram . '</p>
                    <p>Ổ cứng: ' . $o_cung . '</p>
                    <p>VGA: ' . $VGA . '</p>
                    <p> Màn hình: ' . $manhinh . '</p>
                    <p> HĐH: ' . $hdh . '</p>
                    <p>Màu: ' . $color . '</p>
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

        </div>
        <script src="https://code.jquery.com/jquery-3.50.min.js"></script>
        <script>
            // $(() => {
            //     $('p img') {
            //         let imgPath = $(this).attr('src');

            //         $("main-img").attr('src', imgPath);
            //     }
            // }
            // );
        
        </script>
        <div class="cmt">
            <iframe src="./view/cmt/cmtfom.php?id_pd=<?= $id_pd ?>" frameborder="0" height="500px" width="49%" height="100"></iframe>
        </div>


        <div class="ct-tuongtu">
            <h3>SẢN PHẨM TƯƠNG TỰ</h3>
            <div class="list_product_popalar">

                <!--------------------------------------------Phan them php cho san pham--------------------------------------------------------->

                <div class="snip1583">
                    <div class="img-zoom">
                        <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                    </div>

                    <figcaption>
                        <h5>Laptop Dell Vostro 3510 (P112F002BBL) (i5 1135G7 8GBRAM/512GB SSD/MX350 2G/15.6 inch FHD/Win11/Office HS21/Đen)21</h5>
                        <div class="price">₫18.290.000</div>
                    </figcaption>
                </div>
                <div class="snip183">
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
                </div>

                <figcaption>
                    <h5>Laptop Dell Vostro 3510 (P112F002BBL) (i5 1135G7 8GBRAM/512GB SSD/MX350 2G/15.6 inch FHD/Win11/Office HS29/Đen)</h5>
                    <div class="price">₫18.290.000</div>
                </figcaption>
            </div>
        </div>


    </div>
    
</body>
