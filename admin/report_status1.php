<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>รายงานสถานะรอสัมภาษณ์</title>
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
                     <h4>รายงานสถานะรอสัมภาษณ์</h4>
                            <div class="card-body">
                            <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                        <th>วันที่/เวลาสมัคร</th>
                                        <th>คำนำหน้า</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>เลขบัตรประชาชน</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>ตำแหน่งที่สนใจ</th>
                                        <th>สถานะ</th>
                                        </tr>
                                    </thead>
<?php
 $sql ="SELECT * from tb_apply where status='1'";
 $result=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result)){
$status = $row['status'];
 ?>                            
 
 <tr>
<td><?=$row["apply_time"]?></td>
    <td><?=$row["title_name"]?></td>
    <td><?=$row["name"]?></td>
    <td><?=$row["surname"]?></td>
    <td><?=$row["card_number"]?></td>
    <td><?=$row["phone"]?></td>
    <td><?=$row["position"]?></td>
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
        
