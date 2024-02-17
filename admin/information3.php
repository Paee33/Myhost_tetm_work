<?php include 'condb.php'; ?>
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
    <div class="container-fluid px-4"> <br>
    
                     <h3>ข้อมูลผู้สมัครงาน</h3>
                    <div>
                        <a href="information.php" class="btn btn-outline-secondary mb-2 mt-2">ทั้งหมด</a>
                        <a href="information1.php" class="btn btn-outline-danger mb-2 mt-2">รอตรวจสอบ</a>
                        <a href="information3.php" class="btn btn-outline-warning mb-2 mt-2">รอสัมภาษณ์</a>
                        <a href="information4.php" class="btn btn-outline-success mb-2 mt-2">รับเข้าทำงาน</a>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                    <th style="width: 10%;">ภาพ</th> 
                    <th style="width: 10%;">วันที่/เวลาสมัคร</th>
                    <th style="width: 5%;">คำนำหน้า</th>
                    <th style="width: 10%;">ชื่อ</th>
                    <th style="width: 10%;">นามสกุล</th>
                    <th style="width: 10%;">เลขบัตรประชาชน</th>
                    <th style="width: 10%;">เบอร์โทรศัพท์</th>
                    <th style="width: 30%;">ตำแหน่งที่สนใจ</th>
                    <th style="width: 5%;">PDF</th>
                    <th style="width: 5%;">อัพเดท</th>
                    <th style="width: 10%;">สถานะ</th>
                    </tr>
                    </thead>
<?php
 $sql ="SELECT * from tb_apply where status='1'";
 $result=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result)){
$status = $row['status'];
 ?>                            
<tr>
<td>
<?php
$uploadsDirectory = 'upload/';
if (!empty($row["img"])) {
    echo '<div style="text-align: center;">';
    echo '<img src="' . $uploadsDirectory . '/' . $row["img"] . '" alt="รูปภาพโปรไฟล์" style="max-width: 130px; max-height: 130px; display: inline-block;">';
    echo '</div>';
} else {
    echo 'ไม่มีรูป';
}
?>  
</td>
    <td><?=$row["apply_time"]?></td>
    <td><?=$row["title_name"]?></td>
    <td><?=$row["name"]?></td>
    <td><?=$row["surname"]?></td>
    <td><?=$row["card_number"]?></td>
    <td><?=$row["phone"]?></td>
    <td><?=$row["position"]?></td>
    <td>
    <a href="pdf_work.php?id_user=<?= $row['id_user']; ?>" class="btn btn-dark" target="_blank">PDF</a>
</td>    
    <td>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <div class="dropdown">
            <button type="button" class="btn btn-secondary fa-solid fa-pen" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="status1.php?id=<?= $row['id_user'] ?>&status=รอสัมภาษณ์" onclick="del1(this.href); return false;">รอสัมภาษณ์</a></li>
            <li><a class="dropdown-item" href="status2.php?id=<?= $row['id_user'] ?>&status=สัมภาษณ์แล้ว" onclick="del2(this.href); return false;">รับเข้าทำงาน</a></li>
        </div>
    </div>
</td>
<td>
<?php
     if ($status == 1) {
        echo '<span class="badge rounded-pill bg-warning">รอสัมภาษณ์</span>';
    } else if ($status == 2) {
        echo '<span class="badge rounded-pill bg-success">รับเข้าทำงาน</span>';
    } else if ($status == 3) {
        echo '<span class="badge rounded-pill bg-danger">รอตรวจสอบ</span>';
    }
    ?>
</td>
</tr>

                                    <?php
                                    }
                                    mysqli_close($conn);
                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
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
        
        <script>
    function del1(mypage) {
        var agree = confirm('คุณต้องการเลือกรอสัมภาษณ์');
        if (agree) {
            window.location=mypage;
        }
    }
</script>

<script>
    function del2(mypage1) {
        var agree = confirm('คุณต้องการเลือกรับเข้าทำงาน');
        if (agree) {
            window.location=mypage1;
        }
    }
</script>

