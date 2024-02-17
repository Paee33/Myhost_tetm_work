<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ข้อมูลผู้สมัครงาน</title>
        <!-- Bootstrap CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php include 'menu.php'; ?> 
    <div id="layoutSidenav_content">
    <main> 
    <div class="container">
    <div class="container py-5 h-100">
    <div class="card-body p-4 ">
<?php
require_once 'connect.php';

// ตรวจสอบว่ามีไอดีที่รับมาหรือไม่
if (isset($_GET['id'])) {
    $docId = $_GET['id'];

    // ให้เปลี่ยน 'id' เป็นชื่อคอลัมน์ที่เก็บไอดี
    $sql = "SELECT * FROM tbl_pdf WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $docId);
    $stmt->execute();
    
    $document = $stmt->fetch(PDO::FETCH_ASSOC);

    // ...
    if ($document) {
        echo '<div style="text-align: center; color: #FF6633;">';
        $docName = $document['doc_name'];    
        $docPosition = isset($document['doc_position']) ? $document['doc_position'] : ''; 
        $docFile = $document['doc_file'];
        if (file_exists('docs/' . $docFile)) {
            echo '<br><iframe src="docs/' . $docFile . '" width="900" height="1200"></iframe>';
        } else {
            echo "ไม่พบไฟล์เอกสาร";
        }
    } else {
        echo "ไม่พบเอกสาร";    
    }
}
?>
  </main>
</body>
</html>
