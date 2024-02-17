<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครงาน</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        * {
            font-family: 'Kanit', sans-serif;
        }

        .navbar {
            border-bottom: 4px solid #FF6633;
        }
    </style>
</head>
<body>
    <?php include 'index.php'; ?>
    <br><br><br><br><br>
    <main class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
<?php
include 'connect.php';
if (isset($_GET['id'])) {
    $docId = $_GET['id'];


    $sql = "SELECT * FROM tbl_pdf WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $docId);
    $stmt->execute();
    
    $document = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($document) {
        echo '<div style="text-align: center; color: #FF6633;">';
        $docName = $document['doc_name'];
        
        $docPosition = isset($document['doc_position']) ? $document['doc_position'] : '';
    
        $docFile = $document['doc_file'];
    
        if (file_exists('admin/docs/' . $docFile)) {
            echo '<h2>ตำแหน่ง ' . $docPosition . ' - ' . $docName . '</h2>';
            
            echo '<br><iframe src="admin/docs/' . $docFile . '" width="900" height="1200"></iframe>';
        } else {
            echo "ไม่พบไฟล์เอกสาร";
        }
    } else {
        echo "ไม่พบเอกสาร";    
    }
}
?>
</main> <br><br><br><br><br>
 <?php include 'footer.php';?>
</body>
</html>
