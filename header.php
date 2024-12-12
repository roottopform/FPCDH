<?php
session_start();
if (!isset($_SESSION['ls'])) {
  header('location: ../index');
}
include('dbconfig.php');
?>
<!-- head  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบบริหารจัดการเครื่องมือ โรงพยาบาลค่ายพิชัยดาบหัก</title>
    <!-- อ้างอิงไฟล์ CSS ของ Bootstrap -->
    <link rel="stylesheet" href="../vendor/bootstrap5/css/bootstrap.min.css">
    <!-- อ้างอิงไฟล์ JS ของ Bootstrap -->
    <script src="../vendor/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <!-- อ้างอิงไฟล์ CSS ของ FontAwesome -->
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.min.css">
    <!-- อ้างอิงไฟล์ CSS ของ SweetAlert2 -->
    <link rel="stylesheet" href="../vendor/sweetalert2/sweetalert2.min.css">
    <!-- อ้างอิงไฟล์ JS ของ SweetAlert2 -->
    <script src="../vendor/sweetalert2/sweetalert2.min.js"></script>
    <!-- อ้างอิงไฟล์ jQuery ที่ดาวน์โหลดมา -->
    <script src="../vendor/js/jquery-3.7.1.min.js"></script>
    <!-- icon title -->
    <link rel="shortcut icon" type="image/x-icon" href="../image/title_logo.ico">
    <link rel="stylesheet" href="../vendor/css/admin_addon.css">
    <!-- nav -->
    <?php include('nav.php');
  
  if (isset($_SESSION['ar_lg']) && $_SESSION['ar_lg'] == 01) { 
    echo "<script>
   Swal.fire({
        icon: 'success',
        title: 'ลงชื่อเข้าใช้งานสำเร็จ!',
        showConfirmButton: false,
        timer: 1500
    });
</script>";
  } ?>
    <?php unset($_SESSION['ar_lg']); ?>
</head>