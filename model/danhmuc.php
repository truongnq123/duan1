<?php
function add_danhmuc($tenhang)
{
    $sql = "insert into category_pd(name_ct) values ('$tenhang')";
    pdo_execute($sql);
}
// function delete_khachhang($id_us)
// {
//     $sql = "delete from user where id_us =".$id_us;
//     pdo_execute($sql);
// }
function loadall_category()
{
    $sql = "select * from category_pd order by name_ct desc ";
    $listloaihang = pdo_query($sql);
    return $listloaihang;
}

// function loadone_khach_hang($ma_kh)
// {
//     $sql = "select * from khach_hang where ma_kh  =" . $ma_kh;
//     $update = pdo_query_one($sql);
//     return $update;
// }
// function checkemmail($mail)
// {
//     $sql = "select * from khach_hang where email  ='". $mail."'";
//     $update = pdo_query_one($sql);
//     return $update;
// }
function update_khach_hang($ten_kh,$mk_kh,$hinh,$email,$vai_tro,$kich_hoat,$ma_kh)
{
    if ($hinh!="") {
        $sql = "update khach_hang set ho_ten ='$ten_kh' ,mk_kh ='$mk_kh' ,hinh ='$hinh',email='$email',vai_tro ='$vai_tro',kich_hoat ='$kich_hoat' where ma_kh ='$ma_kh'";
    } else {
        $sql = "update khach_hang set ho_ten ='$ten_kh',mk_kh ='$mk_kh',email ='$email',vai_tro ='$vai_tro',kich_hoat ='$kich_hoat' where ma_kh ='$ma_kh'";
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