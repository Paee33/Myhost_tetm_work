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
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php include 'menu.php'; ?> 
    <div id="layoutSidenav_content">
    <main> 
    <div class="container">
    <div class="container py-5 h-100">
    <div class="shadow p-3 mb-5 bg-body rounded ">     
    <div class="card-body p-4 ">
    <h2>ไฟล์ PDF</h2> <br>
                <?php
                require_once 'connect.php';
                $stmt = $conn->prepare("SELECT * FROM tbl_pdf");
                $stmt->execute();
                $result = $stmt->fetchAll();
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
                                    ?>
                                    <div class="row g-0">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $docName; ?></h5> 
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"> 
                                                        <a href="open_document.php?id=<?= $docId; ?>" class="btn btn-outline-success" style="underline;">ดูไฟล์</a>
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
        </main>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>