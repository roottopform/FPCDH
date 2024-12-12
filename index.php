<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("./connection/connection.php");;

if (isset($_SESSION['ar_lo'])) {
    $ar_lo = $_SESSION['ar_lo'];
} else { 
    $ar_lo = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>OPD BCC : แบบคัดกรองปัจจัยเสี่ยงต่อการเกิดโรคมะเร็งเต้านม</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap5/css/bootstrap.min.css">
    <script src="vendor/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendor/sweetalert2/sweetalert2.min.css">
    <script src="vendor/sweetalert2/sweetalert2.min.js"></script>
    <script src="vendor/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="vendor/css/index.css">
    <link rel="stylesheet" href="vendor/Datatables/datatables.min.css">
    <script src="vendor/Datatables/datatables.min.js"></script>

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background: linear-gradient(to bottom, #e91e63, #FC89EB);
        }

        .custom-pink {
            background-color: #37474f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }

        .custom-pink:hover {    
            background-color: #FF8094;
            color: white;
            transform: translateY(-3px);
            transition: transform 0.2s ease, background-color 0.2s ease;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
    <link rel="shortcut icon" type="logo/x-icon" href="logo/title_logo.ico">
</head>

<body>
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong hover-effect" style="border-radius: 1rem; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);">
                        <div class="card-body p-5 text-center">
                            <img src="logo/woman.gif" style="width: 30%;" alt="logo">
                            <img src="logo/BCC.png" style="width: 50%;" alt="logo">
                            <br><br>

                            <?php if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php } ?>

                            <form action="sub_login.php" method="POST">
    <!-- ช่องกรอก username (รหัสประจำตัวประชาชน) -->
    <div class="form-group">
        <label for="username">รหัสประจำตัวประชาชน</label>
        <input type="text" id="username" name="cid_usbcc" class="form-control" placeholder="รหัสประจำตัวประชาชน " required>
    </div>
    <br>

    <!-- ช่องกรอก password (วัน/เดือน/ปีเกิด) -->
    <div class="form-group">
        <label for="password">วัน/เดือน/ปีเกิด</label>
        <!-- กำหนดฟอร์แมตให้เป็นวันที่ dd/mm/yyyy -->
        <input type="text" id="password" name="birth_usbcc" class="form-control" placeholder="วัน/เดือน/ปี " required>
    </div>
    <br>

    <input type="submit" value="Login" class="btn custom-pink btn-lg">
    <a href="signup.php" class="btn btn-lg custom-pink">สมัครสมาชิก</a>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (isset($_SESSION["ar_lo"]) && $_SESSION["ar_lo"] == 01) {
        $_SESSION['success'] = "ออกจากระบบสำเร็จ!";
        echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'ออกจากระบบสำเร็จ!',
                    showConfirmButton: false,
                    timer: 1500
                });
            })
        </script>";
    } ?>
    
    <?php unset($_SESSION['ar_lo']); ?>

    <script src="vendor/js/index.js"></script>
</body>

</html>
