<?php
session_start();
include 'condb.php';
$idcard = $_POST['idcard'];
$exp = $_POST['exp'];
$name_title = $_POST['titlename'];
$f_name = $_POST['fname'];
$s_name = $_POST['sname'];
$age = $_POST['age'];
$birthday = $_POST['birthday'];
$race = $_POST['race'];
$nationality = $_POST['nationality'];
$religion = $_POST['religion'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$status_p = $_POST['status_p'];
$license = $_POST['license'];
$typecar = $_POST['typecar'];
$soldier = $_POST['soldier'];
$education = $_POST['education'];
$position = $_POST['position'];
$branch = $_POST['branch'];
$board = $_POST['board'];
$institute = $_POST['institute'];
$housecard = $_POST['house_card'];
$swinecard = $_POST['swine_card'];
$alleycard = $_POST['alley_card'];
$roadcard = $_POST['road_card'];
$districtcard = $_POST['district_card'];
$prefecturecard = $_POST['prefecture_card'];
$provincecard = $_POST['province_card'];
$codecard = $_POST['code_card'];
$house = $_POST['house'];
$swine = $_POST['swine'];
$alley = $_POST['alley'];
$road = $_POST['road'];
$district = $_POST['district'];
$prefecture = $_POST['prefecture'];
$province = $_POST['province'];
$code = $_POST['code'];
$working = $_POST['working'];

$company = $_POST['company'];
$rank = $_POST['rank'];
$start_work = $_POST['start_work'];
$end_work = $_POST['end_work'];
$web = $_POST['web'];
$detail = $_POST['detail'];
$reason = $_POST['reason'];

$company2 = $_POST['company2'];
$rank2 = $_POST['rank2'];
$start_work2 = $_POST['start_work2'];
$end_work2 = $_POST['end_work2'];
$web2 = $_POST['web2'];
$detail2 = $_POST['detail2'];
$reason2 = $_POST['reason2'];

$company3 = $_POST['company3'];
$rank3 = $_POST['rank3'];
$start_work3 = $_POST['start_work3'];
$end_work3 = $_POST['end_work3'];
$web3 = $_POST['web3'];
$detail3 = $_POST['detail3'];
$reason3 = $_POST['reason3'];
$image_name = "";

if(isset($_FILES['profileImage'])){
    $image_tmp = $_FILES['profileImage']['tmp_name'];

    if (!empty($_FILES['profileImage']['name'])) {
        $image_name = $_FILES['profileImage']['name'];
        $upload_path = "admin/upload/";

        move_uploaded_file($image_tmp, $upload_path.$image_name);
    }
}

$apply_time = date("H:i:s d-m-Y");

$check_query = "SELECT * FROM `tb_apply` WHERE phone = '$phone'";
$result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['errors'] = "เบอร์โทรนี้ถูกใช้ทำการสมัครแล้ว";
    header('location: work.php');
    exit();
}
        $sql = "INSERT INTO `tb_apply`(`card_number`, `card_exp`, `title_name`, `name`, `surname`,`age`, `birth_day`, `race`, `nationality`, `religion`,
        `phone`,`gender`,`person`, `license`, `typecar`, `soldier`, `education`, `position`, `branch`, `board`, `institute`, `house_card`, `swine_card`, `alley_card`, `road_card`, `district_card`, `prefecture_card`,
        `province_card`, `code_card`, `house_number`, `swine`, `alley`, `road`, `district`, `prefecture`, `province`, `code`, 
        `experience`, `company`, `rank`,`st_work`,`end_work`,`web`, `detail`, `reason`, `company_2`, `rank_2`, `start_work2`, `end_work2`, `web_2`, `detail_2`,
         `reason_2`, `company_3`, `rank_3`, `start_work3`, `end_work3`, `web_3`, `detail_3`, `reason_3`,`img`, `status`)
         VALUES ('$idcard', '$exp', '$name_title', '$f_name', '$s_name', '$age', '$birthday', '$race', '$nationality', 
        '$religion', '$phone', '$gender', '$status_p', '$license', '$typecar', '$soldier', '$education', '$position', '$branch','$board','$institute','$housecard',
        '$swinecard', '$alleycard', '$roadcard', '$districtcard', '$prefecturecard', '$provincecard', '$codecard', '$house','$swine',
        '$alley', '$road', '$district', '$prefecture', '$province', '$code', '$working',  '$company','$rank','$start_work','$end_work','$web','$detail', '$reason',
        '$company2','$rank2','$start_work2','$end_work2','$web2','$detail2', '$reason2', '$company3','$rank3','$start_work3','$end_work3','$web3','$detail3', '$reason3', '$image_name', '3')";

$hand = mysqli_query($conn, $sql);
if ($hand) {
    $_SESSION['success'] = "Successfully applied.";
    header("Location: work.php");
} else {
    $_SESSION['error'] = "Failed to insert the application.";
    header("Location: work.php");
}

mysqli_close($conn);
?>
<?php
include 'line.php';
?>