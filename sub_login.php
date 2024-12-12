<?php
include "./connection/connection.php";

try {
    // ตรวจสอบว่าเป็น POST request หรือไม่
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['cid_usbcc']) && isset($_POST['birth_usbcc'])) {
            $cid_usbcc = trim($_POST['cid_usbcc']);
            $birth_usbcc = trim($_POST['birth_usbcc']);

            if (empty($cid_usbcc) || empty($birth_usbcc)) {
                echo "กรุณากรอกข้อมูลให้ครบถ้วน!";
            } else {
                $sql = "SELECT * FROM register_usbcc WHERE cid_usbcc = :cid_usbcc AND birth_usbcc = :birth_usbcc";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':cid_usbcc', $cid_usbcc, PDO::PARAM_STR);
                $stmt->bindParam(':birth_usbcc', $birth_usbcc, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    header("location: admin.php");
                    exit();
                } else {
                    echo "<script>alert('รหัสประจำตัวหรือวันเกิดไม่ถูกต้อง!');</script>";
                }
            }
        } else {
            echo "ไม่มีข้อมูลถูกส่งมาจากฟอร์ม!";
        }
    }
} catch (PDOException $e) {
    echo "ข้อผิดพลาด: " . $e->getMessage();
}
?>