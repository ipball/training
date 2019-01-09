<?php
//----------------------------------------------------------------------
//## include script
include('config.php');
include('connect.php');

if (!$_POST) {
    exit('Not submit!');
}

//----------------------------------------------------------------------
//## กรณีที่ไม่มี $_POST['id'] ให้ insert แต่ถ้ามี ให้ update
$sql = "INSERT INTO products (name, price, quantity, uom, detail) ";
$sql .= "VALUES ('{$_POST['name']}', '{$_POST['price']}', '{$_POST['quantity']}', '{$_POST['uom']}', '{$_POST['detail']}')";

$query = mysqli_query($conn, $sql);
mysqli_close($conn);
//----------------------------------------------------------------------
//## ตรวจสอบว่า $query เป็น true = บันทึกสำเร็จให้ redirect ไปหน้าเดิม
if($query) {
    header('location:'.$base_url.'product_list.php');
} else {
    header('location:'.$base_url.'product_form.php');
}