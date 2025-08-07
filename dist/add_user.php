<?php 
    require '../connect.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        //chect if it empty
        if (empty($username) || empty($password) || empty($fullname) || empty($phone) || empty($email)) {
            echo 
            "<script>
            alert ('Please Fill All fields');
            history.back();
            </script>";
        } else {
            //check if username already exists
            $old_data = $con->query("SELECT * FROM users");
            $old_num = mysqli_num_rows($old_data);
            if ($old_num == 1) {
                echo "
                <script>
                alert ('Username already exist')
                </script>;";
            }

            else {
                echo
                "<script>window.location.href = 'index.php?page=users'</script>";
            }
        }
        //add data
        $sql = "INSERT INTO users VALUES('$username', '$password', '$fullname', '$phone', '$email')";
        $result = $con->query($sql);
        if (!$result) {
            echo "<script>
            alert ('Saving Error);
            history.back();
            </script>";
        }
            else 
            $sql = "INSERT INTO users VALUES('$username', '$password', '$fullname', '$phone', '$email')";
            $result = $con->query($sql);{
                echo "<script>
                window.location.href = 'index.php?page=users'
                </script>";
            }
            if (!$result) {
                echo "<script>
                alert ('Saving Error');
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
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Add User Form</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">General Form</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-8">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Add New User</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    name="username" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ชื่อ-นามสกุล</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    name="fullname" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    name="phone" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    name="email" />
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Quick Example-->
                <!--begin::Input Group-->
                <!--end::Horizontal Form-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>