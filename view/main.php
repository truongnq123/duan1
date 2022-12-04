<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">


    <div class="main">
        <div class="full-body">
            <div class="body">

                <div class="title_slide">
                    <h1>THE BEST LAPTOP </h1>
                    <p>Enhance your experience</p>
                </div>
                <div class="slide_show">
                    <div class="item" style="background-image: url(./src/img/product5.png);">

                    </div>
                    <div class="item" style="background-image: url(./src/img/product6.png);">

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

    <div class="product_category">
        <div class="tile_buttons">
            <div class="title_cate">
                <h1>Most Popular</h1>
            </div>
            <div class="status_product">
                <ul>
                    <li><a href="">Featured</a>
                        <div class="underline"></div>
                    </li>
                    <li><a href="">New Product</a>
                        <div class="underline"></div>
                    </li>
                    <li><a href="">BestSeller</a>
                        <div class="underline"></div>
                    </li>
                </ul>
            </div>
            <div class="buttons_category">
                <button id="truoc"><i class="fa fa-angle-left"></i></button>
                <div class="seperate"></div>
                <button id="sau"><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
        <div class="line"></div>

        <div class="list_product_popular">
           
            <?php
                 
                 $i = 0;
                 foreach ($listproduct as $pd) {
                     extract($pd);
                     $namepd = "$name_pd/$cpu/$ram/$o_cung/$VGA/$manhinh/$hdh/$color";
                     $link = "index.php?act=chitiet&id_pd=" . $id_pd;
                     $hinh = $hinh_path . $img_pd;
                     if ($i == 2) {
                         $mr = 'mr';
                     } else {
                         $mr = "";
                     }
 
                     echo '<div class="snip1583" '.$mr.'>
                    <div class="img-zoom">
                    <a href="' . $link . '"><img src="' . $hinh . '" alt="sample68" /></a>
                    </div>
                    
                    <figcaption>
                        <h5>' . $namepd . '</h5>
                        <div class="price">' . $price_pd . '</div>
                    </figcaption>
                </div>';
                     $i = +1;
                 }
                 ?>
 
        </div>
    </div>
</body>
