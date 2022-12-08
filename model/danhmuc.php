<?php
function add_danhmuc($tenhang,$img_pd)
{
    $sql = "insert into category_pd(name_ct,img_ct) values ('$tenhang','$img_pd')";
    pdo_execute($sql);
}
function delete_dm($id_ct)
{
    $sql = "delete from category_pd where id_ct =".$id_ct;
    pdo_execute($sql);
}
function loadall_category()
{
    $sql = "select * from category_pd order by name_ct desc ";
    $listloaihang = pdo_query($sql);
    return $listloaihang;
}

function loadone_dm($id_ct)
{
    $sql = "select * from category_pd where id_ct  =" . $id_ct;
    $update = pdo_query_one($sql);
    return $update;
}
// function checkemmail($mail)
// {
//     $sql = "select * from khach_hang where email  ='". $mail."'";
//     $update = pdo_query_one($sql);
//     return $update;
// }
function update_dm($name_ct,$img_ct,$id_ct)
{
    if ($img_ct!="") {
        $sql = "update category_pd set name_ct ='$name_ct',img_ct ='$img_ct'  where id_ct ='$id_ct'";
    } else {
        $sql = "update category_pd set name_ct ='$name_ct' where id_ct ='$id_ct'";
    }
    // echo $sql; die;
    pdo_execute($sql);

}
// function checkuser($mk_kh,$ho_ten, $kichhoat, $hinh, $email, $vaitro)
// {
//     $sql = "select * from khach_hang where mk_kh  = '".$mk_kh."' AND email='".$email."'";
//     $kh= pdo_query_one($sql);
//     return $kh;
// }
?>