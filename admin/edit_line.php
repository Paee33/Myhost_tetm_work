<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTokenValue = $_POST['new_token_value'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Work_db";

    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if (!$connection) {
        die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
    }

    $query = "UPDATE `line_token` SET `line_token` = ? WHERE `line_token` <> ''";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $newTokenValue);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['success'] = "Successfully updated Line Token.";
    } else {
        $_SESSION['error'] = "Failed to update Line Token.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    header("Location: from_line.php");
    exit(); 
}
?>