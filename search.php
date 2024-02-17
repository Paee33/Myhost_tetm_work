<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบสถานะ</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
</head>
</head>
<body>
<?php include 'index.php'; ?>  
    <br><br>
    <main class="container">
        <div class="container py-5 h-100">
            <div class="container" style="background-color: white; border-radius: 0.8rem; padding: 20px; margin-top: 20px; border: 2px solid #DCDCDC;">
                <div class="card-header" style="border-radius: 0.8rem; height: 50px; background-color: #FF6633; border: 2px solid white; display: flex; align-items: center; justify-content: center; color: white;">
                    <h3 style="margin: 0; text-align: left;">ตรวจสอบสถานะ</h3>
                </div> <br>
                <form action="" method="post">
    <div class="col-sm-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>เบอร์โทรศัพท์</b></span>
            </div>
            <input type="text" name="phone_number" id="phone_number" class="form-control" required maxlength="10"> 
            <div class="input-group-append"> 
                <button type="submit" class="btn btn-success">ค้นหา</button>
            </div>
        </div>
    </div>
</form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Work_db";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
        }

        $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $sql = "SELECT * FROM `tb_apply` WHERE `phone` = '$phone_number'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>คำนำหน้า</th><th>ชื่อ</th><th>นามสกุล</th><th>ตำแหน่งที่สมัคร</th><th>สถานะ</th></tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . (isset($row['title_name']) ? $row['title_name'] : '') . "</td>";
                echo "<td>" . (isset($row['name']) ? $row['name'] : '') . "</td>";
                echo "<td>" . (isset($row['surname']) ? $row['surname'] : '') . "</td>";
                echo "<td>" . (isset($row['position']) ? $row['position'] : '') . "</td>";
                echo "<td>";
                if (isset($row['status'])) {
                    if ($row['status'] == 1) {
                        echo '<span class="badge rounded-pill bg-warning">รอสัมภาษณ์</span>';
                    } elseif ($row['status'] == 2) {
                        echo '<span class="badge rounded-pill bg-success">รับเข้าทำงาน</span>';
                    } elseif ($row['status'] == 3) {
                        echo '<span class="badge rounded-pill bg-danger">รอตรวจสอบ</span>';
                    } else {
                        echo "สถานะไม่ถูกต้อง";
                    }
                    
                } else {
                    echo "ไม่มีข้อมูลสถานะ";
                }
                echo "</td>";
        
                echo "</tr>";
            }
        
            echo "</table>";
        } else {
            echo "<div class='not-found-message' style='font-size: 1.2em; color: red;'>ไม่พบข้อมูลการสมัคร</div>";
        }
        

        $conn->close();
    }
    ?>
    </main><br><br><br><br><br><br><br><br><br>
    <?php include 'footer.php';?>
</body>
</html>
