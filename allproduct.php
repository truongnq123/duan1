
<body style="background-image: url(https://ap.poly.edu.vn/theme/student_v2/media//bg/bg-3.jpg);">

    <div class="pro_full" >
        <div class="pro-banner">
            <img src="./src/img/product-full-banner.png" alt="">
            <img src="./src/img/product-full-banner2.png" alt="">
        </div>
        
        
        <div class="tile">
            <h2>
                Product
            </h2>
        </div>
        <div class="list_product_popalar">
            <?php

            $i = 0;
            foreach ($sanpham as $sp) {
                extract($sp);
                $link = "index.php?act=chitiet&id_pd=" . $id_pd;
                $img  = $hinh_path . $img_pd;
                if ($i == 2) {
                    $mr = 'mr';
                } else {
                    $mr = "";
                }

                echo '<div class=" snip1583">
                     <div class="img-zoom">
                     <a href="'.$link.'"> <img src="'.$img.'" alt="sample68" /></a>
                     </div>
     
                     <figcaption>
                         <h3>'.$name_pd.'</h3>
                         <h4 class="price">' . $price_pd . '₫</h4>
     
                     </figcaption>
                     <div class="full1">
                         <div class="ram">
                             <p>RAM '.$ram.'</p>
                         </div>
                         <div class="ssd">
                             <p>SSD '.$o_cung.'</p>
                         </div>
                     </div>
                     <div class="chitiet">
                         <p>● VGA:'.$VGA.'</p>
                         <span></span>
                         <p>● Màn hình: '.$manhinh.'</p>
                         <p> ● HĐH:'.$hdh.'</p>
                         <p> ● Màu:'.$color.'</p>
                     </div>
     
     
                 </div>';
                $i = +1;
            }
            ?>


            <!-- <div class="snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div>
            <div class="snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div>
            <div class="snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div>
            <div class="snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div>
            <div class=" snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div>
            <div class="snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div>
            <div class="snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div>
            <div class="snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div>
            <div class="snip1583">
                <div class="img-zoom">
                    <img src="https://hanoicomputer.net/wp-content/uploads/2022/08/Laptop-Dell-Inspiron-3501-3692BLK1..jpg" alt="sample68" />
                </div>

                <figcaption>
                    <h3>Laptop Dell Vostro 3510 (P112F002BBL)</h3>
                    <h4 class="price">18.290.000₫</h4>

                </figcaption>
                <div class="full1">
                    <div class="ram">
                        <p>RAM 4GB</p>
                    </div>
                    <div class="ssd">
                        <p>SSD 512G</p>
                    </div>
                </div>
                <div class="chitiet">
                    <p>● VGA:NVIDIA RTX 3050Ti 4GB</p>
                    <span></span>
                    <p>● Màn hình: 16.0 WQXGA (2560x1600) 165Hz</p>
                    <p> ● HĐH:Win 11</p>
                    <p> ● Màu:Trắng</p>
                </div>


            </div> -->
        </div>
    </div>
</body>

</html>