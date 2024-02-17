<?php
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
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
  
                        <form method="POST" action="insert_work.php">
                            <div class="row g-3">
                                <?php
                                require_once 'connect.php';
                                $stmt = $conn->prepare("SELECT * FROM tbl_pdf");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                $images = array("img/tura.jpg", "img/it.jpg", "img/marketing.jpg", "img/programer.jpg");
                                ?>
                                <main>
                                    <div class="container">
                                        <div class="row">
                                            <?php foreach ($result as $index => $row) : ?>
                                                <div class="col-md-6">
                                                    <?php
                                                    $docId = $row['id'];
                                                    $docName = $row['doc_name'];
                                                    $docFile = $row['doc_file'];
                                                    $image = isset($images[$index]) ? $images[$index] : '';
                                                    ?>
                                                    <div class="card mb-3" style="max-width: 540px;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img src="<?= $image; ?>" class="img-fluid rounded-start"
                                                                    alt="Your Image Description">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?= $docName; ?></h5>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                            <a href="open_document.php?id=<?= $docId; ?>"
                                                                                class="btn"style="background-color:#FF6633; color: white;">รายละเอียด</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'footer.php';?>
</html>

