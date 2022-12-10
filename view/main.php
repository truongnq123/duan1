<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body style="background-image: url(https://ap.poly.edu.vn/theme/student_v2/media//bg/bg-3.jpg);">



<div class="main">
    <div class="full-body">
        <div class="body">

            <div class="title_slide">
                <h1>THE BEST LAPTOP </h1>
                <p>Enhance your experience</p>
            </div>
            <div class="slide_show">
             <div class="item" style="background-image: url(./src/img/product5.png);">

    <div class="main">
        <div class="full-body">
            <div class="body">


                <div class="title_slide">
                    <h1>THE BEST LAPTOP </h1>
                    <p>Enhance your experience</p>
                </div>

              <div class="item" style="background-image: url(./src/img/product6.png);">

                <div class="slide_show">
                    <div class="item" style="background-image: url(./src/img/product5.png);">


                    </div>
                    <div class="item" style="background-image: url(./src/img/product6.png);">


             <div class="item" style="background-image: url(./src/img/product7.png);">

                    </div>


                    <div class="item" style="background-image: url(./src/img/product7.png);">

                    </div>
                    <div class="item" style="background-image: url(./src/img/product8.png);">

                    </div>
                    <div class="item" style="background-image: url(./src/img/product9.png);">

                    </div>
                </div>
                <div class="buttons">
                    <button id="next" style="margin-left: 40%;"><i class="fa fa-angle-left"></i></button>
                    <button id="prev" style="margin-left: 15%; margin-top: 320px;"><i class="fa fa-angle-right"></i></button>

                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>

<div class="product_category">
    <div class="tile_buttons">
        <div class="title_cate">
            <h1>Product</h1>
        </div>
        <div class="status_product">
            <ul>
                <li><a href=""><img src="./src/img/acer-pro.png" alt=""></a>
                <li><a href=""><img src="./src/img/hp-pro.png" alt=""></a>
                <li><a href=""><img src="./src/img/dell-pro.png" alt=""></a>
                <li><a href=""><img src=".  /src/img/lenovo-pro.jpg" alt=""></a>
                <li><a href=""><img src="./src/img/msi-pro.png" alt=""></a>
                <li><a href=""><img src="./src/img/asus-pro.png" alt=""></a>
            </ul>
        </div>
        <div>
           

    </div>

    <div class="product_category">
        <div class="tile_buttons">
            <div class="title_cate">
                <h1>Product</h1>
            </div>
            <div class="status_product">
                <ul>
                    <?php
                    foreach ($category as $category) {
                        extract($category);
                        $hinh = $hinh_path . $img_ct;
                        $link = "./index.php?act=cungloai&id_ct=".$id_ct;
                        echo '
                            <li><a href="'.$link.'"><img src="'.$hinh.'" alt=""></a>
                            ';
                    }
                    ?>
                </ul>
            </div>
            <div>

            </div>

        </div>
        <div class="line"></div>
        <div class="pro-full">
            <div class="list_product_popalar">
                <?php
                $i = 0;
                foreach ($listproduct as $pd) {
                    extract($pd);
                    $namepd = "$name_pd";
                    $link = "index.php?act=chitiet&id_pd=" . $id_pd;
                    $hinh = $hinh_path . $img_pd;
                    if ($i == 2) {
                        $mr = 'mr';
                    } else {
                        $mr = "";
                    }

                    echo '
          
             <div class=" snip1583">
                <div class="img-zoom">
                 <a href="' . $link . '"><img src="' . $hinh . '" alt="sample68" /></a>
                 </div>

                 <figcaption>
                 <h3>' . $namepd . '</h3>
                 <h4 class="price">' . $price_pd . '₫</h4>

                 </figcaption>
                 <div class="full1">
                 <div class="ram">
                     <p>RAM: ' . $ram . '</p>
                 </div>
                 <div class="ssd">
                     <p>SSD:' . $o_cung . '</p>
                 </div>
                 </div>
                 <div class="chitiet">
               <p>● VGA: ' . $VGA . '</p>
                 <span></span> <p>● Màn hình: ' . $manhinh . '(2560x1600) 165Hz</p>
                 <p> ● HĐH:' . $hdh . '</p>
                 <p> ● Màu:' . $color . '</p>
                 </div>
                </div>
                 ';
                    $i = +1;
                }
                ?>


            </div>
        </div>
    </div>

</body>

</html>