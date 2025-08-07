<?php
require '../connect.php';
$sql = "SELECT * FROM products";
$result = $con->query($sql);

// ใช้ GET ก่อน ถ้าไม่มีใช้ POST แทน
$pro_id = $_GET['pro_id'] ?? $_POST['pro_id'] ?? '';

// ถ้ามี pro_id → ดึงข้อมูลจาก DB
if (!empty($pro_id)) {
  $sql = "SELECT * FROM products WHERE pro_id = '$pro_id'";
  $result = $con->query($sql);
  $row = mysqli_fetch_array($result);
}

?>

<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Product List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="index.php?page=add_pro" class="btn btn-success mb-3">
                            <i class="bi bi-person-add"></i>Add Product
                        </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>pro_id</th>
                                    <th>pro_name</th>
                                    <th>pro_price</th>
                                    <th>pro_amount</th>
                                    <th>pro_status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr class="align-middle">
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['pro_id'] ?></td>
                                        <td><?php echo $row['pro_name'] ?></td>
                                        <td><?php echo $row['pro_price'] ?></td>
                                        <td><?php echo $row['pro_amount'] ?></td>
                                        <td><?php echo $row['pro_status'] ?></td>
                                        <td>
                                            <!-- Edit and Delete buttons -->
                                            <a href="index.php?page=edit_pro&pro_id=<?php echo $row['pro_id']?>" class="btn btn-warning ">
                                                <i class="bi bi-pencil"> </i>Edit</a>
                                            <a href="index.php?page=del_pro&pro_id=<?php echo $row['pro_id']?>" class="btn btn-danger bi bi-trash3-fill"
                                            onclick="return confirm('Confirm Delete?')">delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-end">
                            <li class="page-item">
                                <a class="page-link" href="#">&laquo;</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->