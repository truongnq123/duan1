<?php
function load_list_thongke(){
    $sql="select category_pd.id_ct as id_loaihang , category_pd.img_ct as img, category_pd.name_ct as ten_hang, product.name_pd as ten_laptop , count(product.id_pd) as sl_sanpham, max(product.price_pd) as max_sanpham, min(product.price_pd) as min_sanpham, avg(product.price_pd) as avg_sanpham ";
    $sql.=" from product left join category_pd on category_pd.id_ct = product.cate_id";
    $sql.=" group by category_pd.id_ct order by category_pd.id_ct desc ";
    $list_thongke=pdo_query($sql);
    return $list_thongke;
}
?>