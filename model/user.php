<?php
function add_user($role,$name_user, $img_user, $age_user, $email, $active,$matkhau)
{
    $sql = "insert into user(role,name_user, img_user, age_user, email, active,matkhau) values ('$role','$name_user','$img_user','$age_user','$email','$active','$matkhau') ";
    pdo_execute($sql);
}


function checkuser($role,$name_user, $img_user, $age_user, $email, $active,$matkhau)
{
    $sql = "select * from user where name_user  = '".$name_user."' AND matkhau='".$matkhau."'";
    $kh= pdo_query_one($sql);
    return $kh;
    var_dump($kh);die;
}

function checkuser_edit($role,$name_user, $img_user, $age_user, $email, $active,$matkhau,$address,$phone)
{
    $sql = "select * from user where name_user  = '".$name_user."' AND matkhau='".$matkhau."' AND email='".$email."' AND phone='".$phone."'  ";
    $kh= pdo_query_one($sql);
    return $kh;
    var_dump($kh);die;
}

function update_taikhoan($id_us,$name_user,$email,$phone,$address){
        $sql= "update user set name_user='".$name_user."', email='".$email."',phone='".$phone."',address='".$address."' where id_us='".$id_us."'   ";
        pdo_execute($sql);
    }

    function checkemail($email)
    {
        $sql = "select * from user where email  ='".$email."'";
        $qmk = pdo_query_one($sql);
        return $qmk;
    }

function delete_khachhang($id_us)
{
    $sql = "delete from user where id_us =".$id_us;
    pdo_execute($sql);
}
function loadall_khach_hang($keyw,$idkh)
{
    $sql = "select * from user where 1 " ;
    if ($keyw != "") {
        $sql .= " and name_user like '%" . $keyw . "%'";
    }
    if($idkh > 0){
        $sql .= " and id_us  ='" . $idkh . "'";
    }
    $listkhachhang = pdo_query($sql);
    return $listkhachhang;
}

// function loadone_khach_hang($ma_kh)
// {
//     $sql = "select * from khach_hang where ma_kh  =" . $ma_kh;
//     $update = pdo_query_one($sql);
//     return $update;
// }

// function update_khach_hang($ten_kh,$mk_kh,$hinh,$email,$vai_tro,$kich_hoat,$ma_kh)
// {
//     if ($hinh!="") {
//         $sql = "update khach_hang set ho_ten ='$ten_kh' ,mk_kh ='$mk_kh' ,hinh ='$hinh',email='$email',vai_tro ='$vai_tro',kich_hoat ='$kich_hoat' where ma_kh ='$ma_kh'";
//     } else {
//         $sql = "update khach_hang set ho_ten ='$ten_kh',mk_kh ='$mk_kh',email ='$email',vai_tro ='$vai_tro',kich_hoat ='$kich_hoat' where ma_kh ='$ma_kh'";
//     }
//     // echo $sql; die;
//     pdo_execute($sql);

// }

// function checkemmail($role,$name_user, $img_user, $age_user, $email, $active,$matkhau)
// {
//     $sql = "select * from user where name_user  = '".$name_user."' AND matkhau='".$matkhau."'";
//     $kh= pdo_query_one($sql);
//     return $kh;
//     var_dump($kh);die;
// }
?>