<div class="col-lg-3 col-md-12">
    <div class="row">
        <div class="col">
            <div class="user-header">
                <div class="row">
                    <div class="col-lg-12 col-md-9 col-10">
                        <div class="user-icon"><i class="fas fa-user-circle"></i></div>
                        <ul class="user-name">
                            <li>สวัสดี</li>
                            <li>ช็อปสินค้า ศรีไทย</li>
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
                                                                        <div class="menu-item"><a href="member-profile.php">บัญชีของฉัน</a></div>
                                                                    </li>
                                                                    <li data-page="address">
                                                                        <div class="menu-item"><a href="member-address.php">ที่อยู่จัดส่ง</a></div>
                                                                    </li>
                                                                    <li data-page="payment">
                                                                        <div class="menu-item"><a href="member-payment.php">การชำระเงิน</a></div>
                                                                    </li>
                                                                    <li data-page="order">
                                                                        <div class="menu-item"><a href="member-order.php">รายการสั่งซื้อ</a></div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="menu-item"><a href="confirm-payment.php">แจ้งโอนเงิน</a></div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="menu-item topBD">
                                                                            <button class="logout-button"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</button>
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
                    <li data-page="profile"><a href="member-profile.php">บัญชีของฉัน</a></li>
                    <li data-page="address"><a href="member-address.php">ที่อยู่จัดส่ง</a></li>
                    <li data-page="payment"><a href="member-payment.php">การชำระเงิน</a></li>
                    <li data-page="order"><a href="member-order.php">รายการสั่งซื้อ</a></li>
                    <li><a href="confirm-payment.php">แจ้งโอนเงิน</a></li>
                    <li>
                        <button class="logout-button"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</button>
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