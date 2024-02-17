<?php
include 'condb.php';

if (isset($_POST['id_user']) && isset($_POST['status'])) {
    $id_user = $_POST['id_user'];
    $status = $_POST['status'];

    $update_query = "UPDATE tb_apply SET status = ";

    switch ($status) {
        case 'รอสัมภาษณ์':
            $update_query .= '1';
            break;
        case 'รับเข้าทำงาน':
            $update_query .= '2';
            break;
        default:
            break;
    }

    $update_query .= " WHERE id_user = $id_user";
    
    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['success' => true, 'message' => 'สถานะถูกอัปเดตเรียบร้อย']);
    } else {
        echo json_encode(['success' => false, 'message' => 'มีข้อผิดพลาดในการอัปเดตสถานะ']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ไม่พบข้อมูล']);
}

mysqli_close($conn);
?>


