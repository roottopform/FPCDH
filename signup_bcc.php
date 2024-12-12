<?php
include("./connection/connection.php");
// ตรวจสอบข้อมูลที่ได้รับจากฟอร์ม
$id = $_POST['id_usbcc'] ?? '';
$pname = $_POST['pname_usbcc'] ?? '';
$fname = $_POST['fname_usbcc'] ?? '';
$lname = $_POST['lname_usbcc'] ?? '';
$cid = $_POST['cid_usbcc'] ?? '';
$phone = $_POST['phone_usbcc'] ?? '';
$birth = $_POST['birth_usbcc'] ?? '';
$age = $_POST['age_usbcc'] ?? '';
$address = $_POST['address_usbcc'] ?? '';
$weight = $_POST['weight_usbcc'] ?? '';
$height = $_POST['height_usbcc'] ?? '';
$pushblood = $_POST['pushblood_usbcc'] ?? '';

// ตรวจสอบค่าที่ได้รับ
var_dump($_POST);

// อัปเดตข้อมูลในฐานข้อมูล
try {
    $stmt = $conn->prepare("
        UPDATE register_usbcc 
        SET pname_usbcc = ?, fname_usbcc = ?, lname_usbcc = ?, cid_usbcc = ?, 
            phone_usbcc = ?, birth_usbcc = ?, age_usbcc = ?, address_usbcc = ?, 
            weight_usbcc = ?, height_usbcc = ?, pushblood_usbcc = ?
        WHERE id_usbcc = ?
    ");

    // ตรวจสอบว่าไวยากรณ์ SQL และค่าที่ส่งเข้าไปถูกต้อง
    $stmt->execute([$pname, $fname, $lname, $cid, $phone, $birth, $age, $address, $weight, $height, $pushblood, $id]);

    echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location.href = 'index.php';</script>";
} catch (PDOException $e) {
    // แสดงข้อความข้อผิดพลาดจากฐานข้อมูล
    echo "<script>alert('เกิดข้อผิดพลาด: " . $e->getMessage() . "'); window.history.back();</script>";
}
?>