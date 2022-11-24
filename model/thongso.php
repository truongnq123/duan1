<?php
function add_cpu($tencpu)
{
    $sql = "insert into cpu(name_cpu) values ('$tencpu')";
    pdo_execute($sql);
}
function delete_cpu($id_cpu)
{
    $sql = "delete from user where id_cpu =".$id_cpu;
    pdo_execute($sql);
}
function loadall_cpu()
{
    $sql = "select * from cpu order by name_cpu desc ";
    $listcpu = pdo_query($sql);
    return $listcpu;
}

function loadone_pcu($id_cpu)
{
    $sql = "select * from khach_hang where ma_kh  =" . $id_cpu;
    $update = pdo_query_one($sql);
    return $update;
}
// function checkemmail($mail)
// {
//     $sql = "select * from khach_hang where email  ='". $mail."'";
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
// function checkuser($mk_kh,$ho_ten, $kichhoat, $hinh, $email, $vaitro)
// {
//     $sql = "select * from khach_hang where mk_kh  = '".$mk_kh."' AND email='".$email."'";
//     $kh= pdo_query_one($sql);
//     return $kh;
// }

/*------------------------------ Phần của ram ---------------------------------------*/
function add_ram($tenram)
{
    $sql = "insert into ram(ram) values ('$tenram')";
    pdo_execute($sql);
}
// function delete_khachhang($id_us)
// {
//     $sql = "delete from user where id_us =".$id_us;
//     pdo_execute($sql);
// }
function loadall_ram()
{
    $sql = "select * from ram order by ram desc ";
    $listram = pdo_query($sql);
    return $listram;
}

function loadone_ram($id_cpu)
{
    $sql = "select * from khach_hang where ma_kh  =" . $id_cpu;
    $update = pdo_query_one($sql);
    return $update;
}
/*--------------------------------Phần của ổ cứng---------------------------------*/
function add_ocung($tenocung)
{
    $sql = "insert into o_cung(O_cung) values ('$tenocung')";
    pdo_execute($sql);
}
// function delete_khachhang($id_us)
// {
//     $sql = "delete from user where id_us =".$id_us;
//     pdo_execute($sql);
// }
function loadall_ocung()
{
    $sql = "select * from o_cung order by O_cung desc ";
    $listocung = pdo_query($sql);
    return $listocung;
}

function loadone_ocung($id_cpu)
{
    $sql = "select * from khach_hang where ma_kh  =" . $id_cpu;
    $update = pdo_query_one($sql);
    return $update;
}
/*--------------------------------Phần của Hệ điều hành---------------------------------*/
function add_hedieuhanh($tenhdh)
{
    $sql = "insert into hdh(HDH) values ('$tenhdh')";
    pdo_execute($sql);
}
// function delete_khachhang($id_us)
// {
//     $sql = "delete from user where id_us =".$id_us;
//     pdo_execute($sql);
// }
function loadall_HDH()
{
    $sql = "select * from hdh order by HDH desc ";
    $listhdh = pdo_query($sql);
    return $listhdh;
}

function loadone_HDH($id_cpu)
{
    $sql = "select * from khach_hang where ma_kh  =" . $id_cpu;
    $update = pdo_query_one($sql);
    return $update;
}
/*--------------------------------Phần của man hinh---------------------------------*/
function add_manhinh($manhinh)
{
    $sql = "insert into man_hinh(man_hinh) values ('$manhinh')";
    pdo_execute($sql);
}
// function delete_khachhang($id_us)
// {
//     $sql = "delete from user where id_us =".$id_us;
//     pdo_execute($sql);
// }
function loadall_manhinh()
{
    $sql = "select * from man_hinh order by man_hinh desc ";
    $listmh = pdo_query($sql);
    return $listmh;
}

function loadone_manhinh($id_cpu)
{
    $sql = "select * from khach_hang where ma_kh  =" . $id_cpu;
    $update = pdo_query_one($sql);
    return $update;
}
/*--------------------------------Phần của VGA---------------------------------*/
function add_VGA($VGA)
{
    $sql = "insert into vga(vga) values ('$VGA')";
    pdo_execute($sql);
}
// function delete_khachhang($id_us)
// {
//     $sql = "delete from user where id_us =".$id_us;
//     pdo_execute($sql);
// }
function loadall_VGA()
{
    $sql = "select * from vga order by vga desc ";
    $listhdh = pdo_query($sql);
    return $listhdh;
}

function loadone_VGA($id_cpu)
{
    $sql = "select * from khach_hang where ma_kh  =" . $id_cpu;
    $update = pdo_query_one($sql);
    return $update;
}
/*--------------------------------Phần của VGA---------------------------------*/
function add_color($mau)
{
    $sql = "insert into color(color) values ('$mau')";
    pdo_execute($sql);
}
// function delete_khachhang($id_us)
// {
//     $sql = "delete from user where id_us =".$id_us;
//     pdo_execute($sql);
// }
function loadall_color()
{
    $sql = "select * from color order by color desc ";
    $listcolor = pdo_query($sql);
    return $listcolor;
}

function loadone_color($id_cpu)
{
    $sql = "select * from khach_hang where ma_kh  =" . $id_cpu;
    $update = pdo_query_one($sql);
    return $update;
}
?>

