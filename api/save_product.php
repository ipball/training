<?php
header("Content-type: application/json; charset=utf-8");
include('../connect.php');

// แปลง json > array php
$contents = file_get_contents('php://input'); 
$data = json_decode($contents, true);

if(empty($data['name'])) {
    exit(json_encode(
        array(
            'result' => false,
            'message' => 'Name not empty!'
        )
    ));
}
$message_success = 'แทรกแถวข้อมูลสำเร็จ';
if(empty($data['id'])) {
    // คำสั่ง SQL insert
    $sql = "INSERT INTO products (name, price, quantity, uom, detail) ";
    $sql .= "VALUES ('{$data['name']}', '{$data['price']}', '{$data['quantity']}', '{$data['uom']}', '{$data['detail']}')";    
} else {
    // คำสั่ง SQL update
    $sql = "UPDATE products SET name='{$data['name']}', price='{$data['price']}', quantity='{$data['quantity']}', uom='{$data['uom']}', detail='{$data['detail']}'";
    $sql .= " WHERE id='{$data['id']}'";
    $message_success = 'แก้ไขแถวข้อมูลสำเร็จ';
}

$query = mysqli_query($conn, $sql);

// สร้างตัวแปร array เพื่อเก็บค่าเป็น JSON
if($query) {
    $json = array(
        'result' => true,
        'message' => $message_success    
    );
} else {
    $json = array(
        'result' => false,
        'message' => 'Save faild'    
    );
}



// ส่งข้อมูล
exit(json_encode($json));