<?php
session_start();
include('fpdf168/fpdf.php');
include('condb.php');
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];


    $sql = "SELECT * FROM tb_apply WHERE id_user = $id_user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
        $pdf->SetFont('THSarabunNew', '', 16);

    $pdf->Image('imgs/from4.png', 1, 1, 210, 297);
        if ($row && $row['img']) {
            $image_path = 'upload/' . $row['img'];
            $pdf->Image($image_path, 168, 13, 30, 38);
        } else {
            // กรณีไม่พบรูปภาพ
            echo "No image found";
        }

    $pdf->SetXY(50, 59);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['card_number']), 0, 1,);

    $pdf->SetXY(139, 59);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['card_exp']), 0, 1,);

    $pdf->SetXY(37, 69);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['title_name']), 0, 1,);

    $pdf->SetXY(66, 69);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['name']), 0, 1,);

    $pdf->SetXY(128, 69);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['surname']), 0, 1,);

    $pdf->SetXY(45, 78);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['birth_day']), 0, 1,);

    $pdf->SetXY(95, 78);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['age']), 0, 1,);

    $pdf->SetXY(140, 78);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['gender']), 0, 1,);

    $pdf->SetXY(38, 88);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['race']), 0, 1,);

    $pdf->SetXY(70, 88);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['nationality']), 0, 1,);

    $pdf->SetXY(100, 88);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['religion']), 0, 1,);

    $pdf->SetXY(148, 88);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['phone']), 0, 1,);

  
    $pdf->SetXY(45, 98);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['person']), 0, 1,);

    $pdf->SetXY(130, 98);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['soldier']), 0, 1,);

    $pdf->SetXY(48, 107);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['license']), 0, 1,);

    $pdf->SetXY(120, 107);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['typecar']), 0, 1,);

    $pdf->SetXY(50, 117);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['position']), 0, 1,);


    $pdf->SetXY(45, 147);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['education']), 0, 1,);

    $pdf->SetXY(104, 147);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['branch']), 0, 1,);

    $pdf->SetXY(29, 157);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['board']), 0, 1,);

    $pdf->SetXY(106, 157);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['institute']), 0, 1,);



    $pdf->SetXY(40, 185);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['house_card']), 0, 1,);
    
    $pdf->SetXY(85, 185);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['swine_card']), 0, 1,);

    $pdf->SetXY(145, 185);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['alley_card']), 0, 1,);

    $pdf->SetXY(35, 194);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['road_card']), 0, 1,);

    $pdf->SetXY(85, 194);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['district_card']), 0, 1,);

    $pdf->SetXY(143, 194);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['prefecture_card']), 0, 1,);

    $pdf->SetXY(35, 204);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['province_card']), 0, 1,);

    $pdf->SetXY(128, 204);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['code_card']), 0, 1,);



    $pdf->SetXY(40, 232);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['house_number']), 0, 1,);
    
    $pdf->SetXY(85, 232);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['swine']), 0, 1,);

    $pdf->SetXY(140, 232);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['alley']), 0, 1,);

    $pdf->SetXY(35, 241);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['road']), 0, 1,);

    $pdf->SetXY(85, 241);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['district']), 0, 1,);

    $pdf->SetXY(143, 241);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['prefecture']), 0, 1,);

    $pdf->SetXY(35, 251);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['province']), 0, 1,);

    $pdf->SetXY(128, 251);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['code']), 0, 1,);


    $pdf->AddPage(); // เพิ่มหน้าใหม่
    $pdf->Image('imgs/from5.png', 1, 1, 210, 297);
    $pdf->SetXY(56, 32);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['experience']), 0, 1);
    
    $pdf->SetXY(115, 32);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['company']), 0, 1);
    $pdf->SetXY(40, 42);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['st_work']), 0, 1);
    $pdf->SetXY(115, 42);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['end_work']), 0, 1);
    $pdf->SetXY(75, 52);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['web']), 0, 1);
    $pdf->SetXY(50, 61);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['detail']), 0, 1);
    $pdf->SetXY(50, 81);
    $pdf->MultiCell(0, 8, iconv('UTF-8', 'cp874', $row['reason']), 0, 1);

    $pdf->SetXY(40, 109);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['company_2']), 0, 1);
    $pdf->SetXY(40, 119);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['start_work2']), 0, 1);
    $pdf->SetXY(115, 119);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['end_work2']), 0, 1);
    $pdf->SetXY(75, 129);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['web_2']), 0, 1);
    $pdf->SetXY(50, 139);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['detail_2']), 0, 1);
    $pdf->SetXY(50, 158);
    $pdf->MultiCell(0, 8, iconv('UTF-8', 'cp874', $row['reason_2']), 0, 1);

    $pdf->SetXY(40, 187);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['company_3']), 0, 1);
    $pdf->SetXY(40, 196);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['start_work3']), 0, 1);
    $pdf->SetXY(115, 196);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['end_work3']), 0, 1);
    $pdf->SetXY(75, 206);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['web_3']), 0, 1);
    $pdf->SetXY(50, 216);
    $pdf->Cell(0, 8, iconv('UTF-8', 'cp874', $row['detail_3']), 0, 1);
    $pdf->SetXY(50, 235);
    $pdf->MultiCell(0, 8, iconv('UTF-8', 'cp874', $row['reason_3']), 0, 1);
    

    $pdf->Output();
} else {
    echo "No data found";
}
}
?>

