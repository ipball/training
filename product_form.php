<?php
include 'config.php';

//----------------------------------------------------------------------
//## Header
include 'layouts/header.php'
?>

<h2>รายการสินค้า</h2>
<div class="mb-2">
    <a href="<?=$base_url?>product_list.php" role="button" class="btn btn-info">ย้อนกลับ</a>
</div>
<form action="<?=$base_url?>product_db.php" method="post">
    <div class="form-row">
        <div class="form-group col-sm-12">
            <label>ชื่อ</label>
            <input type="text" class="form-control" name="name">
            <small id="emailHelp" class="form-text text-muted">ชื่อสินค้า ต้องระบุ</small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-4">
            <label>ราคา</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="form-group col-sm-4">
            <label>จำนวน</label>
            <input type="number" class="form-control" name="quantity">
        </div>
        <div class="form-group col-sm-4">
            <label>หน่วยนับ</label>
            <select name="uom" class="form-control">
                <option value="">เลือกหน่วยนับ</option>
                <option value="ชิั้น">ชิ้น</option>
                <option value="มัด">มัด</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-12">
            <label>รายละเอียด</label>
            <textarea name="detail" rows="5" class="form-control"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
</form>

<?php
//----------------------------------------------------------------------
//## Footer
include 'layouts/footer.php';