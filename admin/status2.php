<?php
include 'condb.php';
$ids = $_GET['id'];

$sql = "UPDATE tb_apply SET status = 2 WHERE id_user = '$ids'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>window.location='information.php'; </script>";
} else {
    echo "<script>alert('ไม่สามารถลบข้อมูลได้'); </script>";
}

mysqli_close($conn);
?>
