<?php
// ต้องมี session_start() ที่บรรทัดแรกสุดของไฟล์ login.php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .glass-card {
            background-color: rgba(240, 240, 240, 0.77);
            /* White with 15% opacity */
            backdrop-filter: blur(10px);
            /* Frosted glass effect */
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Light border */
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            /* Subtle shadow */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-secondary min-vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-4">
                <div class="card p-4 shadow-lg border-0 rounded-4 glass-card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Login</h3>
                        <form action="check_login.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="Text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <?php
    // ส่วนนี้จะยังคงอยู่และทำงานเมื่อมีการ redirect กลับมา
    if (isset($_SESSION['sweet_alert'])) {
        $alert = $_SESSION['sweet_alert'];
        unset($_SESSION['sweet_alert']); // ลบข้อมูล alert ออกจาก session หลังจากแสดงแล้ว
    ?>
        <script>
            Swal.fire({
                icon: '<?php echo $alert['icon']; ?>',
                title: '<?php echo $alert['title']; ?>',
                text: '<?php echo $alert['text']; ?>',
                showConfirmButton: true
            });
        </script>
    <?php
    }
    ?>
</body>

</html>