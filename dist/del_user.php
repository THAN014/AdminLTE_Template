<?php
$username = $_GET['username'];
require '../connect.php';
$sql = "DELETE FROM users WHERE username='$username'";
$result = $con->query($sql);
if ($result) {
    echo "<script>alert('Products successfully deleted'); window.location.href='index.php?page=users';</script>";
} else {
    echo "<script>alert('Delete failed'); window.location.href='index.php?page=users';</script>";
}
?>