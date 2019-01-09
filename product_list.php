<?php
include('config.php');
include('connect.php');
$sql = "SELECT * FROM products";
$query = mysqli_query($conn, $sql);
//----------------------------------------------------------------------
//## Header
include('layouts/header.php')
?>

<h2>รายการสินค้า</h2>
<div class="mb-2">
    <a href="<?=$base_url?>product_form.php" role="button" class="btn btn-info">เพิ่มข้อมูล</a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>หน่วยนับ</th>
                <th>เครื่องมือ</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?=$result['name']?></td>
                <td><?=$result['price']?></td>
                <td><?=$result['quantity']?></td>
                <td><?=$result['uom']?></td>
                <td>
                    <a href="<?=$base_url?>pdf.php?id=<?=$result['id']?>" role="button" class="btn btn-sm btn-info">รายงาน</a>
                    <a data-href="<?=$base_url?>product_delete.php?id=<?=$result['id']?>" href="#" class="btn btn-danger btn-sm btn-delete" role="button">ลบ</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<!-- js script -->
<script src="<?=$base_url?>assets/js/product.js"></script>
<?php
//----------------------------------------------------------------------
//## Footer
include('layouts/footer.php');
mysqli_close($conn);