<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>เข้าสู่ระบบ</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
</head>
<body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">LOGIN</h3></div>
                                    <div class="card-body">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <div class="form-floating mb-3">
                                    <input class="form-control" id="username" name="username" placeholder="name@example.com" />
                                    <label for="email">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <input class="form-control" id="Password" type="password" name="password" placeholder="Password" />
                                    <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                    <input type="submit" name="submit" class="btn"style="background-color:#FF6633; color: white;" value="Login">
                                    </div>
                                    </form>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                                    <script src="js/scripts.js"></script>
</body>
</html>
<?php
include 'condb.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "ล็อกอินสำเร็จ!";
        session_start();
        $_SESSION['username'] = $username; 
        header("Location:information.php");
        exit();
    } else {
        echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}    
?>

<?php
$conn->close();
?>