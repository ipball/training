<?php
header("Content-type: application/json; charset=utf-8");
include('../connect.php');

$contents = file_get_contents('php://input'); 
$data = json_decode($contents, true);

$sql = "DELETE FROM products WHERE id='{$data['id']}'";
$query = mysqli_query($conn, $sql);

// สร้างตัวแปร array เพื่อเก็บค่าเป็น JSON
if($query) {
    $json = array(
        'result' => true,
        'message' => 'Delete successful'    
    );
} else {
    $json = array(
        'result' => false,
        'message' => 'Delete faild'    
    );
}

// ส่งข้อมูล
exit(json_encode($json));