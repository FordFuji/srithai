<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $memberName="profile"; ?>
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- MEMBER ---------->
    <div class="content-padding foot-pad minH">
        <div class="container-fluid">
			<div class="wrap-pad">

                <div class="member-section">
                    <div class="row">
                        <?php require('inc_membermenu.php'); ?>

                        <!---------- MEMBER :: PERSONAL PROFILE ---------->
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="row">
                                <div class="col">
                                    <h4>บัญชีของฉัน</h4>
                                </div>
                            </div>
                            <div class="infoBox">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <h6>ข้อมูลสมาชิก</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE PROFILE INFO -->
                                                <button type="button" data-toggle="modal" data-target="#changeProfile"><i class="fas fa-pen"></i>แก้ไข</button>
                                            </li>
                                        </ul>

                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changeProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="changeName" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>แก้ไขข้อมูลสมาชิก</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ชื่อ</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>นามสกุล</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>เบอร์โทรศัพท์</p>
                                                                    <input type="tel" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>อีเมล</p>
                                                                    <input type="email" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="buttonBK">ยืนยัน</button>
                                                        <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="infoBox-detail">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">ชื่อ</div>
                                        <div class="col-lg-9 col-md-7 col-12">ช็อปสินค้า</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">นามสกุล</div>
                                        <div class="col-lg-9 col-md-7 col-12">ศรีไทย</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">เบอร์โทรศัพท์</div>
                                        <div class="col-lg-9 col-md-7 col-12">081-234-5678</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">อีเมล</div>
                                        <div class="col-lg-9 col-md-7 col-12">email@email.com</div>
                                    </div>
                                </div>
                            </div>

                            <div class="infoBox">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <h6>การเข้าสู่ระบบ</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE LOGIN INFO -->
                                                <button type="button" data-toggle="modal" data-target="#changeLogin"><i class="fas fa-pen"></i>แก้ไข</button>
                                            </li>
                                        </ul>

                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changeLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="changeName" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>แก้ไขข้อมูลการเข้าสู่ระบบ</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ชื่อผู้ใช้งาน</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>รหัสผ่าน</p>
                                                                    <input type="password" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ยืนยันรหัสผ่าน</p>
                                                                    <input type="password" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="buttonBK">ยืนยัน</button>
                                                        <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="infoBox-detail">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">ชื่อผู้ใช้งาน</div>
                                        <div class="col-lg-9 col-md-7 col-12">email@email.com</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">รหัสผ่าน</div>
                                        <div class="col-lg-9 col-md-7 col-12">********</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

</body>
</html>