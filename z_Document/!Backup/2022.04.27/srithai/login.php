<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); ?>
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- LOGIN & REGISTER ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
			<div class="wrap-pad">  

                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-11 col-md-11 col-12">
                        <div class="login-page">
                            <div class="row">
                                <!---------- LOGIN ---------->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="header-wCaption">
                                                <h5><i class="fas fa-lock"></i>เข้าสู่ระบบ</h5>
                                                <p>กรุณาใส่อีเมลและรหัสผ่านของคุณ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-form">
                                        <div class="row">
                                            <div class="col">
                                                <p>ชื่อผู้ใช้งาน</p>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>รหัสผ่าน</p>
                                            </div>
                                            <div class="col-6">
                                                <!-- Button trigger modal :: CHANGE PASSWORD -->
                                                <button type="button" data-toggle="modal" data-target="#changePass" class="button-pass">ลืมรหัสผ่าน ?</button>
                                            </div>
                                            <div class="col-12">
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <ul class="login-button-section">
                                                <li>
                                                    <!--<button class="buttonR">เข้าสู่ระบบ</button>-->
                                                    <a class="buttonR" href="member-profile.php">เข้าสู่ระบบ</a>
                                                </li>
                                                <li>OR</li>
                                                <li>
                                                    <button class="button-google"><img src="images/icon/icon-google.svg">เข้าสู่ระบบผ่าน GOOGLE</button>
                                                </li>
                                                <li>
                                                    <button class="button-facebook"><i class="fab fa-facebook-f"></i>เข้าสู่ระบบผ่าน FACEBOOK</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!---------- REGISTER ---------->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="grayBox">
                                        <div class="row">
                                            <div class="col">
                                                <div class="header-wCaption">
                                                    <h5><i class="fas fa-edit"></i>สมัครสมาชิก</h5>
                                                    <p>ลงทะเบียนเพื่อรับโปรโมชั่นพิเศษ</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-form">
                                            <div class="row">
                                                <div class="col">
                                                    <p>ชื่อ</p>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p>นามสกุล</p>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p>เบอร์โทรศัพท์</p>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p>อีเมล</p>
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p>รหัสผ่าน</p>
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p>ยืนยันรหัสผ่าน</p>
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="buttonBK">สมัครสมาชิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                  
                
            </div>
        </div>
    </div>

    <!-- MODAL :: EDIT PASSWORD -->
    <div class="modal fade form-modal" id="changePass" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="changeName" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="email-icon"><i class="fas fa-envelope"></i></div>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h5>รีเซ็ตรหัสผ่านของคุณ</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="txt-content text-center">
                                <p>กรุณากรอกอีเมลและเราจะส่งอีเมลถึงคุณเพื่อรีเซ็ตรหัสผ่านของคุณ</p>
                            </div>
                        </div>
                    </div>
                    <div class="input-form">
                        <div class="row">
                            <div class="col">
                                <input type="email" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="content-center">
                        <button type="button" class="buttonBK">ยืนยัน</button>
                        <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

</body>
</html>