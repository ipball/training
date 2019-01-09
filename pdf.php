<?php
require __DIR__ . '/vendor/autoload.php';
//----------------------------------------------------------------------
//## include script & retrive data
include('connect.php');
$sql = "SELECT * FROM products where id='{$_GET['id']}'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

//----------------------------------------------------------------------
//## สร้าง instance $pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//----------------------------------------------------------------------
//## ปิด header, footer
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

//----------------------------------------------------------------------
//## กำหนด font
$pdf->SetFont('thsarabun', '', 14, '', true);

//----------------------------------------------------------------------
//## เพิ่มหน้าไฟล์ PDF
$pdf->addPage();

//----------------------------------------------------------------------
//## html data
$html = '<table width="100%" border="1">
<tr>
    <td width="20%">Product Name:</td>
    <td width="80%">'.$result['name'].'</td>
</tr>
</table>';

//writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
mysqli_close($conn);

$pdf->Output('test_pdf.pdf', 'I');