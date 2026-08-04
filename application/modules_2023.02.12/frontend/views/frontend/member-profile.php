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
                                    <h4><?php echo get2Lang($this->session->userdata('lang'), 'บัญชีของฉัน', 'My Account');?></h4>
                                </div>
                            </div>
                            <div class="infoBox">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <h6><?php echo get2Lang($this->session->userdata('lang'), 'ข้อมูลสมาชิก', 'Data Member');?></h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE PROFILE INFO -->
                                                <button type="button" data-toggle="modal" data-target="#changeProfile"><i class="fas fa-pen"></i><?php echo get2Lang($this->session->userdata('lang'), 'แก้ไข', 'Edit');?></button>
                                            </li>
                                        </ul>

                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changeProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="changeName" aria-hidden="true">
                                        <form method="post" action="<?php echo site_url('frontend/path/ajaxSaveProfile');?>" enctype="multipart/form-data" id="myform">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6><?php echo get2Lang($this->session->userdata('lang'), 'แก้ไขข้อมูลสมาชิก', 'Member Edit');?></h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'รูปภาพ', 'Image');?></p>
                                                                    <input type="file" name="member_image" id="member_image" class="form-control shadow-none" <?php if(empty($row)) echo 'required';?>> Recommend 36 x 36 px
<?php
if(!empty($row) and $row->member_image != '') {
?>
                                                                    <br><img src="<?php echo base_url('uploads/member/'.$row->member_image);?>" width="36"><br>
<?php
}
?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'ชื่อ', 'Name');?></p>
                                                                    <input type="text" name="member_name" id="member_name" class="form-control shadow-none" value="<?php if(!empty($row)) echo $row->member_name;?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'นามสกุล', 'Surname');?></p>
                                                                    <input type="text" class="form-control shadow-none" name="member_surname" id="member_surname" value="<?php if(!empty($row)) echo $row->member_surname;?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'เบอร์โทรศัพท์', 'Telephone Number');?></p>
                                                                    <input type="tel" class="form-control shadow-none" name="member_tel" id="member_tel" value="<?php if(!empty($row)) echo $row->member_tel;?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'อีเมล', 'Email');?></p>
                                                                    <input type="email" class="form-control shadow-none" name="member_email" id="member_email" value="<?php if(!empty($row)) echo $row->member_email;?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="buttonBK"><?php echo get2Lang($this->session->userdata('lang'), 'ยืนยัน', 'Confirm');?></button>
                                                        <button type="button" class="buttonBD" data-dismiss="modal"><?php echo get2Lang($this->session->userdata('lang'), 'ยกเลิก', 'Cancel');?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="infoBox-detail">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12"><?php echo get2Lang($this->session->userdata('lang'), 'ชื่อ', 'Name');?></div>
                                        <div class="col-lg-9 col-md-7 col-12"><?php if(!empty($row)) echo $row->member_name;?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12"><?php echo get2Lang($this->session->userdata('lang'), 'นามสกุล', 'Surname');?></div>
                                        <div class="col-lg-9 col-md-7 col-12"><?php if(!empty($row)) echo $row->member_surname;?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12"><?php echo get2Lang($this->session->userdata('lang'), 'เบอร์โทรศัพท์', 'Telephone Number');?></div>
                                        <div class="col-lg-9 col-md-7 col-12"><?php if(!empty($row)) echo $row->member_tel;?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12"><?php echo get2Lang($this->session->userdata('lang'), 'อีเมล', 'Email');?></div>
                                        <div class="col-lg-9 col-md-7 col-12"><?php if(!empty($row)) echo $row->member_email;?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="infoBox">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <h6><?php echo get2Lang($this->session->userdata('lang'), 'การเข้าสู่ระบบ', 'Login');?></h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE LOGIN INFO -->
                                                <button type="button" data-toggle="modal" data-target="#changeLogin"><i class="fas fa-pen"></i><?php echo get2Lang($this->session->userdata('lang'), 'แก้ไข', 'Edit');?></button>
                                            </li>
                                        </ul>

                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changeLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="changeName" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6><?php echo get2Lang($this->session->userdata('lang'), 'แก้ไขข้อมูลการเข้าสู่ระบบ', 'Edit login Information');?></h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'ชื่อผู้ใช้งาน', 'Username');?></p>
                                                                    <input type="text" class="form-control shadow-none" name="member_username" id="member_username" class="form-control shadow-none" value="<?php if(!empty($row)) echo $row->member_username;?>" onblur="checkUser(this.value);">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'รหัสผ่าน', 'Password');?></p>
                                                                    <input type="password" class="form-control shadow-none" name="member_password" id="member_password" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'ยืนยันรหัสผ่าน', 'Confirm Password');?></p>
                                                                    <input type="password" class="form-control shadow-none" name="member_confirm_password" id="member_confirm_password" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="buttonBK" onclick="saveUser();"><?php echo get2Lang($this->session->userdata('lang'), 'ยืนยัน', 'Confirm');?></button>
                                                        <button type="button" class="buttonBD" data-dismiss="modal"><?php echo get2Lang($this->session->userdata('lang'), 'ยกเลิก', 'Cancel');?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="infoBox-detail">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12"><?php echo get2Lang($this->session->userdata('lang'), 'ชื่อผู้ใช้งาน', 'Username');?></div>
                                        <div class="col-lg-9 col-md-7 col-12"><?php if(!empty($row)) echo $row->member_username;?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12"><?php echo get2Lang($this->session->userdata('lang'), 'รหัสผ่าน', 'Password');?></div>
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

    <script>
        /*function saveProfile() {
            if($("#member_name").val() == '') {
                alert('Please Enter Name');

                $("#member_name").focus();
            } else if($("#member_surname").val() == '') {
                alert('Please Enter Surname');

                $("#member_surname").focus();
            } else if($("#member_tel").val() == '') {
                alert('Please Enter Tel');

                $("#member_tel").focus();
            } else if($("#member_email").val() == '') {
                alert('Please Enter Email');

                $("#member_email").focus();
            } else if(!isEmail($("#member_email").val())) {
                alert('Incorrect Email');

                $("#member_email").val('');
                $("#member_email").focus();
            } else{
                $.post('<?php echo site_url("frontend/path/ajaxSaveProfile");?>', { member_name: $("#member_name").val(), member_surname: $("#member_surname").val(), member_tel: $("#member_tel").val(), member_email: $("#member_email").val(), }, function(data) {
                    window.location.href = '<?php echo site_url("member_profile");?>';
                });
            }
        }*/

        function checkUser(member_username) {
            $.post('<?php echo site_url("frontend/path/ajaxCheckUserProfile");?>', { member_username: member_username }, function(data) {
                if(data == 'true') {
                    alert('<?php echo get2Lang($this->session->userdata('lang'), 'อีเมล์นี้มีผู้ใช้แล้ว', 'Email is Already');?>');

                    $("#member_username").val('');
                    $("#member_username").focus();
                }
            });
        } 

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function saveUser() {
            if($("#member_username").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกชื่อผู้ใช้งาน', 'Please enter Username');?>');

                $("#member_username").focus();
            } else if($("#member_password").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกรหัสผ่าน', 'Please enter Password');?>');

                $("#member_password").focus();
            } else if($("#member_confirm_password").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกยืนยันรหัสผ่าน', 'Please enter Confirm Password');?>');

                $("#member_confirm_password").focus();
            } else if($("#member_password").val() != $("#member_confirm_password").val()) {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'ยืนยันรหัสผ่านไม่ถูกต้อง', 'Incorrect Confirm Password');?>');

                $("#member_password").val('');
                $("#member_confirm_password").val('');
                $("#member_password").focus();
            } else {
                $.post('<?php echo site_url("frontend/path/ajaxSaveUser");?>', { member_username: $("#member_username").val(), member_password: $("#member_password").val() }, function(data) {
                    window.location.href = '<?php echo site_url("member_profile");?>';
                });
            }
        }
    </script> 
</body>
</html>