<?php
include("./connection/connection.php"); // หรือเปลี่ยนเป็นชื่อไฟล์ที่มีโค้ดเชื่อมต่อฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - รายชื่อผู้ใช้งาน</title>
    <!-- CSS และ JS Framework -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600&display=swap">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background: linear-gradient(to bottom, #e91e63, #fc89eb);
            color: #333;
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .main-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;  /* Makes it responsive */
            max-width: 1500px;  /* Limits the width on large screens */
            margin: 100px;  /* Centers it horizontally */
            box-sizing: border-box;  /* Ensures padding is included in width calculation */
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header-container h1 {
            font-size: 2.5rem;
            color: #e91e63;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            margin: 0px;
        }

        .header-container img {
            width: 50px;
            transition: transform 0.3s, filter 0.3s;
        }

        .header-container img:hover {
            transform: scale(1.1);
            filter: brightness(1.2);
        }

        .table-container {
            margin-top: 25px;
        }

        table.dataTable {
            border-collapse: collapse;
            width: 100%;
            background: #fdfdfd;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);  /* Adds a subtle shadow to the table */
        }

        .btn-edit {
            background-color: #ffc107;
            border: none;
            color: #fff;
            border-radius: 5px;
            padding: 5px 10px;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            cursor: pointer;  /* Adds a pointer cursor for better UX */
        }

        .btn-edit img {
            width: 20px;
            margin-right: 5px;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #e91e63;
            color: #fff;
        }

        .form-label {
            font-weight: 500;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 25px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 50px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 17px;
            width: 17px;
            border-radius: 50px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
        }

        input:checked + .slider {
            background-color: #4caf50;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        /* Media Query for smaller screens */
        @media (max-width: 768px) {
            .main-container {
                padding: 20px;  /* Less padding on smaller screens */
                width: 95%;  /* More width usage for small devices */
            }

            .header-container h1 {
                font-size: 2rem;  /* Smaller header on mobile */
            }

            table.dataTable {
                font-size: 0.9rem;  /* Smaller table text for better readability */
            }
            }
    </style>
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                responsive: true,
                language: {
                    search: "ค้นหา:",
                    lengthMenu: "แสดง _MENU_ รายการ",
                    paginate: {
                        next: "ถัดไป",
                        previous: "ก่อนหน้า"
                    }
                }
            });
        });
    </script>
    <link rel="shortcut icon" type="logo/x-icon" href="logo/title_logo.ico">
</head>

<body>
    <div class="container main-container">
        <!-- Header Section -->
        <div class="header-container">
            <a href="index">
                <img src="logo/left_arrow.png" alt="กลับหน้าหลัก">
            </a>
            <h1>รายชื่อผู้ใช้งาน</h1>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <table id="userTable" class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>บัตรประชาชน</th>
                        <th>เบอร์โทร</th>
                        <th>วันเดือนปีเกิด</th>
                        <th>ที่อยู่</th>
                        <th>สถานะ</th>
                        <th>แก้ไขข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $conn->prepare("SELECT id_usbcc, pname_usbcc, fname_usbcc, lname_usbcc, cid_usbcc, phone_usbcc, birth_usbcc, age_usbcc, address_usbcc, weight_usbcc, height_usbcc, pushblood_usbcc, id_lc_usbcc FROM register_usbcc");
                    $stmt->execute();
                    $users = $stmt->fetchAll();

                    $output = '';  // Initialize an empty string to hold the HTML output

                    foreach ($users as $index => $user) {
                        $output .= "<tr>";
                        $output .= "<td>" . ($index + 1) . "</td>";
                        $output .= "<td>{$user['pname_usbcc']}{$user['fname_usbcc']} {$user['lname_usbcc']}</td>";
                        $output .= "<td>{$user['cid_usbcc']}</td>";
                        $output .= "<td>{$user['phone_usbcc']}</td>";
                        $output .= "<td>{$user['birth_usbcc']}</td>";
                        $output .= "<td>{$user['address_usbcc']}</td>";
                        $output .= "<td><center>";
                        $output .= "<label class='switch'>";
                        $output .= "<input type='checkbox' " . ($user['id_lc_usbcc'] == '1' ? 'checked' : '') . " disabled>";
                        $output .= "<span class='slider'></span>";
                        $output .= "</label>";
                        $output .= "</center></td>";
                        $output .= "<td><button class='btn btn-edit' data-bs-toggle='modal' data-bs-target='#editModal{$user['id_usbcc']}'><img src='logo/programmer.gif' alt='icon'> แก้ไข</button></td>";
                        $output .= "</tr>";
                    }

                    echo $output;  // Output the entire HTML at once
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Modals -->
        <?php foreach ($users as $user): ?>
            <div class="modal fade" id="editModal<?= $user['id_usbcc'] ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="sub_login.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">แก้ไขข้อมูลผู้ใช้งาน</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_usbcc" value="<?= $user['id_usbcc'] ?>">
                                <div class="mb-3">
                                    <label class="form-label">คำนำหน้าชื่อ</label>
                                    <input type="text" class="form-control" name="pname" value="<?= $user['pname_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" name="fname" value="<?= $user['fname_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" name="lname" value="<?= $user['lname_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">เลขบัตรประชาชน</label>
                                    <input type="text" class="form-control" name="cid" value="<?= $user['cid_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">เบอร์โทร</label>
                                    <input type="text" class="form-control" name="phone" value="<?= $user['phone_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>วันเดือนปีเกิด</label>
                                    <input type="text" class="form-control" name="birth" value="<?= $user['birth_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>อายุ</label>
                                    <input type="text" class="form-control" name="age" value="<?= $user['age_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>ที่อยู่</label>
                                <input type="text" class="form-control" name="address" value="<?= $user['address_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>น้ำหนัก</label>
                                    <input type="text" class="form-control" name="weight" value="<?= $user['weight_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>ส่วนสูง</label>
                                    <input type="text" class="form-control" name="height" value="<?= $user['height_usbcc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>ความดันโลหิต</label>
                                    <input type="text" class="form-control" name="pushblood" value="<?= $user['pushblood_usbcc']; ?>">
                                </div>
                    </div>
                    <div class="modal-footer">
                    <form>
                        <button type="submit" class="btn btn-save">บันทึกข้อมูล</button> 
                    </form>
                    <style>
                        .btn-save, .btn-close {
                        background-color: #d81b60; /* Dark pink as the base color */
                        color: #fff; /* White text */
                        border: none; /* Remove border */
                        border-radius: 5px; /* Rounded corners */
                        padding: 8px 16px; /* Padding around the text */
                        font-size: 1rem; /* Font size */
                        cursor: pointer; /* Pointer cursor on hover */
                        transition: background-color 0.3s ease; /* Smooth transition for background color */
                    }

                    /* Hover effect for Save and Close buttons */
                    .btn-save:hover, .btn-close:hover {
                        background-color: #f06292; /* Lighter pink when hovering */
                    }

                    /* Optional: Focus state to ensure accessibility */
                    .btn-save:focus, .btn-close:focus {
                        outline: none; /* Remove default focus outline */
                        box-shadow: 0 0 5px rgba(255, 82, 82, 0.6); /* Add a soft red shadow for better focus visibility */
                    }
            </style>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
</body>
<?php include('include/footer.php') ?>
<style>
footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #333; /* Dark background color */
    color: #fff; /* White text */
    padding: 1px 5px; /* Some padding around the content */
    text-align: left; /* Aligns text to the left */
    font-size: 0.9rem; /* Adjust font size */
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow on top of the footer */
    z-index: 500px; /* Ensure it stays above other content */
}

footer a {
    color: #fff; /* Makes sure any links in the footer are white */
    text-decoration: none; /* Removes underline */
    margin-left: 10px;
}

footer a:hover {
    text-decoration: underline; /* Underlines links when hovered */
}

/* Optional: Add some responsiveness */
@media (max-width: 500px) {
    footer {
        font-size: 0.8rem; /* Smaller font on smaller screens */
        padding: 10px 15px; /* Less padding on smaller screens */
    }
}
</style>
</script>


</html>
