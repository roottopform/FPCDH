<?php
// เริ่มต้น session
session_start();

// ลบข้อมูล session ทั้งหมด
session_unset();
session_destroy();

// เปลี่ยนเส้นทาง (redirect) ไปที่หน้า index.php
header('Location: index.php');
exit();
?>