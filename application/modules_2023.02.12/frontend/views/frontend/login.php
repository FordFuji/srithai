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
                                                <h5><i class="fas fa-lock"></i><?php echo get2Lang($this->session->userdata('lang'), 'เข้าสู่ระบบด้วยบัญชีศรีไทยออนไลน์', 'Login');?></h5>
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'กรุณาใส่อีเมลและรหัสผ่านของคุณ', 'Please enter your Email and Password');?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-form">
                                        <div class="row">
                                            <div class="col">
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'อีเมล์', 'Email');?></p>
                                                <input type="text" name="member_username_" id="member_username_" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'รหัสผ่าน', 'Password');?></p>
                                            </div>
                                            <div class="col-6">
                                                <!-- Button trigger modal :: CHANGE PASSWORD -->
                                                <button type="button" data-toggle="modal" data-target="#changePass" class="button-pass"><?php echo get2Lang($this->session->userdata('lang'), 'ลืมรหัสผ่าน', 'Forget Password');?> ?</button>
                                            </div>
                                            <div class="col-12">
                                                <input type="password" name="member_password_" id="member_password_" class="form-control">
                                            </div>
                                            <div class="col-12 divLoginFail" align="center" style="color: red;">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <ul class="login-button-section">
                                                <li>
                                                    <!--<button class="buttonR">เข้าสู่ระบบ</button>-->
                                                    <a class="buttonR" href="javascript:login();"<?php //echo site_url('member_profile');?>">เข้าสู่ระบบ</a>
                                                </li>
                                                <li>OR</li>
<?php
// Google Project API Credentials
$clientId = '322558949464-o9h2qi31ko4unvavi7qf9t7fb4t9021b.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUrl = site_url('frontend/path/ajaxGoogle');

//Include Google Client Library for PHP autoload file
require_once FCPATH.'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId($clientId);

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret($clientSecret);

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri($redirectUrl);

//
$google_client->addScope('email');
$google_client->addScope('profile');
?>
                                                <li>
                                                    <button class="button-google" onclick="window.location.href='<?php echo $google_client->createAuthUrl();?>';"><img src="<?php echo base_url('asset/frontend/images/icon/icon-google.svg');?>"><?php echo get2Lang($this->session->userdata('lang'), 'เข้าสู่ระบบผ่าน GOOGLE', 'Login Google');?></button>
                                                </li>
                                                <li>
                                                    <button class="button-facebook" onclick="fbLogin();"><i class="fab fa-facebook-f"></i><?php echo get2Lang($this->session->userdata('lang'), 'เข้าสู่ระบบผ่าน FACEBOOK', 'Login Facebook');?></button>
                                                </li>
                                                <li>
                                                <?php echo get2Lang($this->session->userdata('lang'), 'ยังไม่เคยลงทะเบียน', 'Not yet Register');?> ? <a href="javascript:showRegister();"><?php echo get2Lang($this->session->userdata('lang'), 'ลงทะเบียน', 'Register');?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!---------- REGISTER ---------->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="grayBox" id="show_register" style="display: none;">
                                        <div class="row">
                                            <div class="col">
                                                <div class="header-wCaption">
                                                    <h5><i class="fas fa-edit"></i><?php echo get2Lang($this->session->userdata('lang'), 'สมัครสมาชิก', 'Subscribe');?></h5>
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'ลงทะเบียนเพื่อรับโปรโมชั่นพิเศษ', 'Sign up for special promotions');?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-form">
                                            <div class="row">
                                                <div class="col">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'ชื่อ', 'Name');?></p>
                                                    <input type="text" class="form-control" name="member_name" id="member_name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'นามสกุล', 'Surname');?></p>
                                                    <input type="text" class="form-control" name="member_surname" id="member_surname">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'เบอร์โทรศัพท์', 'Telephone Number');?></p>
                                                    <input type="text" class="form-control" name="member_tel" id="member_tel">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'อีเมล (ชื่อผู้ใช้งาน)', 'Email (User)');?></p>
                                                    <input type="email" class="form-control" name="member_email" id="member_email" onblur="checkEmail(this.value);">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'รหัสผ่าน', 'Password');?></p>
                                                    <input type="password" class="form-control" name="member_password" id="member_password">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), 'ยืนยันรหัสผ่าน', 'Confirm Password');?></p>
                                                    <input type="password" class="form-control" name="member_confirm_password" id="member_confirm_password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="buttonBK" onclick="register();"><?php echo get2Lang($this->session->userdata('lang'), 'สมัครสมาชิก', 'Register');?></button>
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
                            <h5><?php echo get2Lang($this->session->userdata('lang'), 'รีเซ็ตรหัสผ่านของคุณ', 'Reset your Password');?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="txt-content text-center">
                                <p><?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกอีเมลและเราจะส่งอีเมลถึงคุณเพื่อรีเซ็ตรหัสผ่านของคุณ', 'Please enter your email and we will send you an email to reset your password.');?></p>
                            </div>
                        </div>
                    </div>
                    <div class="input-form">
                        <div class="row">
                            <div class="col">
                                <input type="email" id="member_email_forget_password" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="content-center">
                        <button type="button" class="buttonBK" onclick="forgetPassword();"><?php echo get2Lang($this->session->userdata('lang'), 'ยืนยัน', 'Confirm');?></button>
                        <button type="button" class="buttonBD" data-dismiss="modal"><?php echo get2Lang($this->session->userdata('lang'), 'ยกเลิก', 'Cancel');?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>
    <script>
        function checkEmail(member_email) {
            $.post('<?php echo site_url("frontend/path/ajaxCheckEmail");?>', { member_email: member_email }, function(data) {
                if(data == 'true') {
                    alert('<?php echo get2Lang($this->session->userdata('lang'), 'อีเมล์นี้มีในระบบแล้ว', 'Email is already');?>');

                    $("#member_email").val('');
                    $("#member_email").focus();
                }
            });
        }

        function register() {
            if($("#member_name").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกชื่อ', 'Please enter Name');?>');

                $("#member_name").focus();
            } else if($("#member_surname").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกนามสกุล', 'Please enter Surname');?>');

                $("#member_surname").focus();
            } else if($("#member_tel").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกเบอร์โทรศัพท์', 'Please enter Tel');?>');

                $("#member_tel").focus();
            } else if(!isEmail($("#member_email").val())) {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'รูปแบบอีเมล์ไม่ถูกต้อง', 'Incorrect Email');?>');

                $("#member_email").val('');
                $("#member_email").focus();
            } else if($("#member_email").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกอีเมล์', 'Please enter Email');?>');

                $("#member_email").focus();
            } else if($("#member_password").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกรหัสผ่าน', 'Please enter Password');?>');

                $("#member_password").focus();
            } else if($("#member_confirm_password").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกยืนยันรหัสผ่าน', 'Please enter Confirm Password');?>');

                $("#member_confirm_password").focus();
            } else if($("#member_password").val() != $("#member_confirm_password").val()) {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'รหัสผ่านกับยืนยันรหัสผ่านต้องเหมือนกัน', 'Incorrect Confirm Password');?>');

                $("#member_password").val('');
                $("#member_confirm_password").val('');
                $("#member_password").focus();
            } else {
                $.post('<?php echo site_url("frontend/path/ajaxRegister");?>', { member_name: $("#member_name").val(), member_surname: $("#member_surname").val(), member_tel: $("#member_tel").val(), member_email: $("#member_email").val(), member_password: $("#member_password").val() }, function(data) {
                    alert('<?php echo get2Lang($this->session->userdata('lang'), 'ลงทะเบียนสำเร็จ', 'Register Success');?>');

                    $("#member_name").val('');
                    $("#member_surname").val('');
                    $("#member_tel").val('');
                    $("#member_email").val('');
                    $("#member_password").val('');
                    $("#member_confirm_password").val('');
                });
            }
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function login() {
            if($("#member_username_").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกชื่อผู้ใช้งาน', 'Please enter Username');?>');

                $("#member_username_").focus();
            } else if($("#member_password_").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกรหัสผ่าน', 'Please enter Password');?>');

                $("#member_password_").focus();
            } else {
                $.post('<?php echo site_url('frontend/path/ajaxLogin');?>', { member_username: $("#member_username_").val(), member_password: $("#member_password_").val() }, function(data) {
                    if(data == 'cart') {
                        window.location.href = '<?php echo site_url("cart");?>';
                    } else if(data == 'incorrect') {
                        //alert('Incorrect Username Or/And Password');

                        $(".divLoginFail").html('ระบุอีเมล์หรือรหัสผ่านไม่ถูกต้อง');
                        //$("#member_username_").val('');
                        $("#member_password_").val('');
                    } else {
                        window.location.href = '<?php echo site_url("member_profile");?>';
                    }
                });
            }
        }

        function forgetPassword() {
            if($("#member_email_forget_password").val() == '') {
                alert("<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกอีเมล์ของคุณ', 'Please enter Email');?>");

                $("#member_email_forget_password").focus();
            } else if(!isEmail($("#member_email_forget_password").val())) {
                alert("<?php echo get2Lang($this->session->userdata('lang'), 'รูปแบบของอีเมล์ไม่ถูกต้อง', 'Incorrect Email');?>");

                $("#member_email_forget_password").val('');
                $("#member_email_forget_password").focus();
            } else {
                $.post('<?php echo site_url("frontend/path/ajaxForgetPassword");?>', { member_email: $("#member_email_forget_password").val() }, function(data) {
                    if(data == 'true') {
                        alert('<?php echo get2Lang($this->session->userdata('lang'), 'ได้ทำการส่งรหัสผ่านไปยังอีเมล์สำเร็จแล้ว', 'Send Password by Email Success');?>');

                        window.location.href = '<?php echo site_url('login');?>';
                    } else {
                        alert('<?php echo get2Lang($this->session->userdata('lang'), 'ไม่มีอีเมล์นี้ในระบบ', 'Not Email is System');?>');

                        $("#member_email_forget_password").val('');
                        $("#member_email_forget_password").focus();
                    }
                });
            }
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function showRegister() {
            $("#show_register").show();
        }
    </script>

<script type="text/javascript">
    var token = "";
    var userId = "";

    window.fbAsyncInit = function(){
        FB.init({
        	// ใส่่ App ID
            appId: '578822967135237',
            status: false,
            cookie: false,
            xfbml: true,
            version: 'v14.0'
        });
        FB.Event.subscribe('auth.authResponseChange',function(response){
            console.log(response);
            //Logout-unauthen
            if(response.authResponse == null | response.status == "unknow"){
                return;
            }
            token = response.authResponse.accessToken;
            userId = response.authResponse.userID;
            if(response.status === 'connected'){

            }else if(response.status === 'not_authorized'){
                FB.login(function() { scope: 'pubile_actions'});
            }else{
                FB.login(function() { scope: 'pubile_actions'});
            }
        });
    };
    // Load the SDK asynchronously
    (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if(d.getElementById(id)){
            //console.log(7);
            return;
        }
        js = d.createElement('script');
        js.id = id; js.async = true;
        js.src = "https://connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));

    var loginProfile = {};
    
    // เรียกใช้ function fbLogin ตรงคลิกลิงก์
    function fbLogin(){
        FB.login(function(response){
            if(response.authResponse){
                access_token = response.authResponse.accessToken;
                user_id = response.authResponse.user_ID;
                FB.api('/me', { locale: 'en_US', fields: 'name, email, gender, locale, picture' },
                    function(response){
                    console.log('EMAIL : '+response.email);
                    console.log(response);
                    var id      = response.id;
                    var name    = response.name;
                    //var email   = response.email;
                    var gender  = response.gender;
                    var locale  = response.locale;
                    var picture = response.picture['data']['url'];
                    
                    // ใช้เป็น ajax
                    $.ajaxSetup({
                        async: true
                    });
                     
                    $.ajax('<?php echo site_url("frontend/path/ajaxFacebook");?>', {
                        type: 'POST',
                        data: {
                            'id'            : id,
                            'member_name'   : name,
                            //'email'         : email,
                            'gender'        : gender,
                            'locale'        : locale,
                            'picture'       : picture
                        },
                        dataType: 'html',
                        success: function(data) {
                            window.location.href = '<?php echo site_url("member_profile");?>';
                        }
                    });
                    // End ใช้เป็น ajax
                });
            }else{

            }
        },{
            scope: 'public_profile, email'
        }); 
    }
</script>
</body>
</html>