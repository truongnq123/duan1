<?php
// kết nối vs db
function get_connection()
{
    $host = 'localhost';
    $dbname = 'da1_kooding';
    $username = 'root';
    $password = '';
    $url = "mysql:host=$host;dbname=$dbname;charset=utf8";
    try {
        $pdo = new PDO($url, $username, $password);
        // set các thuộc tính 1: báo cáo lỗi, ngoại lệ.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "kHÔNG thể kết nối vs db <br>";
        echo "Error:" . $e->getMessage();
    }
    return $pdo;
}

// function process
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// lấy all data
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    }
}
// lấy 1 row
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// lấy 1 value
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
//  đếm số bản ghi
function recored_exits($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    $conn = get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $users = $stmt->fetchColumn();
    return $users;
}
