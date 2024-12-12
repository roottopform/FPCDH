<?php
include("./connection/connection.php");

// รับค่าจากฟอร์ม
$id_usbcc = $_POST['id_usbcc'];
$pname = $_POST['pname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cid = $_POST['cid'];
$phone = $_POST['phone'];
$birth = $_POST['birth'];
$age = $_POST['age'];
$address = $_POST['address'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$pushblood = $_POST['pushblood'];

// อัปเดตข้อมูลในฐานข้อมูล
$sql = "UPDATE users SET 
        pname = :pname, 
        fname = :fname, 
        lname = :lname, 
        cid = :cid, 
        phone = :phone, 
        birth = :birth, 
        age = :age, 
        address = :address, 
        weight = :weight, 
        height = :height, 
        pushblood = :pushblood 
        WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':pname', $pname);
$stmt->bindParam(':fname', $fname);
$stmt->bindParam(':lname', $lname);
$stmt->bindParam(':cid', $cid);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':birth', $birth);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':weight', $weight);
$stmt->bindParam(':height', $height);
$stmt->bindParam(':pushblood', $pushblood);
$stmt->bindParam(':id', $id_usbcc);

if ($stmt->execute()) {
    echo "อัปเดตข้อมูลสำเร็จ";
} else {
    echo "เกิดข้อผิดพลาดในการอัปเดตข้อมูล";
}
?>