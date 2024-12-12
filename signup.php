<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPD BCC : สมัครสมาชิก</title>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background: linear-gradient(to bottom, #e91e63, #FC89EB);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 120vh;
            margin: 0;
            padding: 0;
        }

        .form-box {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            max-width: 440px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            margin-bottom: 50px;
        }

        h3 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #37474f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 35%;
        }

        .btn-primary:hover {
            background-color: #F893B5;
        }

        .form-box .form-group:last-child {
            margin-bottom: 0;
            text-align: right;
        }

        /* Style for the header containing the back arrow */
        .header-container {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
        }

        .header-container a {
            display: inline-block;
            text-decoration: none;
        }

        .header-container img {
            width: 50px; /* ปรับขนาดของไอคอน */
            height: 50px; /* ปรับขนาดของไอคอน */
            transition: transform 0.3s ease; /* เพิ่มการเคลื่อนไหวเมื่อ hover */
        }

        .header-container img:hover {
            transform: scale(1.2); /* ทำให้ขนาดของไอคอนเพิ่มขึ้นเมื่อ hover */
        }
    </style>
    <link rel="shortcut icon" type="logo/x-icon" href="logo/title_logo.ico">
</head>
<body>
    <div class="header-container">
        <a href="index">
            <img src="logo/left_arrow.png" alt="กลับหน้าหลัก">
        </a>
    </div>

    <div class="form-box">
        <form action="signup_bcc.php" method="post">
            <h3 style="text-align: center;">สมัครสมาชิก</h3>
            <div class="form-group">
                <label for="pname" class="form-label">คำนำหน้าชื่อ</label>
                <input type="text" class="form-control" name="pname" required>
            </div>
            <div class="form-group">
                <label for="fname" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="form-group">
                <label for="lname" class="form-label">สกุล</label>
                <input type="text" class="form-control" name="lname" required>
            </div>
            <div class="form-group">
                <label for="cid" class="form-label">เลขบัตรประจำตัวประชาชน</label>
                <input type="text" class="form-control" name="cid" required>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label for="birth" class="form-label">วันเดือนปีเกิด</label>
                <input type="datetime" class="form-control" name="birth" required>
            </div>
            <div class="form-group">
                <label for="age" class="form-label">อายุ</label>
                <input type="number" class="form-control" name="age" required>
            </div>
            <div class="form-group">
                <label for="address" class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="form-group">
                <label for="weight" class="form-label">น้ำหนัก</label>
                <input type="number" class="form-control" name="weight" required>
            </div>
            <div class="form-group">
                <label for="height" class="form-label">ส่วนสูง</label>
                <input type="number" class="form-control" name="height" required>
            </div>
            <div class="form-group">
                <label for="pushblood" class="form-label">ความดันโลหิตสูง</label>
                <input type="text" class="form-control" name="pushblood" required>
            </div>
            <div style="text-align: center; margin-top: 10px;">
                <button type="submit" name="signin" class="btn btn-primary">สมัครสมาชิก</button>
            </div>
        </form>
    </div>
</body>
</html>
