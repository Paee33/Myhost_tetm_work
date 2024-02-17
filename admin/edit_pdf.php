<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <!-- Bootstrap CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
    <?php include 'menu.php'; ?> 
    <div id="layoutSidenav_content">
    <main> 
    <div class="container">
    <div class="container py-5 h-100">
    <div class="shadow p-3 mb-5 bg-body rounded ">     
    <div class="card-body p-4 ">
<?php
require_once 'connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $new_doc_name = $_POST['new_doc_name'];

        // ตรวจสอบว่ามีการส่งไฟล์มาหรือไม่
        if (isset($_FILES['new_file']) && $_FILES['new_file']['error'] === UPLOAD_ERR_OK) {
            $new_doc_file = $_FILES['new_file']['name'];
            $temp_file = $_FILES['new_file']['tmp_name'];
            $upload_dir = 'docs/';

            // อัพโหลดไฟล์ใหม่
            move_uploaded_file($temp_file, $upload_dir . $new_doc_file);

            // อัพเดทฐานข้อมูลด้วยไฟล์ใหม่
            $stmt = $conn->prepare("UPDATE tbl_pdf SET doc_file = ? WHERE doc_name = ?");
            $stmt->execute([$new_doc_file, $new_doc_name]);

            // ลิ้งค์กลับไปที่หน้าแสดงข้อมูลหลังจากอัพเดท
        }
    }
}
?>

<h2>อัพเดทไฟล์ PDF</h2>
<form method="post" enctype="multipart/form-data">
<select name="new_doc_name" class="form-select form-select-m" style="width: 300px;" aria-label="เลือกชื่อเอกสาร">
    <option selected>-- เลือกตำแหน่ง --</option>
        <?php
        $stmt = $conn->prepare("SELECT doc_name FROM tbl_pdf");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $row) {
            echo "<option value='" . $row['doc_name'] . "'>" . $row['doc_name'] . "</option>";
        }
        ?>
    </select>
    <br>
    <label for="new_file">อัพโหลดไฟล์ PDF: </label>
    <input type="file" name="new_file" required   class="form-control" style="width: 300px;" accept=".pdf"> 
    <br>
    <input type="submit" name="submit" class="btn btn-primary" onclick="confirmSubmission();" value="บันทึก">
</form>
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
        <script>
    function confirmSubmission(mypage) {
        var agree = confirm('คุณต้องการอัพเดทหรือไม่?');
        if (agree) {
            window.location=mypage;
        }
    }
</script>
       