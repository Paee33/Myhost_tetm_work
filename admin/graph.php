<?php include 'condb.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>กราฟรายงานสรุปผู้สมัคร</title>
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
    <style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<?php include 'menu.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <div class="container py-5 h-100">
            <div class="shadow p-3 mb-5 bg-body rounded ">
                <div class="card-body p-4 ">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>

                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "work_db");

                    if (!$conn) {
                        die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
                    }

                    mysqli_set_charset($conn, "utf8");

                    // ดึงข้อมูลปีทั้งหมดที่มีในฐานข้อมูล
                    $sqlYears = "SELECT DISTINCT YEAR(apply_time) as year FROM tb_apply ORDER BY YEAR(apply_time) ASC";
                    $resultYears = mysqli_query($conn, $sqlYears);
                    $years = array();
                    while ($rowYear = mysqli_fetch_assoc($resultYears)) {
                        $years[] = $rowYear['year'];
                    }
                    ?>

                    <form method="get" action="">
                        <label for="year" >เลือกปี:</label>
                        <select name="year" id="year">
                        <option value="" disabled selected>-- เลือกปี --</option>
                            <?php foreach ($years as $yr) { ?>
                                <option value="<?php echo $yr; ?>"><?php echo $yr; ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" class="btn btn-success" value="แสดงข้อมูล">
                    </form>

                    <?php
                    $selectedYear = isset($_GET['year']) ? $_GET['year'] : date("Y");

                    $sql = "SELECT apply_time, position FROM tb_apply WHERE YEAR(apply_time) = '$selectedYear' ORDER BY MONTH(apply_time) ASC";
                    $result = mysqli_query($conn, $sql);

                    $proName = array();
                    $proNum = array();

                    while ($row = mysqli_fetch_assoc($result)) {
                        $monthYear = date("F Y", strtotime($row['apply_time'])); // ดึงชื่อเดือนและปีจากวันที่
                        $position = $row['position'];

                        // นับจำนวนการสมัครตำแหน่งในแต่ละเดือน
                        if (!isset($proNum[$position])) {
                            $proNum[$position] = array();
                        }

                        if (!isset($proNum[$position][$monthYear])) {
                            $proNum[$position][$monthYear] = 1;
                        } else {
                            $proNum[$position][$monthYear]++;
                        }

                        if (!in_array($monthYear, $proName)) {
                            $proName[] = $monthYear;
                        }
                    }

                    // เรียงลำดับเดือนตามปฏิทิน
                    usort($proName, function ($a, $b) {
                        return strtotime($a) - strtotime($b);
                    });

                    $categories = array_unique($proName);
                    $seriesData = array();

                    foreach ($proNum as $position => $data) {
                        $tempData = array('name' => $position, 'data' => array());

                        foreach ($categories as $category) {
                            $tempData['data'][] = $data[$category] ?? 0;
                        }

                        $seriesData[] = $tempData;
                    }
                    $monthNameMapping = array(
                        "January" => "มกราคม",
                        "February" => "กุมภาพันธ์",
                        "March" => "มีนาคม",
                        "April" => "เมษายน",
                        "May" => "พฤษภาคม",
                        "June" => "มิถุนายน",
                        "July" => "กรกฎาคม",
                        "August" => "สิงหาคม",
                        "September" => "กันยายน",
                        "October" => "ตุลาคม",
                        "November" => "พฤศจิกายน",
                        "December" => "ธันวาคม"
                    );

                    // Modify categories using the mapping array
                    $categories = array_map(function ($category) use ($monthNameMapping) {
                        return $monthNameMapping[date("F", strtotime($category))] . " " . date("Y", strtotime($category));
                    }, $categories);
                    ?>

                    <script type="text/javascript">
                        document.addEventListener('DOMContentLoaded', function () {
                            Highcharts.chart('container', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'กราฟแสดงจำนวนผู้สมัครงานในแต่ละเดือนในปี <?php echo $selectedYear; ?>',
                                    align: 'left'
                                },
                                yAxis: {
                                    title: {
                                        text: 'จำนวนคนสมัคร'
                                    },
                                    allowDecimals: false // ทำให้แกน y แสดงเฉพาะจำนวนเต็ม
                                },
                                xAxis: {
                                    categories: <?php echo json_encode($categories); ?>,
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                series: <?php echo json_encode($seriesData); ?>,
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        });
                    </script>
                </div>
            </div>
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
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
