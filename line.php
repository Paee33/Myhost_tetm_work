<?php
include 'condb.php';
function get_token_from_mysql($conn) {
    $sql = "SELECT line_token FROM line_token"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["line_token"];
    } else {
        return null;
    }
}

// ส่งข้อความไปยัง Line Notify
function send_notification_to_line($token, $message) {
    $url = 'https://notify-api.line.me/api/notify';
    $data = array('message' => $message);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\nAuthorization: Bearer $token\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // ตรวจสอบการเรียก API สำเร็จหรือไม่
    if ($result === FALSE) {
        echo "Error sending notification.";
    } else {
        echo "Notification sent successfully.";
    }
}

// ตัวอย่างการใช้งาน
$token = get_token_from_mysql($conn);

if ($token) {
    $name_title = $_POST['titlename'];
    $f_name = $_POST['fname'];
    $s_name = $_POST['sname'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $message = "สมัครพนักงาน\n" . 
        "ชื่อ: $name_title $f_name\n" .
        "นามสกุล: $s_name\n" .
        "เบอร์โทร: $phone\n" .
        "ตำแหน่งที่สนใจ: $position\n"; 

    // URL สำหรับการเปลี่ยนสถานะ
    $message .= "https://10b9-2403-6200-8988-9e7c-a546-aa4-cb7a-a88a.ngrok-free.app/myhost_work/admin/information.php";
    send_notification_to_line($token, $message);
} else {
    echo "ไม่พบToken.";
}

$conn->close();
?>