<!-- Messenger ปลั๊กอินแชท Code -->
<div id="fb-root"></div>

<!-- Your ปลั๊กอินแชท code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "173353973003955");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v14.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<!----- TOP BUTTON ----->
<div class="scrolltop">
    <div class="scroll icon"><i class="fas fa-chevron-up"></i></div>
</div>

<!--------------- NEWSLETTER --------------->
<div class="newsletterBG">
    <div class="container-fluid">
        <div class="wrap-pad">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-11 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <p><?php echo get2Lang($this->session->userdata('lang'), 'ลงทะเบียนเพื่อรับข่าวสาร', 'Subscribe to our newsletter');?></p>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="input-group newsletter-container">
                                <input type="email" class="form-control" placeholder="<?php echo get2Lang($this->session->userdata('lang'), 'กรอกอีเมลเพื่อลงทะเบียน', 'Email address');?>" id="newsletter_email_inc" aria-describedby="button-addon2">
                                <button class="buttonBK" type="button" id="button-addon2" onclick="insertNewsletter();"><?php echo get2Lang($this->session->userdata('lang'), 'ลงทะเบียน', 'Subscribe');?></button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
		</div>
	</div>
</div>
<!--------------- FOOTER --------------->
<footer>
    <div class="container-fluid">
        <div class="wrap-pad">
            <!-- FOOTER FOR :: PC & IPAD -->
            <div class="d-none d-sm-block">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="row">
                            <div class="col">
                                <h6><?php echo get2Lang($this->session->userdata('lang'), 'ช่องทางการติดต่อ', 'CONTACT INFORMATION');?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <ul class="contact-info">
                                    <li>
                                        <div>
                                            <div class="icon-contact"><i class="fas fa-map-marker-alt"></i></div>
                                            <p><?php if(!empty($contact_us_inc)) echo get2Lang($this->session->userdata('lang'), $contact_us_inc->contact_us_address_th, $contact_us_inc->contact_us_address_en);?><?php /*15 ถนนสุขสวัสดิ์ ซอย 36 แขวงบางปะกอก เขตราษฎร์บูรณะ กรุงเทพฯ 10140*/ ?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="icon-contact"><i class="fas fa-phone-alt"></i></div>
                                            <p><?php if(!empty($contact_us_inc)) echo get2Lang($this->session->userdata('lang'), $contact_us_inc->contact_us_tel_th, $contact_us_inc->contact_us_tel_en);?><?php /*+66(0) 2xxx xxxx*/ ?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="icon-contact"><i class="fas fa-envelope"></i></div>
                                            <p><?php if(!empty($contact_us_inc)) echo $contact_us_inc->contact_us_email;?><?php /*<a href="mailto:contact@srithaisuperware.com">contact@srithaisuperware.com</a>*/ ?></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 offset-lg-1 col-md-7">
                        <div class="row">
                            <div class="col-lg-6 col-md-5">
                                <div class="row">
                                    <div class="col">
                                        <h6><?php echo get2Lang($this->session->userdata('lang'), 'สินค้าของเรา', 'CATEGORY');?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="footer-menu">
<?php
if(!empty($menu_inc)) {
	foreach($menu_inc as $r_inc) {	
?>
                                            <li><a href="<?php echo site_url('product_category/'.$r_inc->category1_id);?>"><?php echo get2Lang($this->session->userdata('lang'), $r_inc->category1_name_th, $r_inc->category1_name_en);?></a></li>
<?php
    }
}
?>
                                            <?php /*<li><a href="<?php echo site_url('product-category');?>">Food Packaging</a></li>
                                            <li><a href="<?php echo site_url('product-category');?>">Furniture</a></li>
                                            <li><a href="<?php echo site_url('product-category');?>">Melamine</a></li>
                                            <li><a href="<?php echo site_url('product-category');?>">Houseware</a></li>*/ ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7">
<?php
if($this->session->userdata('member_id') != '') {
?>
                                <div class="row">
                                    <div class="col">
                                        <h6><?php echo get2Lang($this->session->userdata('lang'), 'ช้อปปิ้งออนไลน์', 'ONLINE SHOPPING');?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="footer-menu">
                                            <li><a href="<?php echo site_url('contact');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ช่องทางการติดต่อ', 'Contact');?></a></li>
                                            <li><a href="<?php echo site_url('shipping_payment_method');?>#shipping"><?php echo get2Lang($this->session->userdata('lang'), 'การจัดส่งสินค้า', 'Shipping Product');?></a></li>
                                            <li><a href="<?php echo site_url('member_order');?>"><?php echo get2Lang($this->session->userdata('lang'), 'การตรวจสอบสถานะสินค้า', 'Product Check');?></a></li>
                                            <li><a href="<?php echo site_url('shipping_payment_method');?>#payment"><?php echo get2Lang($this->session->userdata('lang'), 'วิธีการชำระเงิน', 'Payment Method');?></a></li>
                                            <li><a href="<?php echo site_url('confirm_payment');?>"><?php echo get2Lang($this->session->userdata('lang'), 'แจ้งโอนเงิน', 'Transfer Payment');?></a></li>
                                            <li><a href="<?php echo site_url('shipping_payment_method');?>#refund"><?php echo get2Lang($this->session->userdata('lang'), 'การคืนเงินหรือเปลี่ยนสินค้า', 'Refund or Exchange');?></a></li>
                                        </ul>
                                    </div>
                                </div>
<?php
}
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER FOR :: MOBILE -->
            <div class="d-block d-sm-none">
                <div class="row">
                    <div class="col">
                        <h6>SRITHAI SUPERWARE</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="footer-acc">
                            <div class="panel-group" id="foot-accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <!-- SITEMAP -->
                                    <div class="panel-heading" role="tab">
                                        <div class="row">
                                            <div class="col">
                                                <a data-toggle="collapse" data-parent="#foot-accordion" href="#footer01" aria-expanded="true">CONTACT INFORMATION</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="footer01" class="panel-collapse collapse" role="tabpanel" data-parent="#foot-accordion">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="contact-info">
                                                        <li>
                                                            <div>
                                                                <div class="icon-contact"><i class="fas fa-map-marker-alt"></i></div>
                                                                <p><?php if(!empty($contact_us_inc)) echo get2Lang($this->session->userdata('lang'), $contact_us_inc->contact_us_address_th, $contact_us_inc->contact_us_address_en);?><?php /*15 ถนนสุขสวัสดิ์ ซอย 36 แขวงบางปะกอก เขตราษฎร์บูรณะ กรุงเทพฯ 10140*/ ?></p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="icon-contact"><i class="fas fa-phone-alt"></i></div>
                                                                <p><?php if(!empty($contact_us_inc)) echo get2Lang($this->session->userdata('lang'), $contact_us_inc->contact_us_tel_th, $contact_us_inc->contact_us_tel_en);?><?php /*+66(0) 2xxx xxxx*/ ?></p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="icon-contact"><i class="fas fa-envelope"></i></div>
                                                                <p><?php if(!empty($contact_us_inc)) { ?><a href="mailto:<?php echo $contact_us_inc->contact_us_email;?>"><?php echo $contact_us_inc->contact_us_email;?></a><?php } ?><?php /*<a href="mailto:contact@srithaisuperware.com">contact@srithaisuperware.com</a>*/ ?></p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CATEGORY -->
                                    <div class="panel-heading" role="tab">
                                        <div class="row">
                                            <div class="col">
                                                <a data-toggle="collapse" data-parent="#foot-accordion" href="#footer02" aria-expanded="true">CATEGORY</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="footer02" class="panel-collapse collapse" role="tabpanel" data-parent="#foot-accordion">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="footer-menu">
                                                        <li><a href="<?php echo site_url('product-category');?>">Food Packaging</a></li>
                                                        <li><a href="<?php echo site_url('product-category');?>">Furniture</a></li>
                                                        <li><a href="<?php echo site_url('product-category');?>">Melamine</a></li>
                                                        <li><a href="<?php echo site_url('product-category');?>">Houseware</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php
if($this->session->userdata('member_id') != '') {
?>
                                    <!-- CONTACT US -->
                                    <div class="panel-heading" role="tab">
                                        <div class="row">
                                            <div class="col">
                                                <a data-toggle="collapse" data-parent="#foot-accordion" href="#footer03" aria-expanded="true">CONTACT US</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="footer03" class="panel-collapse collapse" role="tabpanel" data-parent="#foot-accordion">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="footer-menu">
                                                        <li><a href="<?php echo site_url('contact');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ช่องทางการติดต่อ', 'Contact');?></a></li>
                                                        <li><a href="<?php echo site_url('shipping-payment-method');?>#shipping">การจัดส่งสินค้า</a></li>
                                                        <li><a href="<?php echo site_url('member-order');?>"><?php echo get2Lang($this->session->userdata('lang'), 'การตรวจสอบสถานะสินค้า', 'Product Check');?></a></li>
                                                        <li><a href="<?php echo site_url('shipping-payment-method');?>#payment"><?php echo get2Lang($this->session->userdata('lang'), 'วิธีการชำระเงิน', 'Payment Method');?></a></li>
                                                        <li><a href="<?php echo site_url('confirm-payment');?>"><?php echo get2Lang($this->session->userdata('lang'), 'แจ้งโอนเงิน', 'Transfer Payment');?></a></li>
                                                        <li><a href="<?php echo site_url('shipping-payment-method');?>#refund"><?php echo get2Lang($this->session->userdata('lang'), 'การคืนเงินหรือเปลี่ยนสินค้า', 'Refund or Exchange');?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php
}
?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- SOCIAL FOR :: MOBILE -->
                <div class="row">
                    <div class="col">
                        <div class="content-center">
                            <ul class="social">
                                <li><a href="" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                <li><a href="" target="_blank"><img src="<?php echo base_url('asset/frontend/images/icon/icon-lineGY.svg');?>"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <div class="row">
                    <div class="col-lg-7 col-md-9 col-12">
                        <p>© 2022 Srithai Superware Public Company Limited. <span>All Rights Reserved.</span></p>
                    </div>
                    <!-- SOCIAL FOR :: PC & IPAD -->
                    <div class="col-lg-5 col-md-3 d-none d-sm-block">
                        <ul class="social">
                            <li><a href="" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-instagram"></i></a></li>
                            <li><a href="" target="_blank"><img src="<?php echo base_url('asset/frontend/images/icon/icon-lineGY.svg');?>"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
		</div>
	</div>
</footer>


<script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 500 ) {
            $('.scrolltop:hidden').stop(true, true).fadeIn();
        } else {
            $('.scrolltop').stop(true, true).fadeOut();
        }
    });
    $(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".thetop").offset().top},"1000");return false})})

    // collapse //
    $(document).ready(function() {
        $('.collapse.in').prev('.panel-heading').addClass('active');
        $('#foot-accordion')
            .on('show.bs.collapse', function(a) {
            $(a.target).prev('.panel-heading').addClass('active');
        })
            .on('hide.bs.collapse', function(a) {
            $(a.target).prev('.panel-heading').removeClass('active');
        });
    });

    function isIncFooterEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function insertNewsletter() {
        if($("#newsletter_email_inc").val() == '') {
            alert("<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกอีเมล์', 'Please enter Email');?>");

            $("#newsletter_email_inc").focus();
        } else if(!isIncFooterEmail($("#newsletter_email_inc").val())) {
            alert("<?php echo get2Lang($this->session->userdata('lang'), 'รูปแบบอีเมล์ไม่ถูกต้อง', 'Incorrect Email');?>");

            $("#newsletter_email_inc").val('');
            $("#newsletter_email_inc").focus();
        } else {
            $.post('<?php echo site_url('frontend/path/ajaxInsertNewsletter');?>', { newsletter_email: $("#newsletter_email_inc").val() }, function(data) {
                alert("<?php echo get2Lang($this->session->userdata('lang'), 'เพิ่มอีเมล์สำเร็จ', 'Add Email Success');?>");

                $("#newsletter_email_inc").val('');
            });
        }
    }
</script>

    <!-- Messenger ปลั๊กอินแชท Code -->
    <div id="fb-root"></div>

    <!-- Your ปลั๊กอินแชท code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "173353973003955");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>