<?php 
    // function loadall_taikhoan(){
    //     $sql = "select * from taikhoan order by id desc";
    //     $listtaikhoan=pdo_query($sql);
    //     return $listtaikhoan;
    // }

    // function loadall_taikhoan(){
    //     $sql = "select * from taikhoan order by id desc";
    //     $listtaikhoan=pdo_query($sql);
    //     return $listtaikhoan;
    // }


    function insert_taikhoan($email,$username,$pass,$phone){
        $sql="insert into account(email,username,password,phone) values('$email','$username','$pass',$phone)";
        pdo_execute($sql);
    }
  
    // function checkuser($username,$pass){
    //     $sql="select * from account where username ='".$username."' AND password ='".$pass."'";
    //     $tk=pdo_query_one($sql);
    //     return $tk;
    // }
    function checkadmin($username,$pass){
        $sql="select * from account where username ='".$username."' AND password ='".$pass."'";
        $tk=pdo_query($sql);
        if(count($tk)>0) return $tk[0]['role'];
        else return 0;
    }
    function checkuser($username,$pass){
        $sql="select * from account where username ='".$username."' AND password ='".$pass."'";
        $kq=pdo_query($sql);
        return $kq;
    }
    function getuser($username,$pass){
        $sql="select * from account where username ='".$username."' AND password ='".$pass."'";
        $kq=pdo_query_one($sql);
        return $kq;
    }


    function delete_taikhoan($id){
        $sql="delete from taikhoan where id=".$id;
        pdo_execute($sql);
    }
    //kiểm tra tài khoản email 
    function acc_select_by_email($e){
        $sql = "SELECT * FROM account WHERE email='$e'";
        return pdo_query_one($sql);
    }








    // function loadon_taikhoan($id){
    //     $sql="select * from taikhoan where id =".$id;
    //     $tk=pdo_query_one($sql);
    //     return $tk;
    // }

    
    // function checkemail($email){
    //     $sql= "select * from taikhoan where email ='".$email."'";
    //     $tk=pdo_query_one($sql);
    //     return $tk;
    // }

    // function update_taikhoan($id,$ho_ten,$pass,$email,$address,$tel){
    //     $sql=" update taikhoan set ho_ten ='".$ho_ten."','".$pass."','".$email."','".$address."','".$tel."' where id=".$id;
    //     pdo_execute($sql);
    // }

?>