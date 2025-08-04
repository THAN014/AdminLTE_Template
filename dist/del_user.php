<?php
    $username = $_GET['username'];
    require '../connect.php';

    $sql = "DELETE FROM users WHERE username = '$username'";
    $result = $con->query($sql);
    
    // โค้ดที่แก้ไขเพื่อแสดงข้อผิดพลาดจากฐานข้อมูล
    if (!$result) {
        // หากคำสั่ง DELETE ล้มเหลว จะแสดงข้อผิดพลาดจากฐานข้อมูลโดยตรง
        echo "<script>alert('Remove Error: " . mysqli_error($con) . "')</script>;"; 
        echo "<script>window.location.href = 'index.php?page=users'</script>;";
    } else if (mysqli_affected_rows($con) > 0) {
        // หากลบสำเร็จ
        echo "<script>alert('ลบข้อมูลสำเร็จ!')</script>;";
        echo "<script>window.location.href = 'index.php?page=users'</script>;";
    } else {
        // หากไม่พบผู้ใช้
        echo "<script>alert('ไม่พบผู้ใช้ที่ต้องการลบ!')</script>;";
        echo "<script>window.location.href = 'index.php?page=users'</script>;";
    }
?>