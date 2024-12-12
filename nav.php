<nav class="navbar navbar-light p-1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="d-flex col-12 col-md-3 col-lg-2  mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
        <?php if ($_SESSION['ls'] == '02') { ?>
        <a class="navbar-brand" href="../admin/admin_page01">
            <img src="/fpcdh_DAMS/image/fpcdh_dams.png" width="240">
        </a>
        <?php } else { ?>
        <a class="navbar-brand" href="../user/user_page01">
            <img src="/fpcdh_DAMS/image/fpcdh_dams.png" width="240">
        </a>
        <?php } ?>
    </div>

    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <?php if (isset($_SESSION['fname_lname']) && $_SESSION['fname_lname'] != '') { ?>
        <b><?= $_SESSION['fname_lname']; ?></b>
        <?php if ($_SESSION['ls'] == '02') { ?>
        &nbsp<span class="badge bg-primary">ผู้ดูแลระบบ</span>&nbsp
        <?php } else { ?>
        &nbsp<span class="badge bg-info">เจ้าหน้าที่ทั่วไป</span>&nbsp
        <?php } ?>
        <a href="/fpcdh_DAMS/private/sub_logout">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
        <?php } else { 
                header('Location: /FPCDH_DAMS');
                exit();
                ?>
        <?php } ?>
    </div>
</nav>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb large-font">
        <?php 
        $current_page = basename($_SERVER['PHP_SELF']);
        if ($current_page == 'admin_page01.php' or $current_page == 'user_page01.php') { ?>
        <li class="breadcrumb-item active" aria-current="page">หน้าแรก</li>
        <?php }else{ ?>
        <li class="breadcrumb-item">
            <?php if ($_SESSION['ls'] == '02') { ?>
            <a href="../admin/admin_page01">หน้าแรก</a>
            <?php } else { ?>
            <a href="../user/user_page01">หน้าแรก</a>
            <?php } ?>
        </li>
        <?php } ?>
        <!-- ลิงก์ "หมวดหมู่" ที่เป็น dropdown -->
        <li class="breadcrumb-item dropdown">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                หมวดหมู่
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="med_equipment">เครื่องมือทางการแพทย์</a></li>
                <li><a class="dropdown-item" href="#">เครื่องมือครุภัณฑ์</a></li>
            </ul>
        </li>

        <?php 
        $current_page = basename($_SERVER['PHP_SELF']);
        if ($current_page == 'user_page01.php') { ?> 
        <?php }else{ ?>
        <li class="breadcrumb-item">
            <?php if ($_SESSION['ls'] == '02') { ?>
            <a href="../admin/manager_sys_users">จัดการผู้ใช้งาน</a>
            <?php } else { ?> 
            <?php } ?>
        </li>
        <?php } ?>
        </li>

    </ol>
</nav>