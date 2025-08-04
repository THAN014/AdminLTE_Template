<?php
    $username_from_url = $_GET['username'];
    require '../connect.php';

    $sql = "SELECT * FROM users WHERE username = '$username_from_url'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result);

     if (!$row) {
        echo "<script>
            alert('ไม่พบผู้ใช้ที่ต้องการแก้ไข!');
            window.location.href = 'index.php?page=users';
        </script>";
        exit;
    }

    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        
        $sql2 = "UPDATE users SET password='$password', fullname='$fullname', phone='$phone', email='$email' WHERE username='$username_from_url'";
        $result2 = $con->query($sql2);
        
        if (!$result2) {
            echo "<script>
            alert ('Saving Error: " . mysqli_error($con) . "');
            history.back();
            </script>";
        } else {
            echo "<script>
            window.location.href = 'index.php?page=users'
            </script>";
        }
    }
?>
    <div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit User Form</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">General Form</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-md-8">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Edit User</div>
                    </div>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>?page=edit_user&username=<?php echo $username_from_url; ?>" method="post">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    name="username"
                                    value="<?php echo $row['username'] ?>" disabled/>
                                    <input type="hidden" name="username" value="<?php echo $row['username'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                value="<?php echo $row['password'] ?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ชื่อ-นามสกุล</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    name="fullname"
                                    value="<?php echo $row['fullname'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    name="phone"
                                    value="<?php echo $row['phone'] ?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    name="email" 
                                    value="<?php echo $row['email'] ?>" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>