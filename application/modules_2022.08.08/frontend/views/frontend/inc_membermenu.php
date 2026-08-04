<?php
$member_menu_inc = $this->model_frontend->get_member_profile_record();

if(!empty($member_menu_inc)) {
    $vip_inc = $this->model_frontend->getCheckVIP();
}
?>
<div class="col-lg-3 col-md-12">
    <div class="row">
        <div class="col">
            <div class="user-header">
                <div class="row">
                    <div class="col-lg-12 col-md-9 col-10">
                        <div class="user-icon"><?php if(!empty($row) and $row->member_image != '') { ?><img src="<?php echo base_url('uploads/member/'.$row->member_image);?>"><?php } else { ?><i class="fas fa-user-circle"></i><?php } ?></div>
                        <ul class="user-name">
                            <li>สวัสดี</li>
                            <li><?php if(!empty($member_menu_inc)) echo $member_menu_inc->member_name.' '.$member_menu_inc->member_surname;?> <?php if(!empty($vip_inc)) { ?>( <?php echo get2Lang($this->session->userdata('lang'), $vip_inc->vip_name_th, $vip_inc->vip_name_en);?> )<?php } ?></li>
                        </ul>
                    </div>
                    <!-- MEMBER - MENU :: IPAD & MOBILE -->
                    <div class="col-md-3 col-2 d-block d-sm-block d-lg-none">
                        
                        <!-- HAMBURGER - MENU -->
                        <button type="button" class="btn nav-menu memButton-nav" data-toggle="modal" data-target="#member-mobile">
                            <div class="member-nav">
                                <p>MEMBER<br>MENU</p>
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </button>

                        <!-- Modal -->
                        <div class="modal left fade" id="member-mobile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-header gray-BG">
                                    <p><i class="fas fa-user"></i>MEMBER MENU</p>
                                    <!--<a class="mainlogo" href="index.php"><img src="images/AmecoLogo.svg"></a>-->
                                    <button type="button" class="close btn " data-dismiss="modal" aria-label="Close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>

                                <div class="modal-content pt-0">
                                    <!-- MAINMENU -->
                                    <div class="modal-body">
                                        <div id="menu">
                                            <div class="menu-box">
                                                <div class="menu-wrapper-inner">
                                                    <div class="menu-wrapper">
                                                        <div class="menu-slider">
                                                            <div class="menu">
                                                                <ul>
                                                                    <li data-page="profile">
                                                                        <div class="menu-item"><a href="<?php echo site_url('member_profile');?>"><?php echo get2Lang($this->session->userdata('lang'), 'บัญชีของฉัน', 'My Account');?></a></div>
                                                                    </li>
                                                                    <li data-page="address">
                                                                        <div class="menu-item"><a href="<?php echo site_url('member_address');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ที่อยู่จัดส่ง', 'Shipping Address');?></a></div>
                                                                    </li>
                                                                    <li data-page="point">
                                                                        <div class="menu-item"><a href="<?php echo site_url('member-point');?>"><?php echo get2Lang($this->session->userdata('lang'), 'คะแนนสะสม', 'Point');?></a></div>
                                                                    </li>
                                                                    <?php /*<li data-page="payment">
                                                                        <div class="menu-item"><a href="<?php echo site_url('member_payment');?>">การชำระเงิน</a></div>
                                                                    </li>*/ ?>
                                                                    <li data-page="order">
                                                                        <div class="menu-item"><a href="<?php echo site_url('member_order');?>"><?php echo get2Lang($this->session->userdata('lang'), 'รายการสั่งซื้อ', 'Order List');?></a></div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="menu-item"><a href="<?php echo site_url('confirm_payment');?>"><?php echo get2Lang($this->session->userdata('lang'), 'แจ้งโอนเงิน', 'Transfer Payment');?></a></div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="menu-item topBD">
                                                                            <button class="logout-button"><i class="fas fa-sign-out-alt"></i><?php echo get2Lang($this->session->userdata('lang'), 'ออกจากระบบ', 'Logout');?></button>
                                                                        </div>
                                                                    </li>
                                                                </ul>
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
                </div>
                
            </div>
        </div>
        
    </div>

    <!-- MEMBER - MENU :: PC & IPAD-PRO -->
    <div class="d-none d-md-none d-lg-block">
        <div class="row">
            <div class="col">
                <ul class="member-menu">
                    <li data-page="profile"><a href="<?php echo site_url('member_profile');?>"><?php echo get2Lang($this->session->userdata('lang'), 'บัญชีของฉัน', 'My Account');?></a></li>
                    <li data-page="address"><a href="<?php echo site_url('member_address');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ที่อยู่จัดส่ง', 'Shipping Address');?></a></li>
                    <li data-page="point"><a href="<?php echo site_url('member_point');?>"><?php echo get2Lang($this->session->userdata('lang'), 'คะแนนสะสม', 'Point');?></a></li>
                    <?php /*<li data-page="payment"><a href="<?php echo site_url('member_payment');?>">การชำระเงิน</a></li>*/ ?>
                    <li data-page="order"><a href="<?php echo site_url('member_order');?>"><?php echo get2Lang($this->session->userdata('lang'), 'รายการสั่งซื้อ', 'Order List');?></a></li>
                    <li><a href="<?php echo site_url('confirm_payment');?>"><?php echo get2Lang($this->session->userdata('lang'), 'แจ้งโอนเงิน', 'Transfer Payment');?></a></li>
                    <li>
                        <button class="logout-button" onclick="window.location.href='<?php echo site_url('frontend/path/logout');?>';"><i class="fas fa-sign-out-alt"></i><?php echo get2Lang($this->session->userdata('lang'), 'ออกจากระบบ', 'Logout');?></button>
                    </li>
                </ul>
            </div>
        </div> 
    </div>  
</div>

<script type="text/javascript">
    var menu_width;
    jQuery(document).ready(
        function() {
            initMenu();
        });
    function initMenu() {
        menu_width = $("#menu .menu").width();
        $(".menu-back").click(function() {
            var _pos = $(".menu-slider").position().left + menu_width;
            var _obj = $(this).closest(".submenu");
            $(".menu-slider").stop().animate({
                left: _pos
            }, 300, function() {
                _obj.hide();
            });
            return false;
        });
        
        $(".menu-anchor").click(function() {
            var _d = $(this).data('menu');
            $(".submenu").each(function() {
                var _d_check = $(this).data('menu');
                if (_d_check == _d) {
                    $(this).show();
                    var _pos = $(".menu-slider").position().left - menu_width;
                    
                    $(".menu-slider").stop(true, true).animate({
                        left: _pos
                    }, 300);
                    return false;
                }
            });
            return false;
        });
    }

</script>

<script type="text/javascript">
    // ACTIVE MENU //
    $(function () {
		var getPage = '<?php echo($memberName); ?>';
		$(".member-menu li, .menu li").each(function () {
			var getMenu = $(this).attr("data-page");
			if (getPage == getMenu) {
				$(this).addClass('active');
			}
		});
	});
</script>