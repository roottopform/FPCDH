<div class="modal fade" id="editModal<?= $us['id_usbcc']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>แก้ไขข้อมูลผู้ใช้งาน</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form name="form1" method="post" action="sub_edituser.php">
                            <form action="signup_bcc.php" method="post">
            <div class="form-group">
                <label for="pname" class="form-label">คำนำหน้าชื่อ</label>
                <input type="text" class="form-control" name="pname" value="<?= $us['pname_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="fname" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" name="fname" value="<?= $us['fname_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="lname" class="form-label">สกุล</label>
                <input type="text" class="form-control" name="lname" value="<?= $us['lname_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="cid" class="form-label">เลขบัตรประจำตัวประชาชน</label>
                <input type="text" class="form-control" name="cid" value="<?= $us['cid_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" name="phone" value="<?= $us['phone_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="birth" class="form-label">วันเดือนปีเกิด</label>
                <input type="datetime" class="form-control" name="birth" value="<?= $us['birth_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="age" class="form-label">อายุ</label>
                <input type="number" class="form-control" name="age" value="<?= $us['age_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="address" class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" name="address" value="<?= $us['address_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="weight" class="form-label">น้ำหนัก</label>
                <input type="number" class="form-control" name="weight" value="<?= $us['weight_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="height" class="form-label">ส่วนสูง</label>
                <input type="number" class="form-control" name="height" value="<?= $us['height_usbcc'];?>">
            </div>
            <div class="form-group">
                <label for="pushblood" class="form-label">ความดันโลหิตสูง</label>
                <input type="text" class="form-control" name="pushblood" value="<?= $us['pushblood_usbcc'];?>">
            </div>
        </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล" />
                        </div>
                        </form>
                    </div>
                </div>
            </div>