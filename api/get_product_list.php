<?php
header("Content-type: application/json; charset=utf-8");

include('../connect.php');
$sql = "SELECT * FROM products";
$query = mysqli_query($conn, $sql);

// สร้างตัวแปร array เพื่อเก็บค่าเป็น JSON
$json = array();

// ดึงข้อมูล
while($result = mysqli_fetch_array($query)) {
    $json[] = array(
        'productId' => $result['id'],
        'productName' => $result['name'],
        'productPrice' => $result['price']
    );
}

// ส่งข้อมูล
exit(json_encode($json));