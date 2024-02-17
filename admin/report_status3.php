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
    <title> รายงานผู้สมัครทั้งหมดในแต่ละเดือน/ปี</title>
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
    <h4> รายงานผู้สมัครทั้งหมดในแต่ละเดือน/ปี</h4>
   <div class="card-body">
    <form method="post">
        <div class="row mb-3">
        <div class="col">
    <select name="month" class="form-select">
        <option value="" disabled selected>-- เลือกเดือน --</option>
        <?php
        $monthsThai = array(
            1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
            4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
            7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
            10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
        );
        $sql = "SELECT DISTINCT MONTH(apply_time) AS month FROM tb_apply ORDER BY month ASC";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $month = $row['month'];
            $monthNameThai = $monthsThai[$month];
            printf('<option value="%02d">%s</option>', $month, $monthNameThai);
        }
        ?>
    </select>
</div>

            <div class="col">
                <select name="year" class="form-select">
                    <option value="" disabled selected>-- เลือกปี --</option>
                    <?php
                    $sql = "SELECT DISTINCT YEAR(apply_time) AS year FROM tb_apply ORDER BY year ASC";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $year = $row['year'];
                        echo "<option value=\"$year\">$year</option>";
                    }
                    ?>
                </select>
            </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </div>
        </form>
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
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $month = $_POST["month"];
                    $year = $_POST["year"];
                    $sql = "SELECT * FROM tb_apply WHERE 1=1";
                    if (!empty($month) && !empty($year)) {
                        $sql .= " AND MONTH(apply_time) = $month AND YEAR(apply_time) = $year";
                    } elseif (!empty($month)) {
                        $sql .= " AND MONTH(apply_time) = $month";
                    } elseif (!empty($year)) {
                        $sql .= " AND YEAR(apply_time) = $year";
                    }
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)) {
                        $status = $row['status'];
                        echo "<tr>";
                        echo "<td>{$row["apply_time"]}</td>";
                        echo "<td>{$row["title_name"]}</td>";
                        echo "<td>{$row["name"]}</td>";
                        echo "<td>{$row["surname"]}</td>";
                        echo "<td>{$row["card_number"]}</td>";
                        echo "<td>{$row["phone"]}</td>";
                        echo "<td>{$row["position"]}</td>";
                        echo "<td>";
                        if ($status == 1) {
                            echo '<span class="badge rounded-pill bg-warning">รอสัมภาษณ์</span>';
                        } else if ($status == 2) {
                            echo '<span class="badge rounded-pill bg-success">รับเข้าทำงาน</span>';
                        } else if ($status == 3) {
                            echo '<span class="badge rounded-pill bg-danger">รอตรวจสอบ</span>';
                        }
                        echo "</td>";
                        echo "<td>";
                        echo '<a href="pdf_work.php?id_user=' . $row['id_user'] . '" class="btn btn-dark" target="_blank">PDF</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
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
