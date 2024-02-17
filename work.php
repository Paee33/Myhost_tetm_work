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
    <title>สมัครงาน</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- SweetAlert2 CSS -->
    <script src="dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
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
    <br><br>
    <main class="container">
        <div class="container py-5 h-100">
            <div class="container" style="background-color: white; border-radius: 0.8rem; padding: 20px; margin-top: 20px; border: 2px solid #DCDCDC;">
                <div class="card-header" style="border-radius: 0.8rem; height: 50px; background-color: #FF6633; border: 2px solid white; display: flex; align-items: center; justify-content: center; color: white;">
                    <h3 style="margin: 0; text-align: left;">ข้อมูลส่วนตัว</h3>
                </div>
                <style>
                    .image-container {
                        border: 2px solid #ddd; 
                        border-radius: 10px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .custom-file-upload {
                        border: 2px solid #ddd; 
                        padding: 10px;
                        border-radius: 10px; 
                        cursor: pointer;
                    }
                    
                </style>
                
                <div class="container py-5 h-100 ">
                    <form action="insert_work.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="col-sm-4 mx-auto mb-3 text-center image-container">
                    <img id="photo_preview" src="img/ikon.png" style="display: block; max-width: 50%; height: auto;">
                </div>
                <div class="col-sm-4 mx-auto mb-3 text-center custom-file-upload">
                    <b><label for="profileImage">อัพโหลดรูป</label></b>
                    <input type="file" name="profileImage" id="profileImage" class="form-control" accept="image/png" onchange="previewImage(event)" style="width: 100%; margin-top: 5px;">
                </div>
                                <div class="card-body p-4 ">
                                <form method="POST" action="insert_work.php">
                                <div class="row g-3">
                                <div class="col-sm-6">
                                    <b><label>เลขบัตรประชาชน </label></b>
                                    <input type="text" id="idcard" name="idcard" class="form-control" maxlength="13" placeholder="xxxxxxxxxxxxx" required > <br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>วันหมดอายุเลขบัตรประชาชน </label></b>
                                    <input type="text" name="exp" class="form-control" placeholder="วัน/เดือน/ปี" required> 
                                    <small style="color: gray;">ใช้รูปแบบ: 3 มีนาคม 2567</small>
                                </div>

                                <div class="col-sm-4 ">
                                    <b><label for="position">คำนำหน้า</label></b>
                                    <select class="form-select" name="titlename" required>
                                        <option value="" disabled selected>-- เลือกคำนำหน้า --</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Ms.">Ms.</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>ชื่อ </label></b>
                                        <input type="text" name="fname"  class="form-control"  placeholder="ชื่อ" required > <br>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>นามสกุล </label></b>
                                        <input type="text" name="sname"  class="form-control" placeholder="นามสกุล" required > <br>    
                                </div>
                                <div class="col-sm-4">
                                    <b><label>อายุ </label></b>
                                        <input type="text" name="age"  class="form-control" maxlength="2" placeholder="อายุ" required > <br>    
                                </div>
                                <div class="col-sm-4">
                                    <b><label>วันเดือนปีเกิด </label></b>
                                        <input type="text" name="birthday"  class="form-control"  placeholder="วัน/เดือน/ปี" required >   
                                        <small style="color: gray;">ใช้รูปแบบ: 1 มกราคม 2540</small>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>เชื้อชาติ </label></b>
                                        <input type="text" name="race"  class="form-control" placeholder="เชื้อชาติ" required > <br>    
                                </div>
                                <div class="col-sm-4">
                                    <b><label>สัญชาติ </label></b>
                                        <input type="text" name="nationality"  class="form-control" placeholder="สัญชาติ" required > <br>    
                                </div>
                                <div class="col-sm-4">
                                    <b><label>ศาสนา </label></b>
                                        <input type="text" name="religion"  class="form-control" placeholder="ศาสนา" required > <br>    
                                </div>
                                <div class="col-sm-4">
                                    <b><label>เบอร์โทรศัพท์ </label></b>
                                        <input type="text" name="phone"  class="form-control" maxlength="10" placeholder="เบอร์โทรศัพท์" required > <br>    
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <b><label for="gender">เพศ</label></b>
                                    <select class="form-select" name="gender" required>
                                        <option value="" disabled selected>-- เลือกเพศ--</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <b><label for="status">สถานภาพ </label></b>
                                    <select class="form-select" name="status_p" required>
                                        <option value="" disabled selected>-- เลือกสถานภาพ --</option>
                                        <option value="โสด">โสด</option>
                                        <option value="สมรส">สมรส</option>
                                        <option value="หย่า">หย่า</option>
                                        <option value="หม้าย">หม้าย</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-3">
                                        <b><label for="soldier">สถานะทางทหาร</label></b>
                                        <select class="form-select" name="soldier" required>
                                            <option value="" disabled selected>-- เลือกสถานะทางทหาร --</option>
                                            <option value="ยังไม่เกณฑ์ทหาร">ยังไม่เกณฑ์ทหาร</option>
                                            <option value="ผ่านการเกณฑ์ทหาร">ผ่านการเกณฑ์ทหาร</option>
                                        </select>
                                </div>    
                                <div class="col-sm-4 mb-3">
                                    <b><label for="license">ใบอนุญาติขับขี่ </label></b>
                                    <select class="form-select" name="license" required>
                                        <option value="" disabled selected>-- เลือกใบอนุญาติขับขี่--</option>
                                        <option value="มี">มี</option>
                                        <option value="ไม่มี">ไม่มี</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>ประเภทของใบขับขี่ </label></b>
                                    <input type="text" id="typecar" name="typecar" class="form-control" placeholder="ประเภทของใบขับขี่" required> <br>    
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <b><label for="position">ตำแหน่งที่สนใจ </label></b>
                                    <select class="form-select" name="position" required>
                                        <option value="" disabled selected>-- เลือกตำแหน่ง -- </option>

                                        <?php
                                        $stmt = $conn->prepare("SELECT doc_name FROM tbl_pdf");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();

                                        foreach ($result as $row) {
                                            echo "<option value='" . $row['doc_name'] . "'>" . $row['doc_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="card-header" style="border-radius: 0.8rem; height: 50px; background-color: #FF6633; border: 2px solid white; display: flex; align-items: center; justify-content: center; color: white;">
                                    <h3 style="margin: 0; text-align: left;">ประวัติการศึกษา</h3>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <b><label for="position">การศึกษาสูงสุด </label></b>
                                    <select class="form-select" name="education" required>
                                        <option value="" disabled selected>-- เลือกระดับการศึกษา --</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="อนุปริญญา">อนุปริญญา</option>
                                        <option value="ปวส">ปวส.</option>
                                        <option value="ปวช">ปวช.</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>สาขา </label></b>
                                        <input type="text" name="branch"  class="form-control"  placeholder="สาขา" required > <br>    
                                </div>
                                <div class="col-sm-6">
                                    <b><label>คณะ </label></b>
                                        <input type="text" name="board"  class="form-control"  placeholder="คณะ" required >  
                                        <small style="color: gray;">*หากไม่มีให้ระบุไม่มี* </small>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>สถาบัน </label></b>
                                        <input type="text" name="institute"  class="form-control"  placeholder="สถาบัน" required > <br>    
                                </div>

                                <div class="card-header" style="border-radius: 0.8rem; height: 50px; background-color: #FF6633; border: 2px solid white; display: flex; align-items: center; justify-content: center; color: white;">
                                    <h3 style="margin: 0;">ที่อยู่ตามบัตรประชาชน</h3>
                                </div>
                                <div class="col-sm-3">                                  
                                    <b><label>บ้านเลขที่ </label></b>
                                    <input type="text" name="house_card"  class="form-control"  placeholder="บ้านเลขที่" required > <br>
                                </div>
                                <div class="col-sm-3">                                  
                                    <b><label>หมู่ที่ </label></b>
                                    <input type="text" name="swine_card"  class="form-control"  placeholder="หมู่ที่" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>ตรอก / ซอย </label></b>
                                    <input type="text" name="alley_card"  class="form-control"  placeholder="ตรอก / ซอย" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>ถนน </label></b>
                                    <input type="text" name="road_card"  class="form-control"  placeholder="ถนน" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>ตำบล / แขวง</label></b>
                                    <input type="text" name="district_card"  class="form-control"  placeholder="ตำบล / แขวง" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>เขต / อำเภอ </label></b>
                                    <input type="text" name="prefecture_card"  class="form-control"  placeholder="เขต/อำเภอ " required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>จังหวัด </label></b>
                                    <input type="text" name="province_card"  class="form-control"  placeholder="จังหวัด" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>รหัสไปรษณีย์ </label></b>
                                    <input type="text" name="code_card"  class="form-control"  maxlength="5" placeholder="รหัสไปรษณีย์" required > <br>
                                </div>

                                 <div class="card-header" style="border-radius: 0.8rem; height: 50px; background-color: #FF6633; border: 2px solid white; display: flex; align-items: center; justify-content: center; color: white;">
                                     <h3 style="margin: 0;">ที่อยู่ปัจจุบัน</h3>
                                </div>
                                    <label for="autofillCheckbox">
                                    <input type="checkbox" id="autofillCheckbox" onchange="autofillAddress()"> ที่อยู่เดียวกับที่อยู่บัตรประชาชน
                                    </label>
                                <div class="col-sm-3">                                  
                                    <b><label>บ้านเลขที่ </label></b>
                                    <input type="text" name="house"  class="form-control"  placeholder="บ้านเลขที่" required > <br>
                                </div>
                                <div class="col-sm-3">                                  
                                    <b><label>หมู่ที่ </label></b>
                                    <input type="text" name="swine"  class="form-control"  placeholder="หมู่ที่" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>ตรอก / ซอย </label></b>
                                    <input type="text" name="alley"  class="form-control"  placeholder="ตรอก / ซอย" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>ถนน </label></b>
                                    <input type="text" name="road"  class="form-control"  placeholder="ถนน" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>ตำบล / แขวง</label></b>
                                    <input type="text" name="district"  class="form-control"  placeholder="ตำบล / แขวง" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>เขต / อำเภอ </label></b>
                                    <input type="text" name="prefecture"  class="form-control"  placeholder="เขต/อำเภอ " required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>จังหวัด </label></b>
                                    <input type="text" name="province"  class="form-control"  placeholder="จังหวัด" required > <br>
                                </div>
                                <div class="col-sm-3">
                                    <b><label>รหัสไปรษณีย์ </label></b>
                                    <input type="text" name="code"  class="form-control"  maxlength="5" placeholder="รหัสไปรษณีย์" required > <br>
                                </div>

                                <div class="card-header" style="border-radius: 0.8rem; height: 50px; background-color: #FF6633; border: 2px solid white; display: flex; align-items: center; justify-content: center; color: white;">
                                    <h3 style="margin: 0; text-align: left;">ประสบการณ์ทำงาน</h3>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <b><label for="w3review">ประสบการณ์ทำงาน</label></b>
                                    <select class="form-select" name="working" id="working" required>

                                        <option value="" disabled selected>-- เลือกประสบการณ์ทำงาน --</option>
                                        <option value="ไม่มีประสบการณ์">ไม่มีประสบการณ์</option>
                                        <option value="มีประสบการณ์ทำงาน">มีประสบการณ์ทำงาน</option>
                                    </select>  
                                </div> 

                                <div class="col-sm-4">
                                    <b><label>บริษัท </label></b>
                                    <input type="text" name="company" id="company" class="form-control"  required ><br>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>ตำแหน่ง</label></b>
                                    <input type="text" name="rank" id="rank" class="form-control"  required ><br>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>วันที่เริ่ม</label></b>
                                    <input type="date" name="start_work" id="start_work" class="form-control" max="<?php echo date('Y-m-d'); ?>"required ><br>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>สิ้นสุด</label></b>
                                    <input type="date" name="end_work" id="end_work" class="form-control" max="<?php echo date('Y-m-d'); ?>" required ><br>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>Website / Facebook ของบริษัท</label></b>
                                    <input type="text" name="web" id="web" class="form-control"  required ><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>รายละเอียดงาน </label></b>
                                    <textarea name="detail" id="detail" class="form-control" required ></textarea><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>สาเหตุที่ลาออก </label></b>
                                    <textarea name="reason" id="reason" class="form-control" required ></textarea>
                                    <small style="color: gray;">*หากเป็นนักศึกษาฝึกงานให้ใส่นักศึกษาฝึกงาน* </small>
                                </div>
                   
                                <div class="col-sm-6">
                                    <b><label>บริษัท </label></b>
                                    <input type="text" name="company2" id="company2" class="form-control"  disabled ><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>ตำแหน่ง</label></b>
                                    <input type="text" name="rank2" id="rank2" class="form-control"   disabled><br>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>วันที่เริ่มทำงาน </label></b>
                                    <input type="date" name="start_work2" id="start_work2" class="form-control" max="<?php echo date('Y-m-d'); ?>" disabled><br>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>สิ้นสุด</label></b>
                                    <input type="date" name="end_work2" id="end_work2" class="form-control" max="<?php echo date('Y-m-d'); ?>" disabled><br>
                                </div>
                                <div class="col-sm-4">
                                    <b><label>Website / Facebook ของบริษัท</label></b>
                                    <input type="text" name="web2" id="web2" class="form-control"  disabled><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>รายละเอียดงาน</label></b>
                                    <textarea name="detail2" id="detail2" class="form-control"  disabled></textarea><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>สาเหตุที่ลาออก</label></b>
                                    <textarea name="reason2" id="reason2" class="form-control"  disabled></textarea><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>บริษัท </label></b>
                                    <input type="text" name="company3" id="company3" class="form-control"  disabled><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>ตำแหน่ง</label></b>
                                    <input type="text" name="rank3" id="rank3" class="form-control"  disabled><br>
                                </div>
                                <div class="col-sm-4">
                                  <b><label>วันที่เริ่มทำงาน</label></b>
                                     <input type="date" name="start_work3" id="start_work3" class="form-control" max="<?php echo date('Y-m-d'); ?>"  disabled><br>
                                    </div>
                                    <div class="col-sm-4">
                                        <b><label>สิ้นสุด </label></b>
                                        <input type="date" name="end_work3" id="end_work3" class="form-control" max="<?php echo date('Y-m-d'); ?>"  disabled><br>
                                    </div>
                                <div class="col-sm-4">
                                    <b><label>Website / Facebook ของบริษัท</label></b>
                                    <input type="text" name="web3" id="web3" class="form-control"  disabled><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>รายละเอียดงาน </label></b>
                                    <textarea name="detail3" id="detail3" class="form-control"  disabled></textarea><br>
                                </div>
                                <div class="col-sm-6">
                                    <b><label>สาเหตุที่ลาออก</label></b>
                                    <textarea name="reason3" id="reason3" class="form-control"  disabled></textarea><br>
                                </div>
                            </div>
                                <br>
                                <div id="error-message" class="text-danger"></div>
                                <div style="text-align: center;">
                                 <input type="submit" name="submit" class="btn btn-success" value="บันทึก">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <br><br><br><br><br>
    <?php include 'footer.php';?>
</body>
</html>

<?php
if(isset($_SESSION['success'])){ ?>
<script>
Swal.fire({
  title: "บันทึกข้อมูลสำเร็จ",
  icon: "success"
})
</script>  
<?php
unset($_SESSION['success']);
}
?>

<?php
if (isset($_SESSION['errors'])) {
    echo '<script>';
    echo 'Swal.fire({
                icon: "warning",
                title: "บันทึกข้อมูลไม่สำเร็จ",
                text: "' . $_SESSION['errors'] . '"
            });';
    echo '</script>';

    // เพิ่ม code เพื่อแสดงค่าที่ซ้ำที่ถูกเก็บไว้ใน session
    if(isset($_SESSION['error_phone'])){
        echo '<script>';
        echo 'Swal.fire({
                    icon: "error",
                    title: "Duplicate Phone Number",
                    text: "หมายเลขโทรศัพท์ที่ซ้ำ: ' . $_SESSION['error_phone'] . '"
                });';
        echo '</script>';
        unset($_SESSION['error_phone']); // ลบค่าที่ถูกเก็บไว้ใน session เพื่อไม่ให้แสดงซ้ำ
    }
    unset($_SESSION['errors']);
}
?>
<script>
    document.getElementById('idcard').addEventListener('input', function(event) {
        var input = event.target.value;
        if(input.length !== 13) {
            event.target.setCustomValidity('กรุณากรอกเลขบัตรประชาชนให้ครบ 13 หลัก');
        } else {
            event.target.setCustomValidity('');
        }
    });
</script>

<script>
    document.getElementById('working').addEventListener('change', function() {
        var isIntern = this.value === 'ไม่มีประสบการณ์';
        document.getElementById('company2').disabled = isIntern;
        document.getElementById('rank2').disabled = isIntern;
        document.getElementById('start_work2').disabled = isIntern;
        document.getElementById('end_work2').disabled = isIntern;
        document.getElementById('web2').disabled = isIntern;
        document.getElementById('detail2').disabled = isIntern;
        document.getElementById('reason2').disabled = isIntern;

        document.getElementById('company3').disabled = isIntern;
        document.getElementById('rank3').disabled = isIntern;
        document.getElementById('start_work3').disabled = isIntern;
        document.getElementById('end_work3').disabled = isIntern;
        document.getElementById('web3').disabled = isIntern;
        document.getElementById('detail3').disabled = isIntern;
        document.getElementById('reason3').disabled = isIntern;
    });
</script>

<script>
    function toggleCompanyInputs() {
        var selectBox = document.getElementById("working");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var company2Section = document.getElementById("company2-section");
        var company3Section = document.getElementById("company3-section");

        if (selectedValue === "นักศึกษาฝึกงาน") {
            company2Section.style.display = "none";
            company3Section.style.display = "none";
        } else {
            company2Section.style.display = "block";
            company3Section.style.display = "block";
        }
    }
</script>


<script>
    function autofillAddress() {
        // Get values from card address fields
        var houseCard = document.getElementsByName("house_card")[0].value;
        var swineCard = document.getElementsByName("swine_card")[0].value;
        var alleyCard = document.getElementsByName("alley_card")[0].value;
        var roadCard = document.getElementsByName("road_card")[0].value;
        var districtCard = document.getElementsByName("district_card")[0].value;
        var prefectureCard = document.getElementsByName("prefecture_card")[0].value;
        var provinceCard = document.getElementsByName("province_card")[0].value;
        var codeCard = document.getElementsByName("code_card")[0].value;

        // Fill current address fields with card address values
        document.getElementsByName("house")[0].value = houseCard;
        document.getElementsByName("swine")[0].value = swineCard;
        document.getElementsByName("alley")[0].value = alleyCard;
        document.getElementsByName("road")[0].value = roadCard;
        document.getElementsByName("district")[0].value = districtCard;
        document.getElementsByName("prefecture")[0].value = prefectureCard;
        document.getElementsByName("province")[0].value = provinceCard;
        document.getElementsByName("code")[0].value = codeCard;
    }
</script>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const licenseSelect = document.querySelector('select[name="license"]');
        const typeCarInput = document.querySelector('input[name="typecar"]');
        licenseSelect.addEventListener('change', () => {
            if (licenseSelect.value === "มี") {
                typeCarInput.removeAttribute('disabled');
            } else {
                typeCarInput.setAttribute('disabled', true);
                typeCarInput.value = ""; 
            }
        });
    });
</script>
