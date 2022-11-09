<?php

// select 
function acc_select_all(){
    $sql = "SELECT * FROM accounts ORDER BY created_at DESC";
    return pdo_query($sql);
}
function acc_select_by_email($e){
    $sql = "SELECT * FROM accounts WHERE email='$e'";
    return pdo_query_one($sql);
}
function acc_select_by_id($id){
    $sql = "SELECT * FROM accounts WHERE id=$id";
    return pdo_query_one($sql);
}
//  insert
function acc_insert($name,$birthday,$email,$pass,$role_id,$gender,$phone){
    $sql = "INSERT INTO accounts (fullname,birthday,email,password,role_id,gender,phone) VALUES('$name','$birthday','$email','$pass',$role_id,$gender,'$phone')";
    pdo_execute($sql);
}
// update
function acc_update($id,$name,$birthday,$pass,$role_id,$gender,$phone){
    $sql = "UPDATE accounts SET fullname='$name',birthday='$birthday',password='$pass',role_id=$role_id,gender=$gender,phone='$phone' WHERE id=$id";
    pdo_execute($sql);
}
function profile_update($id,$name,$birthday,$role_id,$gender,$phone){
    $sql = "UPDATE accounts SET fullname='$name',birthday='$birthday',role_id=$role_id,gender=$gender,phone='$phone' WHERE id=$id";
    pdo_execute($sql);
}
function acc_update_pass($id,$pass){
    $sql = "UPDATE accounts SET password='$pass' WHERE id=$id";
    pdo_execute($sql);
}

// acc del
function acc_delete($id){
    $sql = "DELETE FROM accounts WHERE id='$id'";
    pdo_execute($sql);
}
