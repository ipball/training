<?php
header("Content-type: application/json; charset=utf-8");
include('../connect.php');

// กรณีต้องการรับค่า JSON จาก SERVER ถ้าไม่ใช้ เป็น $_GET['id']
// {
// 	"product_id": 6
// }
$contents = file_get_contents('php://input'); 
$data = json_decode($contents, true);

$sql = "SELECT * FROM products WHERE id='{$data['product_id']}'";
$query = mysqli_query($conn, $sql);
// ดึงข้อมูลเก็บไว้ เฉพาะ 1 แถว
$result = mysqli_fetch_array($query);

// สร้างตัวแปร array เพื่อเก็บค่าเป็น JSON
$json = array(
    'id' => $result['id'],
    'name' => $result['name'],
    'price' => $result['price']
);

// ส่งข้อมูล
exit(json_encode($json));