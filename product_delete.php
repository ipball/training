<?php
//----------------------------------------------------------------------
//## include script
include 'config.php';
include 'connect.php';

//----------------------------------------------------------------------
//## ตรวจสอบ ID
if (!empty($_GET['id'])) {
    $sql = "delete from products where id = '{$_GET['id']}'";
    $query = mysqli_query($conn, $sql);

    mysqli_close($conn);
    //----------------------------------------------------------------------
    //## ตรวจสอบว่า $query เป็น true = บันทึกสำเร็จให้ redirect ไปหน้าเดิม
    if ($query) {
        header('location:' . $base_url . 'product_list.php');
    } else {
        exit('Error delete');
    }
}
